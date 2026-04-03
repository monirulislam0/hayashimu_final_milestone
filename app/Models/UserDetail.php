<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserDetail extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','area_id','address','apartment','zip'];

    public function area(){
        return $this->belongsTo(Area::class,'area_id','id');
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
