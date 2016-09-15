<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Input;

use App\Http\Requests;

use App\models\Customer;

use Illuminate\Support\MessageBag;

use Illuminate\Support\Facades\Validator;

use App\Http\Controllers\Auth;

class CustomerCtrl extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("form");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $customer = Customer::all();
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
         //Validation
         $validator = Validator::make($request->all(), [
            'name' => 'required|max:20',
            'dob' => 'required',
            'gender' => 'required',
            'address' => 'required',
            'email' => 'required|email|unique:customers',
            'favourite' => 'required',
            'image' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect(route('form'))
                        ->withErrors($validator)
                        ->withInput();
        }


         //submit form 

        $customers = new customer;
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
        return redirect(route('form'));
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
