<?php

namespace App\Http\Controllers;

use App\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class SliderController extends Controller
{
    //

    public function loadSlider()
    {

        $this->makeSecure();

        $slider = Slider::all();
        $sliderView = view('admin.slider')
            ->with('all_sliders', $slider);

        return view('admin_layout')
            ->with('content', $sliderView);


    }

    public function addSlider(Request $request)
    {

        $this->makeSecure();

        /*image*/
        $file = $request->file('slider_image');

        $file_name = $file->getClientOriginalName();
        $pic_name = date('dmy')."_".date('His')."_".$file_name;

        $directory = 'public/asset/image/';

        $image_url = $directory.$pic_name;

        $file->move($directory,$pic_name);

        //exit();
        /*image*/

        $slider = new Slider();

        $slider->slider_image = $image_url;
        $slider->slider_desc = $request->slider_desc;
        $slider->publication_status = $request->publication_status;

        $slider->created_by = Session::get('admin_name');

        $slider->save();

        return Redirect::to('/all-sliders');


    }

    public function deleteSlider($id){

        $this->makeSecure();

        $slider = Slider::where('id',$id)->first();

        $slider->delete();

        return Redirect::to('/all-sliders');
    }



    public function SliderStatus($id){
        $this->makeSecure();

        $slider = Slider::where('id',$id)->first();

        if($slider->publication_status == 1){
            $slider->publication_status = 0;
        }
        else{
            $slider->publication_status = 1;
        }
        $slider->save();

        return Redirect::to('/all-sliders');
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
        Session::put('message', "you should Login First for manage manufacture babe. !");
    }
}
