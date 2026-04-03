<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Shipping extends Model
{
    use HasFactory,Notifiable;
    protected $fillable = ['name','mobile_no','email','address','apartment','zip'];
}
