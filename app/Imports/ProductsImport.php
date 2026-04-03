<?php

namespace App\Imports;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class ProductsImport implements ToCollection
{
    /**
    * @param Collection $collection
    */
    protected $products;
    protected $categories;
    public function __construct()
    {
        $this->products = Product::select('id', 'name')->get();
        $this->categories = Category::select('id', 'name')->get();
    }
    public function collection(Collection $collection)
    {
        ini_set('max_execution_time', -1);
        ini_set('memory_limit', -1);
        $sl=0;
//        return [
//            'Product Name','Category Name' ,'Model','Brand',"Emi Text",'Attributes', "Price",'Discount', 'Stock','Unit',
//            'Status','Featured','In Stock','Meta Tags'
//        ];
        foreach ($collection as $row){
            ++$sl;
            if($sl>1) {
                $products = $this->products->where('name',$row[0])->first();
                if(!$products){
                    $product = new Product();
                    $product->name = $row[0];
                    $product->model = $row[2];
                    $product->brand = $row[3];
                    $product->emi_text = $row[4];
                    $product->product_attribute = $row[5];
                    $product->price = $row[6];
                    $product->discount = $row[7];
                    $product->stock = $row[8];
                    $product->unit = $row[9];
                    $product->status = ($row[10]) ? 1: 0;
                    $product->featured = ($row[11]) ? 1:0;
                    $product->in_stock = ($row[12]) ? 1:0;
                    $product->meta_tags = $row[13];
                    $product->meta_title = $row[14];
                    $product->meta_description = $row[15];
                    $product->description = $row[16];
                    $product->save();
                    if($row[1]!=null){
                        $categories = explode(",",$row[1]);
                        $category_ids = [];
                        foreach ($categories as $key=>$category){
                            if($category!=null){
                               $cat =  $this->categories->where('name',$category)->first();
                                array_push($category_ids,$cat->id);
                            }
                        }
                        $product->categories()->sync($category_ids);
                    }
                }else{
                    $product = Product::where('name',$row[0])->first();
                    $product->model = $row[2];
                    $product->brand = $row[3];
                    $product->emi_text = $row[4];
                    $product->product_attribute = $row[5];
                    $product->price = $row[6];
                    $product->discount = $row[7];
                    $product->stock = $row[8];
                    $product->unit = $row[9];
                    $product->status = ($row[10]) ? 1: 0;
                    $product->featured = ($row[11]) ? 1:0;
                    $product->in_stock = ($row[12]) ? 1:0;
                    $product->meta_tags = $row[13];
                    $product->meta_title = $row[14];
                    $product->meta_description = $row[15];
                    $product->description = $row[16];
                    $product->save();
                    if($row[1]!=null){
                        $categories = explode(",",$row[1]);
                        $category_ids = [];
                        foreach ($categories as $key=>$category){
                            if($category!=null){
                                $cat =  $this->categories->where('name',$category)->first();
                                array_push($category_ids,$cat->id);
                            }
                        }
                        $product->categories()->sync($category_ids);
                    }
                }
            }
        }
    }
}
