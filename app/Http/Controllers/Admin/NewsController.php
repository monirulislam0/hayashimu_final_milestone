<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\NewsContract;
use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class NewsController extends BaseController
{
    public $newsRepository;

    public function __construct(NewsContract $newsContract)
    {
        $this->newsRepository = $newsContract;
    }
    public function index(){
        $news = $this->newsRepository->listNews('id','desc',['*'],15);
        $this->setPageTitle('News','List of all News');
        return view('admin.news.index',compact('news'));
    }

    public function create(){
        $this->setPageTitle('News','Create New News');
        return view('admin.news.create');
    }

    public function store(Request $request){
        $this->validate($request,[
            'title' => 'required|max:255|unique:news',
            'news_type' => 'required',
            'image'     => 'mimes:jpg,jpeg,png,webp|max:5000'
        ]);

        $params = $request->except('_token');

        $news = $this->newsRepository->createNews($params);

        if(!$news){
            return $this->responseRedirectBack('Error occurred while creating news','error',true,true);
        }
        $this->removeCache($params['news_type']);
        return $this->responseRedirect('admin.news.index','News Added Successfully','success',false,false);

    }

    public function edit($id)
    {
        $news = $this->newsRepository->findNewsById($id);
        $this->setPageTitle('News','Edit News : '.$news->title);
        return view('admin.news.edit',compact('news'));
    }

    public function update(Request $request){

        $this->validate($request,[
            'title' => 'required|max:255',
            'news_type' => 'required',
            'image'     => 'mimes:jpg,jpeg,png,webp|max:5000'
        ]);

        $params = $request->except('_token');
        $news = $this->newsRepository->updateNews($params);

        if(!$news){
            return $this->responseRedirectBack('Error occurred while updating news','error',true,true);
        }
        $slug = $this->newsRepository->findNewsById($params['id']);
        $this->removeCache($params['news_type'],$slug->slug);
        return $this->responseRedirectBack('News updated successfully','success',false,false);
    }

    public function delete($id){
        $news = $this->newsRepository->deleteNews($id);
        if(!$news){
            return $this->responseRedirectBack('Error occurred while deleting news','error',true,true);
        }
        $this->removeCache($news->news_type,$news->slug);
        return $this->responseRedirect('admin.news.index','News deleted Successfully','success',false,false);
    }

    protected function removeCache($type=null,$slug=null){
        Cache::forget('news_'.$type);
        Cache::forget('news_'.$slug);
    }
}
