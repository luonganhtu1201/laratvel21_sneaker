<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Userinfo extends Model
{
    use HasFactory;
    protected $table = 'users_info';
    public function user(){
        return $this->belongsTo(User::class);
    }
    const STATUS_MALE = 0;
    const STATUS_FEMALE = 1;
    public static $status_gender = [
        self::STATUS_MALE => 'Nam',
        self::STATUS_FEMALE => 'Nữ'
    ];
}
