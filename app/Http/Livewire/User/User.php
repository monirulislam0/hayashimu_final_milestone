<?php

namespace App\Http\Livewire\User;

use App\Models\Area;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\UserDetail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class User extends Component
{
    public $name;
    public $email;
    public $address;
    public $apartment;
    public $post_code;
    public $area;
    public $div_name;
    public $dist_name;
    public $area_name;
    public $step = 1;
    public $area_id;
    public array $areas = [];
    public array $divisions = [];
    public array $districts = [];
    public $change_status = 0;
    public $content_view = 'order';
    public array $orders =[];
    public array $details =[];
    public $order_no;
    public function mount(){
        $this->isLogin();
            $this->orders = Order::where('user_id', Auth::guard('web')->user()->id)
                ->select('id', 'order_no', 'order_status', 'payment_status', 'grand_total')
                ->get()->toArray();
            $this->name = Auth::guard('web')->user()->name;
            $this->email = Auth::guard('web')->user()->email;
            $details = UserDetail::with(['area' => function ($q) {
                $q->with(['parent' => function ($p) {
                    $p->with(['parent' => function ($p1) {
                        $p1->select('id', 'parent_id', 'name');
                    }])
                        ->select('id', 'parent_id', 'name');
                }])
                    ->select('id', 'parent_id', 'name');
            }])
                ->where('user_id', Auth::guard('web')->user()->id)->first();
            if ($details) {
                $this->address = $details->address;
                $this->apartment = $details->apartment;
                $this->post_code = $details->zip;
                if (isset($details->area->parent->parent->name)) {
                    $this->div_name = $details->area->parent->parent->name;
                    $this->dist_name = $details->area->parent->name;
                    $this->area_name = $details->area->name;
                }

            }

            $this->divisions = Area::areaByParentId(0)->toArray();

    }
    public function selectDivUser($value){
        $this->districts = Area::areaByParentId($value)?->toArray();
        $this->step = 2;

    }
    public function selectDistUser($value){
        $this->areas = Area::areaByParentId($value)?->toArray();
        $this->step = 3;

    }
    public function selectAreaUser($value){
        $this->area_id = $value;
        $this->step = 4;

    }
    public function updateUserLocation(){
        $this->isLogin();
        $user = UserDetail::where('user_id',Auth::guard('web')->user()->id);
        if($user) {
            $user->update(['area_id' => $this->area_id]);
        }else{
            $new_user = new UserDetail();
            $new_user->area_id = $this->area_id;
        }
        $area = Area::with(['parent'=>function($q){
            $q->with(['parent'=>function($p){
                $p->select('id','parent_id','name');
            }])
                ->select('id','parent_id','name');
        }])
            ->select('id','parent_id','name')
        ->where('id',$this->area_id)
            ->first();

        if(isset($area->parent->parent->name)){
            $this->div_name = $area->parent->parent->name;
            $this->dist_name = $area->parent->name;
            $this->area_name = $area->name;
        }
        $this->change_status = 0;
        $this->dispatchBrowserEvent('alert', ['type' => 'success', 'message' => 'Your data updated successfully.']);
    }
    public function changeStatus(){
        $this->change_status = 1;
    }
    public function changeContent($value){
        $this->content_view = $value;
    }
    public function updateUser(){
        $this->isLogin();
        $this->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|max:255',
            'address' => 'required|string|max:255',
            'apartment' => 'nullable|string|max:255',
            'post_code' => 'nullable|numeric'
        ]);
        DB::transaction(function (){
            try {
                $user_id = Auth::guard('web')->user()->id;
                $user = \App\Models\User::find($user_id);
                $user_detail = UserDetail::where('user_id',$user_id);
                $data = ['name'=>$this->name,'email'=>$this->email];
                $details = ['address'=>$this->address,'apartment'=>$this->apartment,'zip'=>$this->post_code];
                $user->update($data);
                if($user_detail) {
                    $user_detail->update($details);
                }else{
                    $new_detail = new UserDetail();
                    $new_detail->user_id = $user_id;
                    $new_detail->area_id = 0;
                    $new_detail->address = $this->address;
                    $new_detail->apartment = $this->apartment;
                    $new_detail->zip = $this->postal_code;
                }
                DB::commit();
                $this->dispatchBrowserEvent('alert', ['type' => 'success', 'message' => 'Item successfully removed from cart.']);
            }catch (\Exception $e){
                DB::rollBack();
                $this->dispatchBrowserEvent('alert', ['type' => 'error', 'message' => $e]);
                throw $e;
            }
        });
    }
    public function viewDetail($id,$order_no){
        $this->details= OrderDetail::with('products:id,name')
            ->where('order_id',$id)
            ->select('id','product_id','qty','price')
            ->get()?->toArray();
        $this->order_no = $order_no;
        $this->content_view = 'detail_order';
    }
    private function isLogin(){
        if(!Auth::guard('web')->check()){
            return redirect(route('frontend.login'));
        }
    }
    public function render()
    {
        return view('livewire.user.user');
    }
}
