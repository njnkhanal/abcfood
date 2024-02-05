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

    public function cartAdd($food_id){
        $food = FoodItem::findOrFail($food_id);
        if(Session::has('cartItems')){
            $cartItems = Session::get('cartItems');
            // check if cart has already food id exist
            foreach($cartItems as $item){
                if($item == $food_id){
                    return redirect()->route('cart.view')->with('error','Already In Cart');
                }
            }
            array_push($cartItems, $food->id);
            Session::put('cartItems',$cartItems);
        }else{
            $foodIds = array();
            array_push($foodIds, $food->id);
            Session::put('cartItems', $foodIds);
        }
        return redirect()->route('cart.view')->with('success','Cart Added Successfully!');
    }
    
}
