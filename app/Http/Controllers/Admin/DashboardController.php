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

    public function viewContactMessage($id){
        $message = ContactMessage::with('products:id,name,slug')->find($id);
        if(!$message){
            return redirect()->route('admin.contact-message')->with('error', 'Contact message not found!');
        }
        return view('admin.contact-message-view', compact('message'));
    }

    public function deleteContactMessage($id){
        $message = ContactMessage::find($id);
        if($message){
            $message->delete();
            return redirect()->route('admin.contact-message')->with('success', 'Contact message deleted successfully!');
        }
        return redirect()->route('admin.contact-message')->with('error', 'Contact message not found!');
    }
}
