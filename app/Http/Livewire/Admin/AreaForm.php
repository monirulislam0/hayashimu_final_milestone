<?php

namespace App\Http\Livewire\Admin;

use App\Models\Area;
use Livewire\Component;

class AreaForm extends Component
{
    public $divisions = [];
    public $division_id;
    public $districts = [];
    public $district_id;
    public $step = 1;
    public function mount($id=0){
        $this->divisions = Area::where('parent_id',0)->select('id','name')->get();
        if($id!=0){
            $area = Area::where('id',$id)->first();
            if(isset($area->parent->id)){
                if (isset($area->parent->parent->id)){
                    $this->division_id = $area->parent->parent->id;
                    $this->district_id = $area->parent->id;
                    $this->districts = Area::where('parent_id',$this->division_id)->select('id','name')->get();
                    $this->step = 2;
                }else{
                    $this->division_id = $area->parent->id;
                    $this->step=1;
                }
            }else{
                $this->step = 0;
            }
        }
    }
    public function changeDiv($value){
        $this->division_id = $value;
        $this->step = 2;
        $this->districts = Area::where('parent_id',$value)->select('id','name')->get();
    }
    public function selectDistrict($value){
        $this->district_id = $value;
    }
    public function render()
    {
        return view('livewire.admin.area-form');
    }
}
