<?php

namespace App\Http\Controllers;

use App\Manufacture;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class ManufactureController extends Controller
{
    //

    public function loadManufacture()
    {

        $this->makeSecure();

        $manufacture = Manufacture::all();
        $manufactureView = view('admin.manufacture')
            ->with('manufacture', $manufacture);

        return view('admin_layout')
            ->with('content', $manufactureView);


    }

    public function addManufacture(Request $request)
    {

        $this->makeSecure();

        $manufacture = new Manufacture();

        $manufacture->manufacture_name = $request->manufacture_name;
        $manufacture->manufacture_desc = $request->manufacture_desc;
        $manufacture->publication_status = $request->publication_status;
        $manufacture->created_by = Session::get('admin_name');
        $manufacture->updated_by = Session::get('admin_name');

        $manufacture->save();

        return Redirect::to('/all-manufactures');


    }

    public function deleteManufacture($id){

        $this->makeSecure();

        $manufacture = Manufacture::where('id',$id)->first();

        $manufacture->product()->delete();


        $manufacture->delete();

        return Redirect::to('/all-manufactures');
    }
    public function updateManufacture($id){
        $this->makeSecure();

        $manufacture = Manufacture::where('id',$id)->first();

        $manufactureView = view('admin.update_manufacture')
            ->with('manufacture', $manufacture);

        return view('admin_layout')
            ->with('content', $manufactureView);


    }

    public function save_updateManufacture(Request $request,$id){

        $this->makeSecure();


        $manufacture = Manufacture::where('id',$id)->first();

        $manufacture->manufacture_name = $request->manufacture_name;
        $manufacture->manufacture_desc = $request->manufacture_desc;
        $manufacture->publication_status = $request->publication_status;
        $manufacture->updated_by = Session::get('admin_name');
        $manufacture->save();
        return Redirect::to('/all-manufactures');


    }
    public function ManufactureStatus($id){
        $this->makeSecure();

        $manufacture = Manufacture::where('id',$id)->first();

        if($manufacture->publication_status == 1){
            $manufacture->publication_status = 0;
        }
        else{
            $manufacture->publication_status = 1;
        }
        $manufacture->save();

        return Redirect::to('/all-manufactures');
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
