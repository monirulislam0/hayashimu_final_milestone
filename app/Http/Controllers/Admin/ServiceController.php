<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\ServiceContract;
use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class ServiceController extends BaseController
{
    protected $serviceRepository;

    public function __construct(ServiceContract $serviceContract)
    {
        $this->serviceRepository = $serviceContract;
    }

    public function index(){
        $services = $this->serviceRepository->listSerice('id','desc',['*']);
        $this->setPageTitle('Services','List of all service documents');
        return view('admin.services.index',compact('services'));
    }

    public function create(){
        $this->setPageTitle('Services','Create New Service Documents');
        return view('admin.services.create');
    }

    public function store(Request $request){
        $this->validate($request,[
            'title' => 'required|max:191|unique:services',
            'file_name'     => 'required'
        ]);

        $params = $request->except('_token');

        $service = $this->serviceRepository->createService($params);

        if(!$service){
            return $this->responseRedirectBack('Error occurred while creating service','error',true,true);
        }
        $this->removeCache();
        return $this->responseRedirect('admin.services.index','Service Added Successfully','success',false,false);

    }

    public function edit($id)
    {
        $service = $this->serviceRepository->findServiceById($id);
        $this->setPageTitle('Services','Edit Service : '.$service->name);
        return view('admin.services.edit',compact('service'));
    }

    public function update(Request $request){

        $this->validate($request,[
            'title' => 'required|max:191',
            'file_name' => 'nullable'
        ]);

        $params = $request->except('_token');
        $service = $this->serviceRepository->updateSerivce($params);

        if(!$service){
            return $this->responseRedirectBack('Error occurred while updating service','error',true,true);
        }
        $this->removeCache();
        return $this->responseRedirectBack('Service updated successfully','success',false,false);
    }

    public function delete($id){
        $service = $this->serviceRepository->deleteService($id);
        if(!$service){
            return $this->responseRedirectBack('Error occurred while deleting service','error',true,true);
        }
        $this->removeCache();
        return $this->responseRedirect('admin.services.index','Service deleted Successfully','success',false,false);
    }

    protected function removeCache(){
        Cache::forget('service');
    }
}
