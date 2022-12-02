<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function index(){
        $sessionId = Session::getId();
        \Cart::session($sessionId);

        $cart = \Cart::getContent();
        //dd($cart);

        $sum = \Cart::getTotal('price');

        return view('cart.index', [
            'cart'=>$cart,
            'sum' => $sum
        ]);
    }

    public function addCart(Request $request){

        $product = Product::query()->where(['id'=> $request->id])->first();

        $sessionId = Session::getId();

        \Cart::session($sessionId)->add([
            'id' => $product->id,
            'name' => $product->title,
            'price' => $product->price,
            'quantity' => $request->qty ?? 1,
        ]);

        \Cart::session($sessionId);
        $cart = \Cart::getContent();

        return redirect()->back();

    }

    public function checkout(){

        $user = Auth::user();

      //  dd($user);

        $sessionId = Session::getId();
        \Cart::session($sessionId);

        $cart = \Cart::getContent();

        $sum = \Cart::getTotal('price');

        return view('cart.checkout', [
            'cart' => $cart,
            'sum' => $sum,
            'user' => $user
        ]);
    }

    public function makeOrder(Request $request){

        dd($request);
    }

}
