<?php

namespace App\Http\Livewire\Inc;

use App\Models\Category;
use Livewire\Component;

class Categories extends Component
{
    public $categories;
    public function mount(){
        $this->categories = Category::features();
    }
    public function render()
    {
        return view('livewire.inc.categories');
    }
}
