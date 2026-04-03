<?php

namespace App\Http\Controllers;

use App\Enums\NewsTypeEnum;
use App\Models\Category;
use App\Models\News;
use App\Models\Order;
use App\Models\Product;
use App\Models\StaticPage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Jorenvh\Share\Share;
use Artisan;
class FrontendController extends BaseController
{

    public function home(){
       //  Artisan::call('storage:link');
        $this->setPageTitle(config('settings.site_title'),'Home');
        $page_type = 'home';
        return view('home',compact('page_type'));
    }
    

    public function aboutUs(){
        $this->setPageTitle(config('settings.site_title'),'About Us');
        $page_type = 'about';
        $content = StaticPage::aboutContent()->first();
        return view('about-us',compact('content','page_type'));

    }

    public function categoryProduct($slug){
        $this->setPageTitle(config('settings.site_title'),'Products');
        $category = Category::categoryProductWithSlug($slug);
        return view('products',compact('category'));
    }
    public function productCenter(){
        $this->setPageTitle(config('settings.site_title'),'Product Center');
        return view('product-center');
    }
   
    public function products(){
         $this->setPageTitle(config('settings.site_title'),'Products');
        return view('all');
    }
    
    public function productDetail($slug){
       $product = Product::productDetail($slug);
        if(!$product){
            abort(404);
        }
        $this->setPageTitle(config('app.name'), $product['name'], $product['meta_tags'], $product['meta_description'], $product['meta_title']);
        return view('product-detail', compact('product'));
    }

    public function service(){
        $this->setPageTitle(config('settings.site_title'),'Services');
        return view('service');
    }
    public function contactUs(){
        $this->setPageTitle(config('settings.site_title'),'Contact Us');
        return view('contact');
    }

    public function news($news_type){
        $banner = StaticPage::newsBanner();
        if($news_type== strtolower('new-products')){
            $type = NewsTypeEnum::NEW_PRODUCTS;
            $name ="New Products";
        }elseif ($news_type == strtolower('industry-new')){
            $type = NewsTypeEnum::INDUSTRY_NEWS;
            $name ="Industry News";
        }elseif ($news_type == strtolower('exhibition-news')){
            $type = NewsTypeEnum::EXHIBITION_NEWS;
            $name ="Exhibition News";
        }elseif($news_type == strtolower('certification')){
            $name ="Certification";
            $type = NewsTypeEnum::CERTIFICATION;
            $banner = StaticPage::certificationBanner();
        }else{
            $name ="Company News";
            $type = NewsTypeEnum::COMPANY_NEWS;
        }
        $data = News::activeNews($type->value);
        $this->setPageTitle(config('settings.site_title'),'News');
        return view('news',compact('data','news_type','name','banner'));
    }
    public function newsDetail($type,$slug)
    {
        $data = News::newsDetail($slug);
        $this->setPageTitle(config('settings.site_title'),'News Details');
        return view('news-detail',compact('data','type'));

    }
    public function cart(){
        $cart =  \Cart::getContent()->count();
        if($cart<=0){
            return redirect(route('frontend.home'));
        }
        $this->setPageTitle(config('settings.site_title'),'Cart');
        return view('cart');
    }

    public function checkout(){
       $cart =  \Cart::getContent()->count();
        if($cart<=0){
            return redirect(route('frontend.home'));
        }
        $this->setPageTitle(config('settings.site_title'),'Checkout');
        return view('checkout');
    }


    public function completeOrder($order_no){
        $order = Order::where('order_no',$order_no)->select('id')->first();
        if($order) {
            $this->setPageTitle('Order Complete', 'Order Complete');
            return view('order-complete',compact('order_no'));
        }else{
            return redirect(route('frontend.home'));
        }
    }

    public function myAccount(){
        $this->setPageTitle('User', 'User Account');
        return view('user');
    }

    public function search(Request $request){
        $this->validate($request,[
            'key' => 'required'
        ]);
        $this->setPageTitle(config('settings.site_title'),'Products');
        $products = Product::where('name','like','%' . $request->input('key') . '%')->limit(15)->get()?->toArray();
        return view('search-products',compact('products'));
    }
    
    public function inquire()
    {
        $this->setPageTitle('Inquire', 'Inquire');
        return view('inquire');
    }

    public function inquireSuccess()
    {
        $this->setPageTitle('Inquire', 'Inquire Success');
        return view('inquire-success');
    }
}
