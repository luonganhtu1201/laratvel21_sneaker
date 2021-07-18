<?php
namespace App\Http\views;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\view\view;
class CartImportComposer
{
    public function compose(view $view)
    {
        $items = Cart::instance('import-product')->content();
        $view->with([
            'items' => $items
        ]);
    }
}
