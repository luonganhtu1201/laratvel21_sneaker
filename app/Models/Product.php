<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['name','slug','size','inventory_number','products_sold', 'origin_price', 'sale_price', 'content', 'user_id'];
    public function getStatusTextAttribute(){
        if($this->status == 1){
            return "Còn Hàng";
        }else{
            return "Hết Hàng";
        }
    }
    protected $table = 'products';

    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function orders(){
        return $this->belongsToMany(Order::class)->withPivot('amount');
    }
    public function images(){
        return $this->hasMany(Image::class);
    }
}
