<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactMessage extends Model
{
    use HasFactory;
    protected $table = 'contact_messages';
    protected $fillable = ['product_id','name','email','country_name','mobile','company_name','message'];
    
    public function products()
    {
       return $this->belongsToMany(Product::class,'contact_message_product_mapping','contact_id','product_id');
    }

}
