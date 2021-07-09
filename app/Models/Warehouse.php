<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Warehouse extends Model
{
    use HasFactory;
    protected $table = 'warehouses';
    public function product(){
        return $this->belongsTo(Product::class);
    }
    public function scopeSoldout($query, $request){
        if ($request->has('warehouses')){
            if ($request->warehouses == 1){
                $query->where('inventory','<',15)->orderBy('id', 'DESC');
            }elseif ($request->warehouses == 2){
                $query->where('inventory','>',40)->orderBy('id', 'DESC');
            }elseif ($request->warehouses == 3){
                $query->orderBy('id', 'DESC');
            }elseif ($request->warehouses == 4){
                $query->orderBy('id', 'ASC');
            }elseif ($request->warehouses == 5){
                $query->orderBy('sold_goods', 'DESC');
            }
            else{
                $query->orderBy('id', 'DESC');
            }
        }
        return $query;
    }
    public function scopeProware($query,$request){
        if ($request->has('warepro')){
            $query->where('product_id',$request->warepro)->orderBy('sold_goods', 'DESC');
        }
        return $query;
    }
}
