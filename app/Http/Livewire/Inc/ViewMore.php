<?php

namespace App\Http\Livewire\Inc;

use App\Enums\PageShortCodeEnum;
use App\Models\StaticPage;
use Illuminate\Support\Facades\Cache;
use Livewire\Component;

class ViewMore extends Component
{
    public $content;
    public function mount()
    {
        $this->data = Cache::remember('view_more',5000,function (){
            return StaticPage::where('shortcode',PageShortCodeEnum::HOME_PAGE_VIEW_MORE)->first();
        });
    }
    public function render()
    {
        return view('livewire.inc.view-more');
    }
}
