<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\admin;
use App\Models\category;

class AdminController extends Controller
{
   public function loginView(){
    $admin = Session::get('admin');
    if ($admin) {
        return redirect()->back();
    }else{
        return view('admin-login');
    }
   }
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
            $categories = category::count();
            return view('admin',["name"=>$admin, "categories"=>$categories]);
        }else{
            return redirect('admin-login');
        }
    }

    public function categories(){
        $admin = Session::get('admin');
        if ($admin) {
            $categories = category::get();
            return view('categories',["name"=>$admin, "categories"=>$categories]);
        }else{
            return redirect('admin-login');
        }
    }

    public function logout(){
        Session::forget('admin');
        return redirect('admin-login');
    }

    public function addCategory(Request $request){
        $validation = $request->validate([
            'name'=>'required | min:3 | unique:categories,name',
        ],[
            'name.required'=> 'Please Enter Category !'
        ]);
        $category = new category;
        $category->name = $request->name;
        $category->creator = Session::get('admin');
        
        if ($category->save()) {
            Session::flash('category',"Category ".$request->name." Added Succesfully !");
            return redirect()->back();
        }
    }

    public function deleteCategory($id){
        $isDeleted = category::find($id)->delete();

        if ($isDeleted) {
            Session::flash('category',"Category Deleted Succesfully !");
            return redirect()->back();
        }
    }
}
