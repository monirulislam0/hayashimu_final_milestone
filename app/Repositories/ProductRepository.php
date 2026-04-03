<?php
namespace App\Repositories;

use App\Contracts\ProductContract;
use App\Models\Product;
use App\Trait\UploadAble;
use Doctrine\Instantiator\Exception\InvalidArgumentException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Http\UploadedFile;
use Illuminate\Http\Request;

class ProductRepository extends BaseRepository implements ProductContract
{
    use UploadAble;

    public function __construct(Product $model)
    {
        parent::__construct($model);
    }

    /**
     * @param string $order
     * @param string $sort
     * @param array $columns
     * @return mixed
     */
    public function listProducts(string $order = 'id', string $sort = 'desc', $paginate = 0, array $columns = ['*'])
    {
        if ($paginate > 0) {
            return $this->model->orderBy($order, $sort)->paginate($paginate);
        }
        return $this->all($columns, $order, $sort);
    }
    public function filterProducts(Request $request)
    {
        $query = $this->model->query();
        if($request->filled('name')){
                 $query->where('name','like','%'.$request->name.'%');
        }
        if($request->filled('brand_name')){
            $query->where('brand','like','%'.$request->brand_name.'%');
        }
        if($request->filled('model_name')){
            $query->where('model','like','%'.$request->model_name.'%');
        }
        if($request->filled('status')){
            $query->where('status',$request->status);
        }
        if($request->filled('sidebar_status')){
            $query->where('is_show_top_sidebar',$request->sidebar_status);
        }
        if($request->filled('category_id')){
            $category_id = $request->category_id;
            $query->whereHas('categories', function ($q) use ($category_id){
                $q->where('category_id',$category_id);
            });
        }
        $query->orderBy('id','desc');
        return $query->paginate(10);
    }

    /**
     * @param int $id
     * @return mixed
     * @throws ModelNotFoundException
     */
    public function findProductById(int $id)
    {
        try {
            return $this->findOneOrFail($id);

        } catch (ModelNotFoundException $e) {

            throw new ModelNotFoundException($e);
        }

    }

    /**
     * @param array $params
     * @return Product|mixed
     */
    public function createProduct(array $params)
    {
        try {
            $collection = collect($params);
            $image = '';
            $pdf_file = '';
            $product_attribute = '';
            if ($collection->has('image') && ($params['image'] instanceof UploadedFile)){
                $image = $this->uploadOne($params['image'],'products');
            }
            if ($collection->has('pdf_file') && ($params['pdf_file'] instanceof UploadedFile)){
                $pdf_file = $this->uploadOne($params['pdf_file'],'pdf');
            }
            if($collection->has('attributes')){
                $attributes = [];
                foreach ($params['values'] as $k=>$value){
                    if($params['values'][$k]!=null && $params['attributes'][$k]!=null){
                        $attributes[$params['attributes'][$k]] =$params['values'][$k];
                    }
                }
                $product_attribute = json_encode($attributes);
            }
            $featured         = $collection->has('featured') ? 1 : 0;
            $status           = $collection->has('status') ? 1 : 0;
            $new_item         = $collection->has('new_item') ? 1 : 0;
            $in_stock         = $collection->has('in_stock') ? 1 : 0;
            $is_show_top_sidebar         = $collection->has('is_show_top_sidebar') ? 1 : 0;


            $merge = $collection->merge(compact('status', 'featured','new_item','in_stock','image','pdf_file','is_show_top_sidebar','product_attribute'));

            $product = new Product($merge->all());

            $product->save();

            if ($collection->has('categories')) {
                $product->categories()->sync($params['categories']);
            }
            return $product;

        } catch (QueryException $exception) {
            throw new InvalidArgumentException($exception->getMessage());
        }
    }

    /**
     * @param array $params
     * @return mixed
     */
    public function updateProduct(array $params)
    {
        $product = $this->findProductById($params['id']);
        $image = $product->image;
        $pdf_file = $product->pdf_file;
        $product_attribute = $product->product_attribute;

        $collection = collect($params)->except('_token');
        if($collection->has('attributes')){
            $attributes = [];
                foreach ($params['values'] as $k=>$value){
                    if($params['values'][$k]!=null && $params['attributes'][$k]!=null){
                        $attributes[$params['attributes'][$k]] =$params['values'][$k];
                    }
                }
            $product_attribute = json_encode($attributes);
        }elseif($collection->has('is_attribute')){
                $product_attribute = '';
            }

        if ($collection->has('image') && ($params['image'] instanceof UploadedFile)){
            if($product->image !=null){
                $this->deleteOne($product->image);
            }
            $image = $this->uploadOne($params['image'],'products');
        }
        if ($collection->has('pdf_file') && ($params['pdf_file'] instanceof UploadedFile)){
            if($product->pdf_file !=null){
                $this->deleteOne($product->pdf_file);
            }
            $pdf_file = $this->uploadOne($params['pdf_file'],'pdf');
        }
        if(!$collection->has('is_tab')) {
            $featured = $collection->has('featured') ? 1 : 0;
            $status = $collection->has('status') ? 1 : 0;
            $new_item = $collection->has('new_item') ? 1 : 0;
            $in_stock = $collection->has('in_stock') ? 1 : 0;
            $is_show_top_sidebar = $collection->has('is_show_top_sidebar') ? 1 : 0;
            $merge = $collection->merge(compact('status', 'featured', 'new_item', 'in_stock', 'image','product_attribute','pdf_file','is_show_top_sidebar'));
        }else{
            $merge = $collection->merge(compact('image',  'product_attribute','pdf_file'));
        }
        $product->update($merge->all());


        if ($collection->has('categories')) {
            $product->categories()->sync($params['categories']);
        }
        return $product;
    }

    /**
     * @param $id
     * @return bool|mixed
     */
    public function deleteProduct($id)
    {
        $product = $this->findProductById($id);

        $product->delete();

        return $product;
    }


}
