<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;

class SettingController extends BaseController
{
    public function index(){
        $this->setPageTitle('Settings','Manage Settings');
        return view('admin.setting');
    }
}
