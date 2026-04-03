<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Service extends Model
{
    use HasFactory;

    protected $table = 'services';
    protected $fillable  = ['title','file_name','status'];

    public function scopeActiveService($query){
        return Cache::remember('service',5000, function ()use ($query){
            return $query->where(['status'=>1])->select('id','title','file_name')->orderBy('title','asc')->get();
        });
    }
}
