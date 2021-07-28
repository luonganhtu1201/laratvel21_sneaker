<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $table = 'comments';
    public function product(){
        return $this->belongsTo(Product::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function getStatusTextAttribute(){
        if($this->status == 0){
            return "Chờ duyệt";
        }elseif($this->status == 1){
            return "Đã duyệt";
        }
    }
}
