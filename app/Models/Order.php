<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = ['order_no','shipping_id','shipping_method','payment_method'.
    'payment_status','order_status','sub_total','tax','delivery_charge','grand_total','is_active'];

    protected $casts = [
        'sub_total'=>'float',
        'delivery_charge' => 'float',
        'grand_total' => 'float',
        'is_active'   => 'boolean'
    ];

    public function user(){
        return $this->belongsTo('App\Models\User','user_id','id');
    }
    public function shipping(){
        return $this->belongsTo(Shipping::class,'shipping_id','id');
    }

    public function order_details(){
        return $this->hasMany(OrderDetail::class);
    }
}
