<?php

namespace App\Repositories;

use App\Models\Category;
use App\Trait\UploadAble;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use App\Contracts\CategoryContract;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Doctrine\Instantiator\Exception\InvalidArgumentException;


/**
 * Class CategoryRepository
 * @package App\Repositories
 */
class CategoryRepository extends BaseRepository implements CategoryContract
{
    use UploadAble;

    /**
     * CategoryRepository constructor.
     * @param Category $model
     */
    public function __construct(Category $model)
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
    public function listCategories(string $order = 'id', string $sort = 'desc', array $columns = ['*'], int $paginetion=null)
    {
        if($paginetion==null){
            return $this->all($columns,$order,$sort)->where('id','!=',1);
        }else{
            return $this->model->paginate($paginetion);
        }
    }

    public function filterCategories(Request $request)
    {
        $query = $this->model->query();
        if($request->filled('name')){
            $query->where('name','like','%'.$request->name.'%');
        }
        if($request->filled('status')){
            $query->where('status',$request->status);
        }
        if($request->filled('sidebar_status')){
            $query->where('is_show_top_sidebar',$request->sidebar_status);
        }
        if($request->filled('sidebar_status')){
            $query->where('is_show_top_sidebar',$request->sidebar_status);
        }
        if($request->filled('menu_status')){
            $query->where('menu',$request->menu_status);
        }
        if($request->filled('featured_status')){
            $query->where('featured',$request->featured_status);
        }
        if($request->filled('parent_id')){
            $query->where('parent_id',$request->parent_id);
        }
        $query->orderBy('id','desc');
        return $query->paginate(10);
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function findCategoryById(int $id)
    {
        try{
            return $this->findOneOrFail($id);
        } catch (ModelNotFoundException $e){
            throw new ModelNotFoundException($e);
        }
    }
    public function findCategoryByParentId(int $parent_id)
    {
        try{
            return $this->findBy(['parent_id'=>$parent_id]);
        } catch (ModelNotFoundException $e){
            throw new ModelNotFoundException($e);
        }
    }

    /**
     * @param array $params
     * @return Category|mixed
     */
    public function createCategory(array $params)
    {
        // TODO: Implement createCategory() method.

        try{
            $collection = collect($params);
            $image = null;
            $hover_image = null;

            if($collection->has('image') && ($params['image'] instanceof UploadedFile)){
                $image = $this->uploadOne($params['image'],'categories');
            }
            if($collection->has('hover_image') && ($params['hover_image'] instanceof UploadedFile)){
                $hover_image = $this->uploadOne($params['hover_image'],'categories');
            }
            $featured   = $collection->has('featured') ? 1 : 0 ;
            $menu       = $collection->has('menu') ? 1 : 0 ;
            $status     = $collection->has('status') ? 1 : 0 ;
            $is_show_top_sidebar       = $collection->has('is_show_top_sidebar') ? 1 : 0 ;

            $merge = $collection->merge(compact('menu','hover_image','image','featured','status','is_show_top_sidebar'));
            $category = new Category($merge->all());
            $category->save();
            return $category;

        }catch (QueryException $exception){
            throw  new InvalidArgumentException($exception->getMessage());
        }
    }


    /**
     * @param array $params
     * @return mixed
     */
    public function updateCategory(array $params)
    {
        // TODO: Implement updateCategory() method.

        $category = $this->findCategoryById($params['id']);
        $image = $category->image;
        $hover_image = $category->hover_image;

        $collection = collect($params)->except('_token');
        if ($collection->has('image') && ($params['image'] instanceof UploadedFile)){
            if($category->image !=null){
                $this->deleteOne($category->image);
            }
            $image = $this->uploadOne($params['image'],'categories');
        }
        if ($collection->has('hover_image') && ($params['hover_image'] instanceof UploadedFile)){
            if($category->hover_image !=null){
                $this->deleteOne($category->hover_image);
            }
            $hover_image = $this->uploadOne($params['hover_image'],'categories');
        }
        $featured   = $collection->has('featured') ? 1 : 0 ;
        $menu       = $collection->has('menu') ? 1 : 0 ;
        $status       = $collection->has('status') ? 1 : 0 ;
        $is_show_top_sidebar       = $collection->has('is_show_top_sidebar') ? 1 : 0 ;

        $merge = $collection->merge(compact('menu','hover_image','image','featured','status','is_show_top_sidebar'));

        $category->update($merge->all());

        return $category;


    }

    public function deleteCategory(int $id)
    {
        // TODO: Implement deleteCategory() method.

        $category = $this->findCategoryById($id);

        if($category->image != null){
            $this->deleteOne($category->image);
        }
        if($category->hover_image != null){
            $this->deleteOne($category->hover_image);
        }

        $category->delete();

        return $category;
    }

    public function parentCategories()
    {
       return $this->model->where('parent_id',1)->where('id','!=',1)->get();

    }

}
