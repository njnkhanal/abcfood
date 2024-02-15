<?php

namespace App\Http\Controllers;

use App\Models\FoodItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class FrontendController extends Controller
{

    public function welcome()
    {

        $foodItems = FoodItem::all();
        return view('welcome', compact('foodItems'));
    }

    public function viewCart()
    {
        $cartItems = Session::get('cartItems');
        return view('User.pages.cart', compact('cartItems'));
    }
    public function foodDetails($food_id)
    {
        $foodItem = FoodItem::find($food_id);
        return view('user.pages.foodDetails', compact('foodItem'));
    }

    public function cartAdd($food_id)
    {
        $food = FoodItem::findOrFail($food_id);
        $qty = 1;
        if (Session::has('cartItems')) {
            $cartItems = Session::get('cartItems');
            // check if cart has already food id exist
            foreach ($cartItems as $item) {
                if ($item == $food_id) {
                    return redirect()->route('cart.view')->with('error', 'Already In Cart');
                }
            }
            array_push($cartItems, [$food->id, $qty]);
            Session::put('cartItems', $cartItems);
        } else {
            $foodIds = array();
            array_push($foodIds, [$food->id, $qty]);
            Session::put('cartItems', $foodIds);
        }
        return redirect()->route('cart.view')->with('success', 'Cart Added Successfully!');
    }

    public function cartUpdate(Request $request, $cartIndex)
    {
        // make validation for check qty
        $request->validate([
            'qty' => 'numeric|min:1|max:100',
        ]);
        $cartItems = Session::get('cartItems');
        $cart = $cartItems[$cartIndex];
        if ($cart) {
            $food_id = $cartItems[$cartIndex][0];
            $qty = $request->qty;
            $food = FoodItem::findOrFail($food_id);
            $cartItems[$cartIndex][1] = $qty;
            Session::put('cartItems', $cartItems);
            return redirect()->route('cart.view')->with('success', 'Cart Updated Successfully!');
        } else {
            return redirect()->route('cart.view')->with('error', 'Cart Not Found');
        }
    }
}
