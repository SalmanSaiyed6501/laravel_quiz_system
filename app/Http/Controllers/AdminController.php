<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\admin;
use App\Models\category;
use App\Models\quiz;
use App\Models\mcq;

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

    public function quiz(){
        $admin = Session::get('admin');
        if ($admin) {
            $categories = category::get();
            return view('add-quiz',["name"=>$admin, "categories"=>$categories]);
        }else{
            return redirect('admin-login');
        }
    }

    public function addQuiz(Request $request){
        $validation = $request->validate([
            'name'=>'required | min:3',
            'category'=>'required',
        ],[
            'name.required'=> 'Enter Quiz Name !',
            'category.required'=> 'Select Category !'
        ]);

        $quiz = new quiz;
        $quiz->name = $request->name;
        $quiz->categoryId = $request->category;
        $quiz->creator = Session::get('admin');
        
        if ($quiz->save()) {
            $total_mcq = mcq::where('quiz_id', $quiz->id)->get();
            $count_mcq = count($total_mcq);
            Session::put('quizDetails',$request->all());
            Session::put('count_mcq',$count_mcq);
            return redirect()->back();
        }
    }

    public function quitQue(){
         Session::forget('quizDetails');
         Session::forget('count_mcq');
         return redirect()->back();
    }

    public function addMcqs(Request $request){
        $quiz = quiz::where('name', Session::get('quizDetails.name'))->first();

        $mcq = new mcq;
        $mcq->question = $request->question;
        $mcq->a = $request->a;
        $mcq->b = $request->b;
        $mcq->c = $request->c;
        $mcq->d = $request->d;
        $mcq->correct_ans = $request->correct_ans;
        $mcq->category_id = Session::get('quizDetails.category');
        $mcq->quiz_id = $quiz->id;
        $mcq->admin_id = Session::get('admin');

        if ($mcq->save()) {
            Session::flash('quiz',"Quiz Added Successfully !");
            $total_mcq = mcq::where('quiz_id', $quiz->id)->get();
            $count_mcq = count($total_mcq);
            return redirect()->back()->with(["count_mcq"=>$count_mcq]);
        }

    }
}
