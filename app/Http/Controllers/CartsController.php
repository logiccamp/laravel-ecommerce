<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;

class CartsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cart = Cart::with("Product")->where("user_id", auth()->user()->id)->get();

        $data = [
            "cartItems" => $cart,
            "appCdn" => env('APP_CDN'),
            "total" => number_format($cart->sum("price"), 2)
        ];
        return response()->json($data, 200);
    }

    public function count()
    {
        if (auth()->user()) {
            $userItems = Cart::where('user_id', auth()->user()->id)->count();
            return response()->json($userItems, 200);
        } else {
            return response()->json(0, 200);
        }
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $productid = $request->product_id;
        $product = Product::where("slug", $productid)->first();
        $message = "Cart Updated";
        $productFoundInCart = Cart::where('product_id', $product->id)->where("user_id", auth()->user()->id)->first();

        if (!$productFoundInCart) {
            Cart::create([
                'product_id' => $product->id,
                'quantity' => $request->qty,
                'price' => $product->price * $request->qty,
                'user_id' => auth()->user()->id
            ]);

            $message = "Product Added to Cart";
        } else {
            $initQty = $productFoundInCart->quantity;
            $postQty = $initQty + $request->qty;
            $productFoundInCart->quantity = $postQty;
            $productFoundInCart->price = $postQty * $product->price;
            $productFoundInCart->save();
        }

        $userItems = Cart::where('user_id', auth()->user()->id)->count();

        return response()->json([
            'message' => $message,
            'items' => $userItems,
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id, $action)
    {
        $cart = Cart::with('Product')->where("id", $id)->first();
        if ($cart) {
            $oldPrice = $cart->Product->price;
            $oldQty = $cart->quantity;
            $newQty = $action == 'increase' ? $cart->quantity + 1 : $cart->quantity - 1;
            $cart->quantity = $newQty;
            $cart->price = $oldPrice * $newQty;

            $cart->save();
        }
        return response()->json(true, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cart = Cart::where("id", $id)->first();
        if ($cart) {
            $cart->delete();
        }

        return response()->json(true, 200);
    }
}
