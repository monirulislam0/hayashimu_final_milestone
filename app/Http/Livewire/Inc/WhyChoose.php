<?php

namespace App\Http\Livewire\Inc;

use App\Enums\PageShortCodeEnum;
use App\Models\StaticPage;
use Illuminate\Support\Facades\Cache;
use Livewire\Component;

class WhyChoose extends Component
{
    public  $data;
    public $page_type;
    public function mount($page_type){
        $this->page_type = $page_type;
        $this->data = Cache::remember('why-i-choose',5000,function (){
            $data = StaticPage::where('shortcode',PageShortCodeEnum::HOME_PAGE_WHY_CHOOSE)->first();
            if($data) {
                $dt = [];
                $dt['content'] = json_decode($data->content);
                $dt['bg_image'] = $data->image;
                $dt['video_url'] = $data->extra;
                return $dt;
            }
            return null;
        });
    }
    public function render()
    {
        return view('livewire.inc.why-choose');
    }
}
