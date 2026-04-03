<?php

namespace App\Repositories;

use App\Contracts\StaticPageContract;
use App\Enums\PageShortCodeEnum;
use App\Models\StaticPage;
use App\Trait\UploadAble;
use Illuminate\Http\UploadedFile;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Doctrine\Instantiator\Exception\InvalidArgumentException;


class StaticPageRepository extends BaseRepository implements StaticPageContract
{
    use UploadAble;

    public function __construct(StaticPage $model)
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
    public function listStatic(string $order = 'id', string $sort = 'desc', array $columns = ['*'], int $paginetion=null)
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
    public function findStaticById(int $id)
    {
        try{
            return $this->findOneOrFail($id);
        } catch (ModelNotFoundException $e){
            throw new ModelNotFoundException($e);
        }
    }

    public function findStaticByShortcode(PageShortCodeEnum $shortcode)
    {
        try{
            return $this->model->where('shortcode',$shortcode)->first();
        } catch (ModelNotFoundException $e){
            throw new ModelNotFoundException($e);
        }
    }


    /**
     * @param array $params
     * @return Category|mixed
     */
    public function createStatic(array $params)
    {

        try{
            $collection = collect($params);
            $image = null;

            if($collection->has('image') && ($params['image'] instanceof UploadedFile)){
                $image = $this->uploadOne($params['image'],'statics');
            }
            $merge = $collection->merge(compact('image'));
            $page = new StaticPage($merge->all());
            $page->save();
            return $page;

        }catch (QueryException $exception){
            throw  new InvalidArgumentException($exception->getMessage());
        }
    }


    /**
     * @param array $params
     * @return mixed
     */
    public function updateStatic(array $params,$shortcode)
    {

        $page = $this->findStaticByShortcode($shortcode);
        $image = $page->image;
        $extra = $page->extra;

        $collection = collect($params)->except('_token');

        if ($collection->has('image') && ($params['image'] instanceof UploadedFile)){
            if($page->image !=null){
                $this->deleteOne($page->image);
            }
            $image = $this->uploadOne($params['image'],'statics');
        }
        if ($collection->has('video') && ($params['video'] instanceof UploadedFile)){
            if($page->video !=null){
                $this->deleteOne($page->video);
            }
            $extra = $this->uploadOne($params['video'],'videos');
        }
        if($collection->has('extra')){
            $extra = $params['extra'];
        }
        $merge = $collection->merge(compact('image','extra'));

        $page->update($merge->all());

        return $page;

    }

    public function updateWhyIChoose(array $params)
    {
        // TODO: Implement updateWhyIChoose() method.
        $page = $this->findStaticByShortcode(PageShortCodeEnum::HOME_PAGE_WHY_CHOOSE);
        $collection = collect($params)->except('_token');
        $image = $page->image;
        $extra = $page->extra;
        $data = [];

        if($collection->has('title')){
            foreach ($params['title'] as $k=>$value){
                if (isset($params['icon'][$k]) && $params['icon'][$k] instanceof UploadedFile){
                    if(isset($params['icon_url'][$k]) && $params['icon_url'][$k]!=null){
                        $this->deleteOne($params['icon_url'][$k]);
                    }
                    $icon = $this->uploadOne($params['icon'][$k],'statics');
                    array_push($data,['icon'=>$icon,'title'=>$value]);
                }else{
                    $icon = $params['icon_url'][$k];
                    array_push($data,['icon'=>$icon,'title'=>$value]);
                }
            }
        }
        $content = $data;
        if ($collection->has('image') && ($params['image'] instanceof UploadedFile)){
            if($page->image !=null){
                $this->deleteOne($page->image);
            }
            $image = $this->uploadOne($params['image'],'statics');
        }
        if ($collection->has('video') && ($params['video'] instanceof UploadedFile)){
            if($page->video !=null){
                $this->deleteOne($page->video);
            }
            $extra = $this->uploadOne($params['video'],'videos');
        }

        $merge = $collection->merge(compact('content','image','extra'));

        $page->update($merge->all());

        return $page;
    }

}
