<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderManagementController extends BaseController
{
    public function index(){
        $this->setPageTitle('Order management','Mange all orders');
        return view('admin.orders.index');
    }

    public function viewOrder($id){
        $this->setPageTitle('Order management','View order details');
        return view('admin.orders.view',compact('id'));
    }
}
