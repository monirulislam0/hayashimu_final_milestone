<?php

namespace App\Http\Livewire\Setting;

use App\Models\Setting;
use Livewire\Component;

class Social extends Component
{
    public $social_facebook;
    public $social_twitter;
    public $social_youtube;
    public $social_linkedin;
    public $social_instagram;
    public function mount(){
        $this->social_facebook = config('settings.social_facebook');
        $this->social_twitter = config('settings.social_twitter');
        $this->social_youtube = config('settings.social_youtube');
        $this->social_linkedin = config('settings.social_linkedin');
        $this->social_instagram = config('settings.social_instagram');
    }
    public function setting_social(){
        Setting::set('social_facebook',$this->social_facebook);
        Setting::set('social_twitter',$this->social_twitter);
        Setting::set('social_youtube',$this->social_youtube);
        Setting::set('social_linkedin',$this->social_linkedin);
        Setting::set('social_instagram',$this->social_instagram);
        $this->dispatchBrowserEvent('alert', ['type' => 'success', 'message' => 'Data updated successfully.']);
    }
    public function render()
    {
        return view('livewire.setting.social');
    }
}
