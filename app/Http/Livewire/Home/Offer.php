<?php

namespace App\Http\Livewire\Home;

use App\Models\Slider;
use Livewire\Component;

class Offer extends Component
{
    public $banners;
    public function mount(){
        $this->banners = Slider::allBanner()?->toArray();
    }
    public function render()
    {
        return view('livewire.home.offer');
    }
}
