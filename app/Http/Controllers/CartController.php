<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function cart()
    {
        $products = Cart::all();

        return view("cart")
            ->with("products", $products);
    }

    public function buy(Request $request)
    {
        $product_id = $request->input("product_id");
        $user = $request->input("user");

        $product = new Cart();
        $product->user = $user;
        $product->product_id = $product_id;
        $product->save();

        return redirect("/")->with("success", "Sukces");
    }

    public function delete(Request $request)
    {
        $product_id = $request->input("product_id");
        $user = $request->input("user");

        Cart::where("product_id", $product_id)
            ->where("user", $user)
            ->delete();

        return redirect("/cart");
    }
}
