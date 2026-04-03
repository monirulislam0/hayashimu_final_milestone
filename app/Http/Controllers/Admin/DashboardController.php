<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\ContactMessage;
use App\Models\Order;
use App\Models\Product;
use App\Models\Subscribe;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public function index(){
        $total_products = Product::count();
        $total_category = Category::count();
        $total_order = Order::count();
        $total_sell = Order::sum('grand_total');
        return view('admin.dashboard',compact('total_products',
            'total_order',
            'total_category',
        'total_sell'
        ));
    }

    public function contactMessage(){
        $messages = ContactMessage::with('products:id,name')->orderBy('id','desc')->paginate(50);
        return view('admin.contact-message',compact('messages'));
    }
}
