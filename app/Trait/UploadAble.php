<?php
namespace App\Trait;
use App\Models\Setting;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

trait UploadAble{
    use WithFileUploads;
    public function uploadOne(UploadedFile $file,$folder=null,$disk='public',$filename=null)
    {
        $name = !is_null($filename) ? $filename : Str::random(25);
        return $file->storeAs(
            $folder,
            $name.'.'.$file->getClientOriginalName(),
            $disk
        );
    }

    public function deleteOne($path=null,$disk='public'){
        Storage::disk($disk)->delete($path);
    }

    public function uploadDeleteFile($file,$key):string
    {
        $logo = $this->uploadOne($file,'settings');
        if(config('settings.'.$key)!=null) {
            $this->deleteOne(config('settings.' . $key));
        }
        Setting::set($key,$logo);
        return $logo;
    }
}
