<?php

namespace App\Http\Livewire\Setting;

use App\Models\Setting;
use App\Trait\UploadAble;
use Livewire\Component;

class Popup extends Component
{
    use UploadAble;


    public $popup;
    public $popup_link;
    public $popup_url;
    public $is_popup_active=true;
    public $status;
    public function mount(){
        $this->popup_link = asset('sy/').'/'.config('settings.popup');
        if(config('settings.is_popup_active')==1){
            $this->is_popup_active = true;
        }else{
            $this->is_popup_active = false;
        }
        $this->popup_url = config('settings.popup_url');
    }
    public function setting_popup(){

        $this->validate([
            'popup' => 'nullable|mimes:jpg,png,webp,jpeg,gif|max:200',
            'popup_url' => 'nullable:string|max:255'
        ]);
        if($this->popup!=null){
            $popup = $this->uploadDeleteFile($this->popup,'popup');
            $this->popup_link = asset('sy/').'/'.$popup;
        }
        if($this->popup_url!=null) {
            Setting::set('popup_url', $this->popup_url);
        }
        Setting::set('is_popup_active',$this->is_popup_active);

        $this->dispatchBrowserEvent('alert', ['type' => 'success', 'message' => 'Images updated successfully.']);
    }
    public function render()
    {
        return view('livewire.setting.popup');
    }
}
