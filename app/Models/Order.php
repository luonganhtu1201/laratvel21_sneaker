<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = ['name','phone','address','total','user_id','status','note'];
    public function products(){
        return $this->belongsToMany(Product::class);
    }
    public function orderproducts(){
        return $this->hasMany(Orderproduct::class);
    }
    public function getStatusGoodsAttribute(){
        if($this->status == 0){
            return "Đợi duyệt";
        }elseif($this->status == 1){
            return "Nhận đơn";
        }elseif($this->status == 2){
            return "Đang giao";
        }elseif ($this->status == 3){
            return "Giao thành công";
        }elseif ($this->status == -1){
            return "Shop hủy đơn";
        }elseif ($this->status == -2){
            return "Khách yêu cầu hủy đơn";
        }elseif ($this->status == -3){
            return "Shop đồng ý hoàn trả";
        }elseif ($this->status == -4){
            return "Hoàn trả thành công";
        }elseif ($this->status == -5){
            return "Khách hủy đơn";
        }
    }
    public function scopeSearch($query, $request)
    {
        if ($request->has('key_search')) {
            $query->where('name', 'LIKE', '%'.$request->key_search.'%')->orderBy('created_at', 'DESC');
        }

        return $query;
    }
    public function scopeStatus($query, $request){
        if ($request->has('status')){
            if ($request->status == -6){
                $query->where('status',0)->orderBy('created_at','DESC');
            }elseif ($request->status == 1){
                $query->where('status',1)->orderBy('created_at','DESC');
            }elseif ($request->status == 2){
                $query->where('status',2)->orderBy('created_at','DESC');
            }elseif ($request->status == 3){
                $query->where('status',3)->orderBy('created_at','DESC');
            }elseif ($request->status == -1){
                $query->where('status',-1)->orderBy('created_at','DESC');
            }elseif ($request->status == -2){
                $query->where('status',-2)->orderBy('created_at','DESC');
            }elseif ($request->status == -3){
                $query->where('status',-3)->orderBy('created_at','DESC');
            }elseif ($request->status == -4){
                $query->where('status',-4)->orderBy('created_at','DESC');
            }elseif ($request->status == -5){
                $query->where('status',-5)->orderBy('created_at','DESC');
            }
        }
        return $query;
    }
    public function scopePrice($query, $request){
        if ($request->has('choice')){
            if ($request->choice == -1){
                $query->orderBy('created_at','DESC');
            }elseif ($request->choice == 1){
                $query->orderBy('total','ASC');
            }elseif ($request->choice == 2){
                $query->orderBy('total','DESC');
            }elseif ($request->choice == 3){
                $query->orderBy('id','DESC');
            }elseif ($request->choice == 4){
                $query->orderBy('id','ASC');
            }
        }
        return $query;
    }
}
