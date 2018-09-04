<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

session_start();

class CategoryController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function loadCategory()
    {

        if (!$this->checkSession()) {
            $this->putErrorMessage();
            return Redirect::to('/admin');
        }

        $categories = Category::all();
        $categoryView = view('admin.category')
            ->with('categories', $categories);

        return view('admin_layout')
            ->with('content', $categoryView);


    }

    public function addCategory(Request $request)
    {

        if (!$this->checkSession()) {
            $this->putErrorMessage();
            return Redirect::to('/admin');
        }

        $category = new Category();

        $category->category_name = $request->category_name;
        $category->category_desc = $request->category_desc;
        $category->publication_status = $request->publication_status;
        $category->created_by = Session::get('admin_name');
        $category->updated_by = Session::get('admin_name');

        $category->save();

        return Redirect::to('/all-categories');


    }

    public function deleteCategory($id){

        if (!$this->checkSession()) {
            $this->putErrorMessage();
            return Redirect::to('/admin');
        }

        $category = Category::where('id',$id)->first();

        $category->product()->delete();

        $category->delete();

        return Redirect::to('/all-categories');
    }
    public function updateCategory($id){
        if (!$this->checkSession()) {
            $this->putErrorMessage();
            return Redirect::to('/admin');
        }

        $category = Category::where('id',$id)->first();

        $categoryView = view('admin.update_category')
            ->with('category', $category);

        return view('admin_layout')
            ->with('content', $categoryView);


    }

    public function save_updateCategory(Request $request,$id){
        if (!$this->checkSession()) {
            $this->putErrorMessage();
            return Redirect::to('/admin');
        }


        $category = Category::where('id',$id)->first();

        $category->category_name = $request->category_name;
        $category->category_desc = $request->category_desc;
        $category->publication_status = $request->publication_status;
        $category->updated_by = Session::get('admin_name');
        $category->save();
        return Redirect::to('/all-categories');


    }
    public function categoryStatus($id){
        if (!$this->checkSession()) {
            $this->putErrorMessage();
            return Redirect::to('/admin');
        }

        $category = Category::where('id',$id)->first();

        if($category->publication_status == 1){
            $category->publication_status = 0;
        }
        else{
            $category->publication_status = 1;
        }
        $category->save();

        return Redirect::to('/all-categories');
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
        Session::put('message', "you should Login First");
    }
}
