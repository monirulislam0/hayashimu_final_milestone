<?php

namespace App\Http\Livewire\Setting;

use App\Models\Setting;
use Livewire\Component;

class Analytic extends Component
{
    public $google_analytics;
    public $google_tag_manager;
    public $messenger_script;
    public function mount(){
        $this->google_analytics   = config('settings.google_analytics');
        $this->google_tag_manager = config('settings.google_tag_manager');
        $this->facebook_pixels     = config('settings.facebook_pixels');
        $this->messenger_script     = config('settings.messenger_script');
    }
    public function setting_analytic(){
        Setting::set('google_analytics',$this->google_analytics);
        Setting::set('google_tag_manager',$this->google_tag_manager);
        Setting::set('facebook_pixels',$this->facebook_pixels);
        Setting::set('messenger_script',$this->messenger_script);
        $this->dispatchBrowserEvent('alert',['type'=>'success','message'=>'Data updated successfully']);

    }
    public function render()
    {
        return view('livewire.setting.analytic');
    }
}
