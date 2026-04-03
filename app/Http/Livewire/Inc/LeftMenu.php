<?php

namespace App\Http\Livewire\Inc;

use App\Models\Category;
use Livewire\Component;

class LeftMenu extends Component
{
    public function render()
    {
        $categories = Category::leftMenu()?->toArray();
        return view('livewire.inc.left-menu',compact('categories'));
    }
}
