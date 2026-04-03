<?php

namespace App\Http\Livewire\Setting;

use App\Models\Setting;
use App\Trait\UploadAble;
use Livewire\Component;

class SiteLogo extends Component
{
    use UploadAble;
    public $site_logo;
    public $site_favicon;
    public $site_logo_link;
    public $site_favicon_link;

    public function mount(){
        $this->site_logo_link = asset('storage/').'/'.config('settings.site_logo');
        $this->site_favicon_link = asset('storage/').'/'.config('settings.site_favicon');
    }
    public function setting_upload(){

        $this->validate([
            'site_logo' => 'nullable|mimes:jpg,png,webp,jpeg,gif|max:200',
            'site_favicon' => 'nullable|mimes:jpg,png,webp,jpeg,gif,ico|max:200',
        ]);


        if($this->site_logo!=null){
            $logo = $this->uploadDeleteFile($this->site_logo,'site_logo');
            $this->site_logo_link = asset('sy/').'/'.$logo;
        }
        if($this->site_favicon!=null){
            $favicon = $this->uploadDeleteFile($this->site_favicon,'site_favicon');
            $this->site_favicon_link = asset('sy/').'/'.$favicon;
        }
        if($this->site_logo==null && $this->site_favicon==null){
            $this->dispatchBrowserEvent('alert', ['type' => 'error', 'message' => 'No file is selected!.']);
        }else {
            $this->dispatchBrowserEvent('alert', ['type' => 'success', 'message' => 'Images updated successfully.']);
        }
    }

//    public function uploadDeleteFile($file,$key):string
//    {
//        $logo = $this->uploadOne($file,'settings');
//        $this->deleteOne(config('settings.'.$key));
//        Setting::set($key,$logo);
//        return $logo;
//    }
    public function render()
    {
        return view('livewire.setting.site-logo');
    }
}
