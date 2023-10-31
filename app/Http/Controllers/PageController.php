<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    public function getHome()
    {
        $products = Product::orderBy('created_at', 'DESC')->get();

        return view("pages.home", compact('products'));
    }

    public function getProductDetail($id)
    {
        $product = Product::find($id);
        if(!$product)
            return redirect('/');

        return view('pages.product-detail', compact('product'));
    }

    public function addToCart($id)
    {
        if(!Auth::check())
            return response()->json(["alert_status" => "error", "alert_message" => "Giriş Yapmadınız"]);

        $product = Product::find($id);
        if(!$product)
            return response()->json(["alert_status" => "error", "alert_message" => "Ürün Bulunamadı"]);

        $user_id = Auth::user()->id;

        $exist = Cart::where("user_id", $user_id)->where("product_id", $id)->get();
        if(isset($exist)){
            $exist->count = $exist->count + 1;
            $exist->save();
        }else{
            $cart = new Cart();
            $cart->user_id = $user_id;
            $cart->product_id = $id;
            $cart->count = 1;
            $cart->save();
        }

        return response()->json([ 'alert_status' => 'success', 'alert_message' => 'Ürün sepete Eklendi']); 
    }
}
