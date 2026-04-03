<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';

    protected $fillable = ['name','slug','parent_id','featured','sorting','menu','hover_image','description','image','status','is_show_top_sidebar'];

    /**
     * @var array
     */
    protected $casts = [
        'parent_id'     => 'integer',
        'sorting'     => 'integer',
        'featured'      => 'boolean',
        'menu'          => 'boolean',
        'is_show_top_sidebar'          => 'boolean',
        'status'        => 'boolean',
    ];

    /**
     * @param $value
     */
    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function parent()
    {
        return $this->belongsTo(Category::class,'parent_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function children()
    {
        return $this->hasMany(Category::class,'parent_id');
    }

    public function products(){
        return $this->belongsToMany(Product::class,'product_categories','category_id','product_id');
    }
    public function scopeMenu($query){
        return Cache::remember('menu',5000, function ()use ($query){
            return $query->with('children:id,parent_id,name,slug')->where(['status'=>1,'menu'=>1])->select('id','name','slug')->orderBy('sorting','asc')->limit(20)->get();
        });
    }

    public function scopeFeatures($query){
        return Cache::remember('features',5000, function ()use ($query){
            return $query->where(['status'=>1,'featured'=>1])->where('id','!=',1)->select('id','name','image','hover_image','slug')->orderBy('sorting','asc')->limit(15)->get();
        });
    }

    public function scopeCategoryProductWithSlug($query,$slug){
       return Cache::remember('category_product_with_slug_'.$slug,5000, function () use($query,$slug){
          return $query->where('slug',$slug)
                ->with(['children'=>function($q){
                    $q->select('id','parent_id','slug','name');
                }])
              ->select('id','name','image','slug','description','is_show_top_sidebar')
              ->first();
        });
    }

}
