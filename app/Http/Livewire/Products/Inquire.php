<?php

namespace App\Http\Livewire\Products;

use App\Models\ContactMessage;
use App\Trait\CartTrait;
use Livewire\Component;

class Inquire extends Component
{
    use CartTrait;
    public $products;

    public $name;
    public $email;
    public $tel;
    public $company_name;
    public $message;

    public function mount()
    {

       $this->products = $this->getInquire();
       if(!$this->products){
           return redirect('frontend.home');
       }

    }
    public function submitInquire()
    {
        $this->validate([
            'name' => 'required|string|max:100',
            'tel' => 'required|numeric',
            'email' => 'required|email|max:255',
            'company_name' => 'required|string|max:255',
            'message' => 'required|string|max:255',
        ]);
        if($this->products!=null){
            $ids = array_column($this->products, 'id');
            $message = new ContactMessage();
            $message->name = $this->name;
            $message->mobile = $this->tel;
            $message->email = $this->email;
            $message->company_name = $this->company_name;
            $message->message = $this->message;
            $message->save();
            $message->products()->sync($ids);
            $this->destroyInquire();
            return redirect(route('frontend.inquire.success'));
        }else{
            $this->dispatchBrowserEvent('alert', ['type' => 'error', 'message' => 'No Product is selected!.']);
        }



    }
    public function render()
    {
        return view('livewire.products.inquire');
    }
}
