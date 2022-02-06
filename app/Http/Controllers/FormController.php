<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Customer_tbl;
use Illuminate\Support\Facades\Auth;
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
             'email'=>'required',
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
            return redirect()->route('welcome');

        }

        session()->flash('message', 'Invalied credentials.');
        session()->flash('type', 'danger');

        return redirect()->back();



    }
}
