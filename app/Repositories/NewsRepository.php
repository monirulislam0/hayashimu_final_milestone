<?php

namespace App\Repositories;

use App\Contracts\NewsContract;
use App\Models\News;
use App\Trait\UploadAble;
use Illuminate\Http\UploadedFile;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Doctrine\Instantiator\Exception\InvalidArgumentException;


class NewsRepository extends BaseRepository implements NewsContract
{
    use UploadAble;

    public function __construct(News $model)
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
    public function listNews(string $order = 'id', string $sort = 'desc', array $columns = ['*'], int $paginetion=null)
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
    public function findNewsById(int $id)
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
    public function createNews(array $params)
    {

        try{
            $collection = collect($params);
            $image = null;

            if($collection->has('image') && ($params['image'] instanceof UploadedFile)){
                $image = $this->uploadOne($params['image'],'sliders');
            }

            $status       = $collection->has('status') ? 1 : 0 ;

            $merge = $collection->merge(compact('image','status'));
            $news = new News($merge->all());
            $news->save();
            return $news;

        }catch (QueryException $exception){
            throw  new InvalidArgumentException($exception->getMessage());
        }
    }


    /**
     * @param array $params
     * @return mixed
     */
    public function updateNews(array $params)
    {
        $news = $this->findNewsById($params['id']);
        $image = $news->image;

        $collection = collect($params)->except('_token');

        if ($collection->has('image') && ($params['image'] instanceof UploadedFile)){
            if($news->image !=null){
                $this->deleteOne($news->image);
            }
            $image = $this->uploadOne($params['image'],'news');
        }
        $status       = $collection->has('status') ? 1 : 0 ;

        $merge = $collection->merge(compact('image','status'));

        $news->update($merge->all());

        return $news;


    }

    public function deleteNews(int $id)
    {

        $news = $this->findNewsById($id);

        if($news->image != null){
            $this->deleteOne($news->image);
        }

        $news->delete();

        return $news;
    }
}
