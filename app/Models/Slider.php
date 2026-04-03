<?php

namespace App\Models;

use App\Enums\SliderStatusEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Slider extends Model
{
    use HasFactory;

    protected $table    = 'sliders';
    protected $fillable = ['name','title','type','sorting','redirect_url','image','status'];

    public function scopeAllTop($query){
       return Cache::remember('active_slider',5000,function () use($query){
            return $query->where(['status'=>1,'type'=>SliderStatusEnum::HOME_SLIDER->value])->select('name','title','redirect_url','image')->orderBy('sorting','asc')->get();
        });
    }
    public function scopeAllDown($query){
        return Cache::remember('active_banner',5000,function () use($query){
            return $query->where(['status'=>1,'type'=>SliderStatusEnum::HOME_BANNER->value])->select('name','title','redirect_url','image')->orderBy('sorting','asc')->get();
        });
    }
    public function scopeAboutSlider($query){
        return Cache::remember('about_page_slider',5000,function () use($query){
            return $query->where(['status'=>1,'type'=>SliderStatusEnum::ABOUT_SLIDER->value])->select('name','title','redirect_url','image')->orderBy('sorting','asc')->get();
        });
    }
}
