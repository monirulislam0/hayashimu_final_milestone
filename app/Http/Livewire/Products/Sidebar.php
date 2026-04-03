<?php

namespace App\Http\Livewire\Products;

use App\Models\Product;
use App\Models\Category;
use App\Models\StaticPage;
use Livewire\Component;

class Sidebar extends Component
{
    public $categories;
    public $filter_key;
    public $sidebarImage;
    public $topSidebar;
    public $is_show_top_sidebar;
    public $suggestions = [];
    public $noResultsMessage = '';

    public function mount($is_show_top_sidebar=1){
        $this->categories = Category::menu();
        $this->sidebarImage = StaticPage::sidebar();
        $this->topSidebar   = StaticPage::topSidebar();
        $this->is_show_top_sidebar = $is_show_top_sidebar;
    }

    public function filter(){
        $this->suggestions = [];
        
        $this->suggestions = Product::where('name', 'like', '%' . $this->filter_key . '%')->limit(5)->get();
        
        if (count($this->suggestions) === 0) {
            $this->noResultsMessage = 'No products available.';
        } else {
            $this->noResultsMessage = '';
        }
        
        $this->emit('filter_products',$this->filter_key);
    }
    public function render()
    {
        return view('livewire.products.sidebar');
    }
}
