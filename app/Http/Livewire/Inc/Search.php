<?php

namespace App\Http\Livewire\Inc;

use App\Models\Product;
use Livewire\Component;

class Search extends Component
{
    public $key;
    public function render()
    {
        return view('livewire.inc.search');
    }
}
