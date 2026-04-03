<?php

namespace App\Http\Livewire\Inc;

use App\Enums\PageShortCodeEnum;
use Illuminate\Support\Facades\Response;
use Livewire\Component;

class Service extends Component
{
    public $services;
    public $password;
    public $password_value = "123456";
    public function mount(){
        $this->services = \App\Models\Service::activeService();
    }
    public function download($id){
        $service =  \App\Models\Service::where('id',$id)->first();
        $file = storage_path() . '/app/public/' . $service->file_name;
        if (file_exists($file)) {
            $headers = array(
                'Content-Type: application/pdf',
            );
            $this->dispatchBrowserEvent('alert', ['type' => 'success', 'message' => 'File is downloading!']);
            $this->dispatchBrowserEvent('close-modal', ['id' => $id]);
            return Response::download($file, 'filename.pdf', $headers);
        } else {
            $this->dispatchBrowserEvent('close-modal', ['id' => $id]);
            $this->dispatchBrowserEvent('alert', ['type' => 'error', 'message' => 'No file is found!']);
        }
    }
    public function render()
    {
        return view('livewire.inc.service');
    }
}
