<?php

namespace App\Http\Livewire\Inc;

use App\Models\Category;
use App\Models\StaticPage;
use App\Models\Subscribe;
use Livewire\Component;

class Footer extends Component
{
    public $email;
    public  $categories;
    public $footerContent;

    public function mount(){
        $this->categories = Category::features();
        $this->footerContent = StaticPage::footerContent();

    }
    public function render()
    {
        return view('livewire.inc.footer');
    }

    public function subscribe(){
       $this->validate([
         'email'=>'required|email|max:255|unique:subscribes'
       ]);
       $subscribe = new Subscribe();
       $subscribe->email = $this->email;
       $subscribe->save();
       $this->email = '';
       $this->dispatchBrowserEvent('alert', ['type' => 'success', 'message' => 'Thank you for your subscription!']);
    }
}
