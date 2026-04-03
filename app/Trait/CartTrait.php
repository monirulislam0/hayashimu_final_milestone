<?php
namespace App\Trait;

use App\Models\Product;
use App\Models\User;
use Darryldecode\Cart\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

trait CartTrait
{

    public function addItem($item_id,$qty=1)
    {
        $product = Product::productById($item_id);
        if (isset($product->id)) {
            if($product->price==null || $product->price==0){
               return false; 
            }
            \Cart::add([
                'id' => $product->id,
                'name' => $product->name,
                'specification' => '',
                'price' => $product->price,
                'quantity' => $qty,

                'attributes' => [
                    'image' => $product->image,
                    'product_id' => $product->id,
                    'price' => $product->price,
                    'discount' => $product->discount,
                ]
            ]);

            return true;
        }
        return false;
    }

    public function loginById($mobile_no)
    {
        $user = User::where('phone', $mobile_no)->first();
        if ($user) {
            Auth::guard('web')->loginUsingId($user->id);
        } else {
            $newUser = new User();
            $newUser->phone = $mobile_no;
            $newUser->name = 'Guest User';
            $newUser->save();
            Auth::guard('web')->loginUsingId($newUser->id);
        }
    }

    public function logout(){
        Auth::guard('web')->logout();
        return redirect(route('frontend.login'));
    }
    
     public function addInquire($item_id)
    {
        $inquire_array = [];
        if (Session::has('inquireSession') && is_array(Session::get('inquireSession'))){
            $inquire_array = Session::get('inquireSession');
        }

        $product = Product::productById($item_id);
        if($product){
            $product_array = [
                'id' => $item_id,
                'name' => $product->name,
                'image' => $product->image
            ];

            $inquire_array[] = $product_array;
            Session::put('inquireSession',$inquire_array);
            return Session::get('inquireSession');
        }
        return false;
    }

    public function getInquire()
    {
        $inquire_data= [];
        if(Session::has('inquireSession')){
            $inquire_data = Session::get('inquireSession');
        }

        return $inquire_data;

    }

    public function destroyInquire()
    {
       Session::forget('inquireSession');
    }

}