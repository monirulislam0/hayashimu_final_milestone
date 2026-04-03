<?php

namespace App\Http\Livewire\Setting;

use App\Models\Setting;
use Livewire\Component;

class Footer extends Component
{
    public $footer_copyright_text;
    public $seo_meta_title;
    public $seo_meta_description;
    public function mount(){
        $this->footer_copyright_text = config('settings.footer_copyright_text');
        $this->seo_meta_title = config('settings.seo_meta_title');
        $this->seo_meta_description = config('settings.seo_meta_description');
    }

    public function setting_footer(){
        Setting::set('footer_copyright_text',$this->footer_copyright_text);
        Setting::set('seo_meta_title',$this->seo_meta_title);
        Setting::set('seo_meta_description',$this->seo_meta_description);
        $this->dispatchBrowserEvent('alert',['type'=>'success','message'=>'Data updated successfully']);
    }
    public function render()
    {
        return view('livewire.setting.footer');
    }
}
