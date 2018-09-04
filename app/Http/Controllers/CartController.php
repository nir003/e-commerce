<?php

namespace App\Http\Controllers;

use App\Product;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CartController extends Controller
{
    //

    public function addToCart(Request $request,$id){

        //echo $id;


        $result = Product::all()->where('id',$id)->first();

         $quantity = $request->quantity;
        $price = $request->price_2;
       // echo $result->product_image;
        //dd($result);

        $data ['qty'] = $quantity;
        $data ['id'] = $id;
        $data ['name'] = $result->product_name;
        $data ['price'] = $result->product_price;
        $data ['options']['image'] = $result->product_image;

        Cart::add($data);


        /*$sub_view= view('pages.add_to_cart')
            ->with('quantity',$quantity)
            ->with('product',$result)
            ->with('price',$price);

        return view('welcome')->with('content',$sub_view);*/

        return Redirect::to('/show_cart');



    }

    public  function showCart(){

        $contents = Cart::content();

        //echo "<pre>";
        //print_r($contents);


        $sub_view= view('pages.show_cart')->with('cart_contents',$contents);
        return view('welcome')->with('content',$sub_view);
    }

    public function deleteItemFromCart($id){
        //echo $id;
        Cart::update($id,0);
        return Redirect::to('/show_cart');
    }

    public function cart_quantity_up($rowId,$qty){
        $qty++;
        Cart::update($rowId,$qty);
        return Redirect::to('/show_cart');

    }
    public function cart_quantity_down($rowId,$qty){

        $qty--;
        Cart::update($rowId,$qty);
        return Redirect::to('/show_cart');
    }
    public function cart_quantity_update(Request $request,$rowId){

        $qty = $request->qty;
        Cart::update($rowId,$qty);
        return Redirect::to('/show_cart');
    }
}
