<?php

namespace App\Http\Livewire\Products;

use App\Models\Product;
use App\Trait\CartTrait;
use Livewire\Component;
use Livewire\WithPagination;

class Products extends Component
{
    use CartTrait;
    use WithPagination;
    public $cat_desc;
    public $cat_id;
    public $key;
    protected $listeners = ['filter_products'];
    public function mount($cat_id = null ,$desc=null){
        $this->cat_id = $cat_id;
        $this->cat_desc = $desc;
    }

    public function product_add_to_cart($id){
        $cart =  $this->addItem($id);
        if($cart){
            $this->emit('shoppingCartCount');
            $this->dispatchBrowserEvent('alert', ['type' => 'success', 'message' => 'Product added to cart successfully.']);
        }else {
            $this->dispatchBrowserEvent('alert', ['type' => 'error', 'message' => 'Product can not add to cart!.']);
        }
    }

    public function filter_products($key)
    {
        $this->key = $key;
        return $this->render();

    }

    public function render()
    {
        $query = Product::join('product_categories','products.id','=','product_categories.product_id')
            ->select('products.id','products.name','products.slug','products.image','products.model')
            ->where('status',1)
            ->orderBy('products.id','desc');
            if($this->cat_id){
            $query->where('product_categories.category_id',$this->cat_id);
            }
            if($this->key){
                $query->where('products.name','like','%'.$this->key.'%');
            }
            $products = $query->paginate(15);
        return view('livewire.products.products',['products'=>$products]);
    }
}
