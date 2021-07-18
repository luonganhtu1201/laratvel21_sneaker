<?php
namespace App\Http\Views;
use App\Models\Category;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Cache;
use Illuminate\view\view;
class CartProductComposer
{
    public function compose(view $view)
    {
        $items = Cart::instance('order-product')->content();
        $view->with([
            'items' => $items
        ]);
    }
}
