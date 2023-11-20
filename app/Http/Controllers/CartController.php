<?php

namespace App\Http\Controllers;

use App\Models\cart;
use App\Models\User;
use App\Models\Product;
use App\Models\CartItem;
use App\Http\Requests\StorecartRequest;
use App\Http\Requests\UpdatecartRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function view($id)
    {
        $user = User::find($id);
        return Cart::whereBelongsTo($user)->get();
    }

    public function add(Request $request, $id)
      {
        $user = Auth::user();

        $product = Product::find($id);

        if(!$product){
            abort(404);
        }

        $cart = Cart::where('user_id', $user->id)->first();

        if(!$cart){
            $cart = new Cart;
            $cart->user_id = $user->id;
            $cart->save();
        }
        else{
            $cartItem = new CartItem;
            $cartItem->cart_id =$cart->id;
            $cartItem->product_id = $product->id;
            $cartItem->quantity = 1;
            $cartItem->save();
        }

        return redirect()->back()->with('success','Product added to cart successfully');
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
     * @param  \App\Http\Requests\StorecartRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorecartRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function show(cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function edit(cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatecartRequest  $request
     * @param  \App\Models\cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatecartRequest $request, cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy(cart $cart)
    {
        //
    }
}
