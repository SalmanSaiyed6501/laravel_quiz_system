<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\admin;

class AdminController extends Controller
{
    public function login(Request $request){
        $validation = $request->validate([
            "name"=>"required",
            "password"=>"required",
        ]);
        
        $admin = admin::where([
            ['name',"=",$request->name],
            ['password',"=", $request->password],
        ])->first();

        if (!$admin) {
           $validation = $request->validate([
                "user"=>"required",
            ],[
                "user.required"=> "Invalid Username or Password",
            ]); 
        }

        Session::put('admin',$admin->name);
        return redirect('dashboard');
    }

    public function dashboard(){
        $admin = Session::get('admin');
        if ($admin) {
            return view('admin',["name"=>$admin]);
        }else{
            return redirect('admin');
        }
    }
}
