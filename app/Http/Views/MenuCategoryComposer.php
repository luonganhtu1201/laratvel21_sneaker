<?php

namespace App\Http\Views;
use Illuminate\Support\Facades\Cache;
use Illuminate\view\view;
use App\Models\Category;


class MenuCategoryComposer
{
   public function compose(view $view)
   {
    //    $menu = Category::all();
       $menus = Cache::remember('menus',60*60,function (){
           return Category::where('parent_id',0)->get();
       });
//        $menus = Category::where('parent_id',0)->get();
        $menus = $this->getCategoryWithChildren($menus);
        $view->with('menus', $menus);
   }
   private function getCategoryWithChildren($categories){
    foreach ($categories as $category) {
        $childrens = Category::Where('parent_id',$category->id)->get();
        if (count($childrens)>0) {
            $category->children = $this->getCategoryWithChildren($childrens);
        }
    }
    return $categories;
   }
}
