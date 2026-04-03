<?php

namespace App\Http\Livewire\Setting;

use App\Models\Setting;
use Livewire\Component;

class GeneralSetting extends Component
{
    public $site_name;
    public $site_title;
    public $mobile;
    public $default_email_address;
    public $address_1;
    public $address_2;
    public $phone;

    public function mount(){
        $this->site_title = config('settings.site_title');
        $this->site_name = config('settings.site_name');
        $this->mobile    = config('settings.mobile');
        $this->phone    = config('settings.phone');
        $this->default_email_address = config('settings.default_email_address');
        $this->address_1 = config('settings.address_1');
        $this->address_2  = config('settings.address_2');
    }

    public function setting_update(){
        Setting::set('site_name',$this->site_name);
        Setting::set('site_title',$this->site_title);
        Setting::set('mobile',$this->mobile);
        Setting::set('phone',$this->phone);
        Setting::set('default_email_address',$this->default_email_address);
        Setting::set('address_1',$this->address_1);
        Setting::set('address_2',$this->address_2);
        $this->dispatchBrowserEvent('alert', ['type' => 'success', 'message' => 'Data updated successfully.']);
    }
    public function render()
    {
        return view('livewire.setting.general-setting');
    }
}
