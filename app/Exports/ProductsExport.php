<?php

namespace App\Exports;

use App\Models\Product;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ProductsExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $arr = [];
        $data = Product::with('categories:id,name')
            ->select(
                'id','name','model','brand', 'emi_text','product_attribute as attributes',
                'price', 'discount','stock','unit',
                'status','featured','in_stock', 'meta_tags','meta_title','meta_description','description',
            )
            ->get();
        foreach ($data as $dt){
            $tem_arr['name']=$dt->name;
            $cat = '';
            foreach ($dt->categories as $category){
                $cat .=$category->name.',';
            }
            $tem_arr['categories'] = $cat;
            $tem_arr['model'] = $dt->model;
            $tem_arr['brand'] = $dt->brand;
            $tem_arr['emi_text'] = $dt->emi_text;
            $tem_arr['attribute'] = $dt->attributes;
            $tem_arr['price'] = $dt->price;
            $tem_arr['discount'] = $dt->discount;
            $tem_arr['stock'] = $dt->stock;
            $tem_arr['unit'] = $dt->unit;
            $tem_arr['status'] = $dt->status;
            $tem_arr['featured'] = $dt->featured;
            $tem_arr['in_stock'] = $dt->in_stock;
            $tem_arr['meta_tags'] = $dt->meta_tags;
            $tem_arr['meta_title'] = $dt->meta_title;
            $tem_arr['meta_description'] = $dt->meta_description;
            $tem_arr['description'] = $dt->description;
            array_push($arr, $tem_arr);
        }

        return new Collection($arr);
    }

    public function headings():array
    {
        return [
            'Product Name','Category Name' ,'Model','Brand',"Emi Text",'Attributes', "Price",'Discount', 'Stock','Unit',
            'Status','Featured','In Stock','Meta Tags','Meta Title','Meta Description','Description'
            ];
    }
}
