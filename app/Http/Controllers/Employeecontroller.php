<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class Employeecontroller extends Controller
{

    public function index()
    {
        $users=User::all();
        return view('users.employees.index',compact('users'));
    }//end of  index function

    public function create()
    {
        return view('users.employees.create');
    }//end of  create function

    public function store(Request $request)
    {
         $request->validate([
            'name' => 'required',
            'age'  => 'required',
            'phone'  => 'required',
            'email'=> 'required',
            'HourSalary' => 'required',
            'password' => 'required|confirmed',

        ]);
        $request['Incomerate']='0.0';
        $request_data=$request->except(['password']);
        $request_data['password']=bcrypt($request->password);

        $user = User::create($request_data);

        $user->attachRole('Employee');
        session()->flash('success',__('site.added_successfully'));
        return redirect()->route('users.employees.index');
    }//end of  store function


    public function edit(User $user)
    {
        //
    }//end of  edit function

    public function update(Request $request, User $user)
    {
        //
    }//end of  update function

    public function destroy(User $user)
    {
        //
    }//end of  destroy function
}
