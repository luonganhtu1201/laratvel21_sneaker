<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    public function products(){
        return $this->hasMany(Product::class);
    }

    protected $table = 'categories';

    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }
    public function scopeSneaker($query, $request)
    {
        if ($request->has('sneaker')) {

            $query->where('slug', $request->sneaker)->orderBy('created_at', 'DESC');

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
    public function scopeChild($query, $request){
        if ($request->has('childrencate')){
            if ($request->get('childrencate') == -1){
                $query->orderBy('updated_at','asc');
            }else{
                $query->where('parent_id',$request->childrencate);
            }
        }
        return $query;
    }
}
