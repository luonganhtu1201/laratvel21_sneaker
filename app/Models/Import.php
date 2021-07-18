<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Import extends Model
{
    use HasFactory;
    protected $fillable = ['name','phone','address','total','user_id','status','note'];
    public function products(){
        return $this->belongsToMany(Product::class);
    }
    public function orderproducts(){
        return $this->hasMany(Importproduct::class);
    }
    public function getStatusProAttribute(){
        if ($this->status == 0){
            return "Đợi duyệt đơn";
        }elseif ($this->status == 1){
            return "Nhập hàng thành công";
        }elseif ($this->status == -1){
            return "Hủy đơn";
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
            if ($request->status == 0){
                $query->where('status',0)->orderBy('created_at','DESC');
            }elseif ($request->status == 1){
                $query->where('status',1)->orderBy('created_at','DESC');
            }elseif ($request->status == -1){
                $query->where('status',-1)->orderBy('created_at','DESC');
            }
        }
        return $query;
    }
    public function scopePrice($query, $request){
        if ($request->has('choice')){
            if ($request->choice == 5){
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
