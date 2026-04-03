<?php

namespace App\Http\Livewire\Products;

use Livewire\Component;

class Breadcrumb extends Component
{
    public $category_name;

    public function mount($category_name){
       $this->category_name = $category_name;
    }
    public function render()
    {
        return view('livewire.products.breadcrumb');
    }
}
