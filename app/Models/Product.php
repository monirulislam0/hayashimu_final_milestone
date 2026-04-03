<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';
    protected $fillable = ['name','slug','emi_text','product_attribute','description','meta_title','meta_tags','meta_description','image',
        'price','discount','stock','unit','status','featured','is_show_top_sidebar','new_item','in_stock','model','brand','pdf_file'];

    protected $casts=[
        'status'           => 'boolean',
        'featured'         => 'boolean',
        'new_item'         => 'boolean',
        ];


    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }

    public function categories(){
        return $this->belongsToMany(Category::class,'product_categories','product_id','category_id');
    }

    public function images(){
        return $this->hasMany(ProductImage::class);
    }

    public function scopeNewItem($query){
       return Cache::remember('new_item',5000, function () use($query){
           return $query->where(['status'=>1,'new_item'=>1])->select('id','slug','stock','unit','name','small_image','price','in_stock')->limit(8)->get();
        });
    }
    public function scopeFeatured($query){
        return Cache::remember('featured',5000, function () use($query){
            return $query->where(['status'=>1,'featured'=>1])->select('id','slug','stock','unit','name','small_image','price','in_stock')->limit(4)->get();
        });
    }

   public function scopeProductDetail($query,$slug){
        return Cache::remember('product-detail-o'.$slug,5000,function () use($query,$slug){
            $product =  $query->where(['slug'=>$slug,'status'=>1])
                ->with('images:id,product_id,image_link')
                ->select('id','name','price','slug','product_attribute','model','brand',
                    'image','description','meta_title','meta_tags','meta_description',
                    'emi_text','pdf_file','in_stock','is_show_top_sidebar'
                )
                ->first();
            if($product){
               return $product->toArray();
            }
            return [];
        });
    }

    public function scopeProductById($query,$id){
        return Cache::remember('product_by_id_'.$id,5000,function () use ($query,$id){
            return $query->where(['id'=>$id])->select('id','name','image','price','discount','stock','in_stock')->first();
        });

    }
}
