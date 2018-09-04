<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ViewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function loadHome()
    {
        //


        $name = "Nirjhor";

        $all_products = Product::where('publication_status',1)
            ->limit(7)
            ->get();

        $home_content = view('pages.home_content')->with('all_products',$all_products);

        $slider = view('partials._slider');


        return view("welcome")
            ->with('content',$home_content)
            ->with('slider',$slider);
    }
    public function productsByCategory($id)
    {
        //


        //dd($id);


        $all_products = Product::all()
            ->where('publication_status',1)
            ->where('category_id',$id);

        $home_content = view('pages.home_content')->with('all_products',$all_products);



        return view("welcome")
            ->with('content',$home_content);
    }

    public function productDetail($id){



        $product = Product::all()->where('id',$id)->first();
        //dd($product);

        //echo "$product->product_image";
        //exit();

        $subView = view('pages.product_detail')
            ->with('product',$product);

        return view("welcome")
            ->with('content',$subView);
    }



}
