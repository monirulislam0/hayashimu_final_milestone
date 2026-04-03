<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\SliderContract;
use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class SliderController extends BaseController
{
    protected $sliderRepository;

    public function __construct(SliderContract $sliderContract)
    {
        $this->sliderRepository = $sliderContract;
    }

    public function index(){
        $sliders = $this->sliderRepository->listSlider('id','desc',['*'],10);
        $this->setPageTitle('Slider','List of all Sliders');
        return view('admin.sliders.index',compact('sliders'));
    }

    public function create(){
        $this->setPageTitle('Sliders','Create New Slider');
        return view('admin.sliders.create');
    }

    public function store(Request $request){
        $this->validate($request,[
            'name' => 'required|max:191|unique:sliders',
            'image'     => 'mimes:jpg,jpeg,png,webp|max:5000'
        ]);

        $params = $request->except('_token');

        $sliders = $this->sliderRepository->createSlider($params);

        if(!$sliders){
            return $this->responseRedirectBack('Error occurred while creating slider','error',true,true);
        }
        $this->removeCache();
        return $this->responseRedirect('admin.sliders.index','Slider Added Successfully','success',false,false);

    }

    public function edit($id)
    {
        $slider = $this->sliderRepository->findSliderById($id);
        $this->setPageTitle('Sliders','Edit Slider : '.$slider->name);
        return view('admin.sliders.edit',compact('slider'));
    }

    public function update(Request $request){

        $this->validate($request,[
            'name' => 'required|max:191',
            'image'     => 'mimes:jpg,jpeg,png,webp|max:5000'
        ]);

        $params = $request->except('_token');
        $slider = $this->sliderRepository->updateSlider($params);

        if(!$slider){
            return $this->responseRedirectBack('Error occurred while updating slider','error',true,true);
        }
        $this->removeCache();
        return $this->responseRedirectBack('Slider updated successfully','success',false,false);
    }

    public function delete($id){
        $slider = $this->sliderRepository->deleteSlider($id);
        if(!$slider){
            return $this->responseRedirectBack('Error occurred while deleting slider','error',true,true);
        }
        $this->removeCache();
        return $this->responseRedirect('admin.sliders.index','Slider deleted Successfully','success',false,false);
    }

    protected function removeCache(){
        Cache::forget('active_slider');
        Cache::forget('about_page_slider');
    }

}
