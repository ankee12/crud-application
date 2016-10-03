<?php

namespace App\Http\Controllers\Auth;

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Input;

use App\Http\Requests;

//use App\models\Customer;

use App\models\User;

use Illuminate\Support\MessageBag;

use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Facades\Mail;

use Illuminate\Support\Facades\Redirect;

use Illuminate\Contracts\Auth\Authenticatable;

use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Collection;



class CustomerCtrl extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('form');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $customer = User::all();
        return view('clist')->with('customers', $customer);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //echo "<pre>"; print_r($request->all()); exit;
         //Validation
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:20',
            'dob' => 'required|date',
            'gender' => 'required',
            'address' => 'required',
            'email' => 'required|email|unique:customers',
            'favourite' => 'required',
            'image' => 'required',
            'password' => 'required|min:4|max:8|confirmed',
        ]);

        if ($validator->fails()) {
            return redirect(route('form'))
                        ->withErrors($validator)
                        ->withInput();
        }
       

         //submit form 
        
        $customers = new user;
        $customers->name = $request->name;
        $customers->dob = $request->dob;
        $customers->gender = $request->gender;
        $customers->country = $request->country;
        $customers->address = $request->address;
        $customers->email = $request->email;
        $customers->password = Hash::make($request->password);
        $customers->remember_token = Hash::make($request->password);
        $customers->favourite = implode(',', $request->favourite);
        $image = Input::file('image');
        $filename = time()."_".$image->getClientOriginalName();
        $image = $image->move(public_path().'/image', $filename);
        $customers->image=$filename;
        $customers->save();

        //$users = new user;
        //$users->name = $request->name;
        //$users->email = $request->email;
        //$users->password = Hash::make($request->password);
        //$users->remember_token = Hash::make($request->password);   
        //$users->save();
       

        $data = ['email' => $request->email ];
        Mail::send('mail', $data, function($message) use ($data)
        {
            $message->to($data['email']);
            $message->subject('Welcome to Laravel');
            $message->from('asinghal0@gmail.com');
        }); 
        return redirect(route('create'))->with('message', 'Thanks for Registering!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $customer = User::find($id);
        return view('form')->with('customers', $customer);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $customers = User::find($id);
        $customers->name = $request->name;
        $customers->dob = $request->dob;
        $customers->gender = $request->gender;
        $customers->country = $request->country;
        $customers->address = $request->address;
        $customers->email = $request->email;
        $customers->favourite = implode(',', $request->favourite);
        $image = Input::file('image');
        $filename = time()."_".$image->getClientOriginalName();
        $image = $image->move(public_path().'/image', $filename);
        $customers->image=$filename;
        $customers->save();
   
        //$users = User::find($id);
        //$users->name = $request->name;
        //$users->email = $request->email;   
        //$users->save(); 

        return redirect(route('create'))->with('message', 'Updated Profile!');;
       
    }  
    

     
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($ids)
    {
        $customer = User::destroy($ids);
        return redirect(route('create'));
    }

}
