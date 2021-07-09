<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    const ADMIN = 1;
    const USER = 0;
    const SPADMIN = 3;

    public function getRoleTextAttribute(){
        if ($this->role == 1) {
            return "Admin";
        }elseif($this->role == 0){
            return "User";
        }
    }


    public function products(){
        return $this->hasMany(Product::class);
    }
    public function userinfo(){
        return $this->hasOne(Userinfo::class);
    }
    public function comments(){
        return $this->hasMany(Comment::class);
    }
    public function orders(){
        return $this->hasMany(Order::class);
    }
    public function scopeSearch($query, $request)
    {
        if ($request->has('key_search')) {
            $query->where('name', 'LIKE', '%'.$request->key_search.'%')->orderBy('created_at', 'DESC');
        }

        return $query;
    }
    public function scopeRole($query, $request){
        if ($request->has('role')){
            if ($request->get('role')==1){
                $query->where('role',1)->orderBy('id','DESC');
            }elseif ($request->get('role')==0){
                $query->where('role',0)->orderBy('id','DESC');
            }else{
                $query->orderBy('id','DESC');
            }
        }
    }
}
