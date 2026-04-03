<?php

namespace App\Repositories;

use App\Contracts\ServiceContract;
use App\Models\Service;
use App\Trait\UploadAble;
use Illuminate\Http\UploadedFile;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Doctrine\Instantiator\Exception\InvalidArgumentException;


/**
 * Class CategoryRepository
 * @package App\Repositories
 */
class ServiceRepository extends BaseRepository implements ServiceContract
{
    use UploadAble;

    public function __construct(Service $model)
    {
        parent::__construct($model);
        $this->model = $model;
    }

    /**
     * @param string $order
     * @param string $sort
     * @param array $columns
     * @return mixed
     */
    public function listSerice(string $order = 'id', string $sort = 'desc', array $columns = ['*'], int $paginetion=null)
    {
        if($paginetion==null){
            return $this->all($columns,$order,$sort);
        }else{
            return $this->model->paginate($paginetion);
        }
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function findServiceById(int $id)
    {
        try{
            return $this->findOneOrFail($id);
        } catch (ModelNotFoundException $e){
            throw new ModelNotFoundException($e);
        }
    }


    /**
     * @param array $params
     * @return Category|mixed
     */
    public function createService(array $params)
    {

        try{
            $collection = collect($params);
            $file_name = null;

            if($collection->has('file_name') && ($params['file_name'] instanceof UploadedFile)){
                $file_name = $this->uploadOne($params['file_name'],'services');
            }

            $status       = $collection->has('status') ? 1 : 0 ;

            $merge = $collection->merge(compact('file_name','status'));
            $service = new Service($merge->all());
            $service->save();
            return $service;

        }catch (QueryException $exception){
            throw  new InvalidArgumentException($exception->getMessage());
        }
    }


    /**
     * @param array $params
     * @return mixed
     */
    public function updateSerivce(array $params)
    {

        $service = $this->findServiceById($params['id']);
        $file_name = $service->file_name;

        $collection = collect($params)->except('_token');

        if ($collection->has('file_name') && ($params['file_name'] instanceof UploadedFile)){
            if($service->file_name !=null){
                $this->deleteOne($service->file_name);
            }
            $file_name = $this->uploadOne($params['file_name'],'services');
        }
        $status       = $collection->has('status') ? 1 : 0 ;

        $merge = $collection->merge(compact('file_name','status'));

        $service->update($merge->all());

        return $service;


    }

    public function deleteService(int $id)
    {

        $service = $this->findServiceById($id);

        if($service->file_name != null){
            $this->deleteOne($service->file_name);
        }

        $service->delete();

        return $service;
    }
}
