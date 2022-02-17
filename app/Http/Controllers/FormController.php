<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Customer_tbl;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\View\ViewServiceProvider;


class FormController extends Controller
{
    public function index()
    {
        return view('welcome');
    }
    public function showRegistrationForm()
    {
        return view('Register');
    }
    public function processRegistration(Request $request)
    {



        //validation
        //insert into database
        //redirect

        //return $request->all();
        //echo $request->input('username');
        //echo $request->only('email');
        //echo $request->except(['_token']);

         $this->validate($request, [
             'username'=>'required',
             'email'=>'required|email|unique:Customer_tbls,email',
             'password'=>'required|min:5|max:13',
             'confirm_password'=>'required|min:5|max:13',
         ],[
             'email.required'=>'We need to know your email',

         ]


        );

        //dd($request->all());

        $data=[
            'username'=>$request->input('username'),
            'email'=>strtolower($request->input('email')),
            'password'=>bcrypt($request->input('password')),
            'confirm_password'=>bcrypt($request->input('confirm_password')),
        ];



        try{
            Customer_tbl::create($data);
            $this->setSuccessMessage('User account created');
            return redirect()->route('login');
            // session()->flash('message', 'User account created');
            // session()->flash('type', 'Success');

        }catch(\Exception $e){
            $this->setErrorMessage($e->getMessage());
            // session()->flash('message', $e->getMessage());
            // session()->flash('message', 'danger');
            return redirect()->back();

        }

         //echo "success";

    }
    public function login()
    {
        return view('login');
    }
    public function processLogin(Request $request){
        $this->validate($request, [
            'email'=>'required|email',
            'password'=>'required|min:5|max:13',
        ]
        );

        $credentials=$request->except(['_token']);

        if(auth()->guard('web')->attempt($credentials)){
            return redirect()->route('home');

        }

        $this->setErrorMessage('Invalid credentials');

        // session()->flash('message', 'Invalied credentials.');
        // session()->flash('type', 'danger');

        return redirect()->back();



    }
    public function User()
    {
        // $users=Customer_tbl::all();
        //  $users=Customer_tbl::all()->take(1);
        //  $users=Customer_tbl::all()->skip(2)->take(1);
        // echo $users;
        // $users=Customer_tbl::find(3);
        // $users=Customer_tbl::where('id', '>', '1')->get();
        // $users=Customer_tbl::where('id', '>', '1')->count();
        //print_r($users);
        // $users=Customer_tbl::where('id', '2')->get();
        $users=Customer_tbl::get();
        // echo $users[1]->username;
        // print_r($users);
        // foreach($users as $user){
        //     echo $user->username."<br>";
        // }
        foreach($users as $user){
            echo $user->username."<br>";
            echo $user->email."<br>";
        }
    }
}
