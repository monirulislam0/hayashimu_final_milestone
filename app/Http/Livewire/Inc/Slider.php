<?php

namespace App\Http\Livewire\Inc;

use App\Contracts\SliderContract;
use App\Repositories\SliderRepository;
use Livewire\Component;
use App\Models\Slider as Sliders;

class Slider extends Component
{

    public function render()
    {
        $top_sliders = Sliders::allTop();
        $down_sliders = Sliders::allDown();
        return view('livewire.inc.slider',compact('top_sliders','down_sliders'));
    }
}
