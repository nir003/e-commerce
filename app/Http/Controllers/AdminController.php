<?php

namespace App\Http\Controllers;

use App\tbl_admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

session_start();

class AdminController extends Controller
{


    public function loadDashboardByGet(){
        $admin_name = Session::get('admin_name');
        if($admin_name) {
            $dashboard = view('admin.dashboard');
            return view('admin_layout')
                ->with('admin_content', $dashboard);
        }else{
            Session::put('message',"Something is Wrong !! ");
            return Redirect::to('/admin');
        }
    }

    public function loadDashboard(Request $request)
    {
        $admin_email = $request->admin_email;
        $admin_password = md5($request->admin_password);

        $admin = tbl_admin::where('admin_email',$admin_email)
            ->where('admin_password',$admin_password)
            ->first();


        //dd($admin);
        //echo $admin;
        if($admin){
            Session::put('admin_name',$admin->admin_name);
            Session::put('admin_id',$admin->id);

            $dashboard = view('admin.dashboard');
            return view('admin_layout')
                ->with('admin_content',$dashboard);
        } else{

            Session::put('message',"Email or Password Invalid");
            return Redirect::to('/admin');
        }


    }


    public function loadAdminLogin()
    {
        $admin_name = Session::get('admin_name');

        if($admin_name){
            return Redirect::to('/admin-dashboard');
        }else{
            return view('admin_login');
        }

    }

    public function adminLogout()
    {

        /*Session::put('admin_name',null);
        Session::put('admin_id',null);*/
        Session::flush(); //all remove or flush
        return Redirect::to('/admin')->send();


    }




}
