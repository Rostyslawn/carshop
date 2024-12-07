<?php

namespace App\Http\Controllers;

use App\Models\products;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $product_id = $request->product_id;

        $products = products::where("product_id", $product_id)->get();

        if($products->isEmpty())
            return redirect("/")->withErrors(["doesn't exists" => 'Товар не найден']);

        return redirect("/")->with([
            "products" => $products,
        ]);
    }
}
