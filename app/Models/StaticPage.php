<?php

namespace App\Models;

use App\Enums\PageShortCodeEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class StaticPage extends Model
{
    use HasFactory;
    protected $table = 'static_pages';
    protected $fillable = ['page_title','short_code','extra','image','content'];

    public function scopeAboutContent($query){
        return Cache::remember('about_page_content',5000,function () use($query){
            return $query->where('shortcode',PageShortCodeEnum::ABOUT_PAGE_CONTENT)->first();
        });
    }
    public function scopeSidebar($query){
        return Cache::remember('sidebar_page_content',5000,function () use($query){
            return $query->where('shortcode',PageShortCodeEnum::SIDEBAR_IMAGE)->first();
        });
    }
    public function scopeFooterContent($query){
        return Cache::remember('footer_page_content',5000,function () use($query){
            return $query->where('shortcode',PageShortCodeEnum::FOOTER_PAGE)->first();
        });
    }

    public function scopeTopSidebar($query){
        return Cache::remember('top_sidebar_content',5000,function () use($query){
            return $query->where('shortcode',PageShortCodeEnum::TOP_SIDEBAR)->first();
        });
    }

    public function scopeNewsBanner($query){
        return Cache::remember('new_banner_content',5000,function () use($query){
            return $query->where('shortcode',PageShortCodeEnum::NEWS_BANNER)->first();
        });
    }
    public function scopeCertificationBanner($query){
        return Cache::remember('certification_banner_content',5000,function () use($query){
            return $query->where('shortcode',PageShortCodeEnum::CERTIFICATION_BANNER)->first();
        });
    }
}
