<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Product;

class ShopingController extends Controller
{
    public function add_to_cart()
    {
        $product = Product::find(request()->pid);

        Cart::add([
            'id'=>$product->id,
            'name'=>$product->name,
            'qty'=>request()->qty,
            'price'=>$product->price,
        ])->associate('App\Product');
        return redirect()->route('cart');
    }

    public function cart()
    {
        return view ('cart');
    }

    public function cart_delete($id)
    {
        Cart::remove($id);
        return redirect()->back();
    }
    public function cart_incr($id,$qty)
    {
        Cart::update($id,$qty+1);
        return redirect()->back();
    }

    public function cart_dcr($id,$qty)
    {
        Cart::update($id,$qty-1);
        return redirect()->back();
    }

    public function rapidAdd($id)
    {
        $product = Product::find($id);

        Cart::add([
            'id'=>$product->id,
            'name'=>$product->name,
            'qty'=>1,
            'price'=>$product->price,
        ])->associate('App\Product');
        return redirect()->route('cart');
    }
}
