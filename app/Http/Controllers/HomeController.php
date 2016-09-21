<?php


namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

use App\models;

use Illuminate\Support\Facades\Redirect;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;


class HomeController extends Controller
{
    public function index()
{
 
}

public function Login()
{
return view('login');
}

public function getLogin(Request $request)
{
	$rules = array(
    'email'    => 'required|email', 
    'password' => 'required'
);

$validator = Validator::make(Input::all(), $rules);

if ($validator->fails()) {

    return Redirect::to('login')
        ->withErrors($validator) 
        ->withInput(Input::except('password')); 

} else {
$creds = array("email" => $request->email, "password" => $request->password);
if(Auth::attempt($creds)) 
    {
     return redirect()->intended('blog');
    }
    else{
    return redirect('login')->with('error','Provide valid email & password!');
    }
}
}

public function blog()
{
  return view('blog');
}

public function getLogout()
{
  Auth::logout();
  return Redirect:: to('login');
}
}
