<?php


namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;
use App\models;
use App\models\blog;
use App\Http\Controllers\BlogCtrl;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;

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

public function create()
    {
        $blog = DB::table('blog')->orderBy('id', 'desc')->get();
        return view('blog')->with('blog', $blog);
    }

public function getLogout()
    {
      Auth::logout();
      return Redirect:: to('login');
    }
}
