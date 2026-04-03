<?php

namespace App\Http\Livewire\Inc;

use Livewire\Component;

class AboutSlider extends Component
{
    public $sliders;
    public function mount(){
        $this->sliders = \App\Models\Slider::aboutSlider();
    }
    public function render()
    {
        return view('livewire.inc.about-slider');
    }
}
