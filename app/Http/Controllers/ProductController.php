<?php

namespace App\Http\Controllers;

use App\Category;
use App\Manufacture;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    //

    public function loadProduct()
    {

        $this->makeSecure();

        $products = Product::all();
        $productView = view('admin.product')
            ->with('products', $products);

        return view('admin_layout')
            ->with('content', $productView);


    }

    public function loadAddProductForm(){
        $this->makeSecure();

        $categories = Category::where('publication_status',1)->get();
        $manufactures = Manufacture::where('publication_status',1)->get();

        $productView = view('admin.add_product')
            ->with('categories',$categories)
            ->with('manufactures',$manufactures);

        return view('admin_layout')
            ->with('content', $productView);
    }

    public function addProduct(Request $request)
    {

        $this->makeSecure();

        $file = $request->file('product_image');

        $file_name = $file->getClientOriginalName();

        $pic_name = date('dmy')."_".date('His')."_".$file_name;

        $directory = 'public/asset/image/';

        $image_url = $directory.$pic_name;

        $file->move($directory,$pic_name);


       /* echo "<pre>";
        print_r($file);

        dd($request);*/

        $product = new Product();

        $product->product_name = $request->product_name;
        $product->category_id = $request->category_id;
        $product->manufacture_id = $request->manufacture_id;
        $product->product_short_desc = $request->product_short_desc;
        $product->product_long_desc = $request->product_long_desc;
        $product->product_price = $request->product_price;
        $product->product_size = $request->product_size;
        $product->product_color = $request->product_color;
        $product->publication_status = $request->publication_status;

        $product->product_image = $image_url;

        $product->created_by = Session::get('admin_name');
        $product->updated_by = Session::get('admin_name');

        $product->save();

        return Redirect::to('/all-products');


    }

    public function deleteProduct($id){

        $this->makeSecure();

        $product = Product::where('id',$id)->first();

        $product->delete();

        return Redirect::to('/all-products');
    }
    public function updateProduct($id){
        $this->makeSecure();


        $categories = Category::where('publication_status',1)->get();
        $manufactures = Manufacture::where('publication_status',1)->get();

        $product = Product::where('id',$id)->first();

        $productView = view('admin.update_product')
            ->with('product', $product)
            ->with('categories',$categories)
            ->with('manufactures',$manufactures);

        return view('admin_layout')
            ->with('content', $productView);


    }

    public function save_updateProduct(Request $request,$id){

        $this->makeSecure();


        $product = Product::where('id',$id)->first();



        $file = $request->file('product_image');

        if($file){
            $file_name = $file->getClientOriginalName();

            $pic_name = date('dmy')."_".date('His')."_".$file_name;

            $directory = 'public/asset/image/';

            $image_url = $directory.$pic_name;

            $file->move($directory,$pic_name);
        }
        else{
            $image_url = $request->image;
        }


        /* echo "<pre>";
         print_r($file);

         dd($request);*/


        $product->product_name = $request->product_name;
        $product->category_id = $request->category_id;
        $product->manufacture_id = $request->manufacture_id;
        $product->product_short_desc = $request->product_short_desc;
        $product->product_long_desc = $request->product_long_desc;
        $product->product_price = $request->product_price;
        $product->product_size = $request->product_size;
        $product->product_color = $request->product_color;
        $product->publication_status = $request->publication_status;

        $product->product_image = $image_url;

        $product->created_by = Session::get('admin_name');
        $product->updated_by = Session::get('admin_name');

        $product->save();

        return Redirect::to('/all-products');


    }
    public function ProductStatus($id){
        $this->makeSecure();

        $product = Product::where('id',$id)->first();

        if($product->publication_status == 1){
            $product->publication_status = 0;
        }
        else{
            $product->publication_status = 1;
        }
        $product->save();

        return Redirect::to('/all-products');
    }




    public function makeSecure(){
        if (!$this->checkSession()) {
            $this->putErrorMessage();
            return Redirect::to('/admin');
        }
    }

    public function checkSession()
    {
        if (Session::get('admin_name')) {
            return true;
        } else {
            return false;
        }
    }

    public function  putErrorMessage()
    {
        Session::put('message', "you should Login First for manage products babe. !");
    }
}
