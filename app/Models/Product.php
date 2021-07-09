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
            return "Đang bán";
        }elseif($this->status == 0){
            return "Đang nhập";
        }elseif($this->status == -1){
            return "Dừng bán";
        }
    }

    public function getContentMorezAttribute(){
         return json_decode($this->content_more);
    }

    const STATUS_INIT = 0;
    const STATUS_BUY = 1;
    const STATUS_STOP = -1;
    public static $status_text = [
        self::STATUS_INIT => 'Đang nhập',
        self::STATUS_BUY => 'Đang bán',
        self::STATUS_STOP => 'Dừng bán'
    ];
    const SIZE_36 = 36;
    const SIZE_37 = 37;
    const SIZE_38 = 38;
    const SIZE_39 = 39;
    const SIZE_40 = 40;
    const SIZE_41 = 41;
    const SIZE_42 = 42;
    const SIZE_43 = 43;
    const SIZE_44 = 44;
    public static $size_text =[
        self::SIZE_36 => '36',
        self::SIZE_37 => '37',
        self::SIZE_38 => '38',
        self::SIZE_39 => '39',
        self::SIZE_40 => '40',
        self::SIZE_41 => '41',
        self::SIZE_42 => '42',
        self::SIZE_43 => '43',
        self::SIZE_44 => '44',
    ];
    const COLOR_RED = '#FF0000';
    const COLOR_WHITE = '#FFFFFF';
    public static $color_text =[
        self::COLOR_RED => 'Đỏ',
        self::COLOR_WHITE => 'Trắng',
    ];

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
    public function comments(){
        return $this->hasMany(Comment::class);
    }
    public function warehouses(){
        return $this->hasMany(Warehouse::class);
    }
    public function scopeStatus($query, $request)
    {
        if ($request->has('status')) {
            if ($request->get('status') == -2) {
                $query;
            } else {
                $query->where('status', $request->status)->orderBy('created_at', 'DESC');
            }
        }

        return $query;
    }
    public function scopeCategory($query, $request)
    {
        if ($request->has('category')) {
            if ($request->get('category') == -1) {
                $query;
            } else {
                $query->where('category_id', $request->category)->orderBy('created_at', 'DESC');
            }
        }

        return $query;
    }
    public function scopeOrder($query, $request)
    {
        if ($request->has('orderby')){
            if( $request->get('orderby') == 'price_desc' ) {
                $query->orderBy('sale_price', 'DESC');
            } elseif ($request->get('orderby') == 'price_asc'){
                $query->orderBy('sale_price', 'ASC');
            } else{
                $query->orderBy('id','desc');
            }
        }

        return $query;
    }
    public function scopePrice($query, $request)
    {
        if ($request->has('price')){
            if( $request->get('price') == '1' ) {
                $query->where('sale_price','<', 1000000);
            } elseif ($request->get('price') == '2'){
                $query->whereBetween('sale_price',[1000000,1500000]);
            } elseif ($request->get('price') == '3'){
                $query->whereBetween('sale_price',[1500000,3500000]);
            }else{
                $query->where('sale_price','>',3500000);
            }
        }

        return $query;
    }

    public function scopeSz($query, $request){
        if ($request->has('size')){
            $size = $request->size;
            $query->whereHas('warehouses',function ($q) use ($size){
                $q->where('size',$size);
            })->get();
        }else{
            $query->orderBy('id','desc');
        }
        return $query;
    }

    public function scopeSearch($query, $request)
    {
        if ($request->has('key_search')) {
            $query->where('name', 'LIKE', '%'.$request->key_search.'%')->orderBy('created_at', 'DESC');
        }

        return $query;
    }
}
