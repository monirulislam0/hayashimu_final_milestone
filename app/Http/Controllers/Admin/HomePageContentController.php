<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\StaticPageContract;
use App\Enums\PageShortCodeEnum;
use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class HomePageContentController extends BaseController
{
    protected $pageRepository;

    public function __construct(StaticPageContract $pageContract)
    {
        $this->pageRepository = $pageContract;
    }

    public function whyIChoose(){
        $data = $this->pageRepository->findStaticByShortcode(PageShortCodeEnum::HOME_PAGE_WHY_CHOOSE);
        $this->setPageTitle('Why I Choose','Edit : '.$data->page_title);
        return view('admin.home.why-i-choose',compact('data'));
    }

    public function updateWhyIChoose(Request $request){
        $params = $request->except('_token');
        $page = $this->pageRepository->updateWhyIChoose($params);

        if(!$page){
            return $this->responseRedirectBack('Error occurred while updating content','error',true,true);
        }
        Cache::forget('why-i-choose');
        return $this->responseRedirectBack('Content updated successfully','success',false,false);
    }
    public function viewMore(){
        $data = $this->pageRepository->findStaticByShortcode(PageShortCodeEnum::HOME_PAGE_VIEW_MORE);
        $this->setPageTitle('View More Page','Edit : '.$data->page_title);
        return view('admin.home.view-more',compact('data'));
    }
    public function updateViewMore(Request $request){
        $this->validate($request,[
           'content' => 'required'
        ]);
        $params = $request->except('_token');
        $page = $this->pageRepository->updateStatic($params,PageShortCodeEnum::HOME_PAGE_VIEW_MORE);

        if(!$page){
            return $this->responseRedirectBack('Error occurred while updating content','error',true,true);
        }
        Cache::forget('view_more');
        return $this->responseRedirectBack('Content updated successfully','success',false,false);
    }

    public function aboutPage(){
        $data = $this->pageRepository->findStaticByShortcode(PageShortCodeEnum::ABOUT_PAGE_CONTENT);
        $this->setPageTitle('About Us Page Content','Edit : '.$data->page_title);
        return view('admin.abouts.about',compact('data'));
    }
    public function updateAboutPage(Request $request){
        $this->validate($request,[
            'content' => 'required'
        ]);
        $params = $request->except('_token');
        $page = $this->pageRepository->updateStatic($params,PageShortCodeEnum::ABOUT_PAGE_CONTENT);

        if(!$page){
            return $this->responseRedirectBack('Error occurred while updating content','error',true,true);
        }
        Cache::forget('about_page_content');
        return $this->responseRedirectBack('Content updated successfully','success',false,false);
    }

    public function sidebarImage(){
        $data = $this->pageRepository->findStaticByShortcode(PageShortCodeEnum::SIDEBAR_IMAGE);
        $this->setPageTitle('Sidebar Image','Edit : '.$data->page_title);
        return view('admin.static.sidebar',compact('data'));
    }
    public function updateSidebarImage(Request $request){
        $params = $request->except('_token');
        $page = $this->pageRepository->updateStatic($params,PageShortCodeEnum::SIDEBAR_IMAGE);
        if(!$page){
            return $this->responseRedirectBack('Error occurred while updating content','error',true,true);
        }
        Cache::forget('sidebar_page_content');
        return $this->responseRedirectBack('Content updated successfully','success',false,false);
    }

    public function footer(){
        $data = $this->pageRepository->findStaticByShortcode(PageShortCodeEnum::FOOTER_PAGE);
        $this->setPageTitle('Footer Content','Edit : '.$data->page_title);
        return view('admin.static.footer',compact('data'));
    }
    public function updateFooter(Request $request){
        $this->validate($request,[
            'content' => 'required',
        ]);
        $params = $request->except('_token');
        $page = $this->pageRepository->updateStatic($params,PageShortCodeEnum::FOOTER_PAGE);

        if(!$page){
            return $this->responseRedirectBack('Error occurred while updating content','error',true,true);
        }
        Cache::forget('footer_page_content');
        return $this->responseRedirectBack('Content updated successfully','success',false,false);
    }
    public function topSidebar(){
        $data = $this->pageRepository->findStaticByShortcode(PageShortCodeEnum::TOP_SIDEBAR);
        $this->setPageTitle('Top Sidebar','Edit : '.$data->page_title);
        return view('admin.static.top-sidebar',compact('data'));
    }

    public function updateTopSidebar(Request $request){
        $this->validate($request,[
            'content' => 'required',
        ]);
        $params = $request->except('_token');
        $page = $this->pageRepository->updateStatic($params,PageShortCodeEnum::TOP_SIDEBAR);

        if(!$page){
            return $this->responseRedirectBack('Error occurred while updating content','error',true,true);
        }
        Cache::forget('top_sidebar_content');
        return $this->responseRedirectBack('Content updated successfully','success',false,false);
    }

    public function newsBanner(){
        $data = $this->pageRepository->findStaticByShortcode(PageShortCodeEnum::NEWS_BANNER);
        $this->setPageTitle('NewsBanner','Edit : '.$data->page_title);
        return view('admin.static.news-banner',compact('data'));
    }
    public function updateNewsBanner(Request $request){
        $params = $request->except('_token');
        $page = $this->pageRepository->updateStatic($params,PageShortCodeEnum::NEWS_BANNER);
        if(!$page){
            return $this->responseRedirectBack('Error occurred while updating content','error',true,true);
        }
        Cache::forget('new_banner_content');
        return $this->responseRedirectBack('Content updated successfully','success',false,false);
    }

    public function certificationBanner(){
        $data = $this->pageRepository->findStaticByShortcode(PageShortCodeEnum::CERTIFICATION_BANNER);
        $this->setPageTitle('Certification Banner','Edit : '.$data->page_title);
        return view('admin.static.certification-banner',compact('data'));
    }
    public function updateCertificationBanner(Request $request){
        $params = $request->except('_token');
        $page = $this->pageRepository->updateStatic($params,PageShortCodeEnum::CERTIFICATION_BANNER);
        if(!$page){
            return $this->responseRedirectBack('Error occurred while updating content','error',true,true);
        }
        Cache::forget('certification_banner_content');
        return $this->responseRedirectBack('Content updated successfully','success',false,false);
    }
}
