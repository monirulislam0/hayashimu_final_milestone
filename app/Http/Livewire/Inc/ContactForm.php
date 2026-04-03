<?php

namespace App\Http\Livewire\Inc;

use App\Models\ContactMessage;
use Livewire\Component;

class ContactForm extends Component
{
    public $name;
    public $mobile;
    public $email;
    public $message;
    public $country_name;
    public $success_message;

    public function submit(){
        $this->validate([
            'name' => 'required|min:3|max:255',
            'mobile' => 'required|numeric|digits:11',
            'email' => 'required|email',
            'message' => 'required|min:5',
        ]);
        $data = new ContactMessage();
        $data->name = $this->name;
        $data->mobile = $this->mobile;
        $data->email = $this->email;
        $data->message = $this->message;
        $data->country_name = $this->country_name;
        $data->save();
        $this->name = '';
        $this->email = '';
        $this->country_name = '';
        $this->mobile = '';
        $this->message = '';
        $this->success_message = 'Thank You, Your Message Successfully Sent!';
        $this->dispatchBrowserEvent('alert', ['type' => 'success',  'message' => 'Thank You, Your Message Successfully Sent!']);
    }
//    private function resetValue(){
//
//    }
    public function render()
    {
        return view('livewire.inc.contact-form');
    }

}
