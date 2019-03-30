<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class Doctorcontroller extends Controller
{
    public function index()
    {
        $users=User::all();
        return view('users.doctors.index',compact('users'));
    }//end of index function

   
    public function create()
    {
        return view('users.doctors.create');
    }//end of create function

   
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'age'  => 'required',
            'phone'  => 'required',
            'email'=> 'required',
            'Incomerate' => 'required',
            'password' => 'required|confirmed',

        ]);
        $request['HourSalary']='0.0';
        $request_data=$request->except(['password']);
        $request_data['password']=bcrypt($request->password);

        $user = User::create($request_data);


        session()->flash('success',__('site.added_successfully'));
        return redirect()->route('users.doctors.index');


    }//end of store function

   
    public function edit(User $user)
    {
        //
    }//end of edit function

    public function update(Request $request, User $user)
    {
        //
    }//end of update function

    public function destroy(User $user)
    {
        
        $user->delete();
        session()->flash('success',__('site.deleted_successfully'));
        return redirect()->route('users.doctors.index');
    }
}
