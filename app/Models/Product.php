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
        }else{
            return "Dừng bán";
        }
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
