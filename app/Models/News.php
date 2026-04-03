<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;

class News extends Model
{
    use HasFactory;

    protected $table = 'news';
    protected $fillable = ['title','news_type','image','short','detail','published_date','author','origin','sorting','status'];

    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }

    public function scopeActiveNews($query,$news_type){
        return Cache::remember('news_'.$news_type,5000, function ()use ($query,$news_type){
            return $query->where(['status'=>1,'news_type'=>$news_type])->select('id','title','image','short','published_date','slug')->orderBy('sorting','asc')->get();
        });
    }
    public function scopeNewsDetail($query,$slug){
        return Cache::remember('news_'.$slug,5000, function ()use ($query,$slug){
            return $query->where('slug',$slug)->first();
        });
    }
}
