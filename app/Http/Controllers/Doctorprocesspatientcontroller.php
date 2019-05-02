<?php

namespace App\Http\Controllers;
use App\Patient;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Doctorprocesspatientcontroller extends Controller
{
         public function __construct()
    {
        $this->middleware(['permission:updatedoc_patients'])->only('edit');
        $this->middleware(['permission:viewdoc_patients'])->only('show');
    }
    // public function index()
    // {
    //     //
    // }

    // public function create()
    // {
    //     //
    // }

    
    // public function store(Request $request)
    // {
    //     //
    // }

    public function show($id)
    {
        $patient=Patient::find($id);
        return view('users.patients.docview',compact('patient'));
    }
  
    public function edit($id)
    {
        $patient=Patient::find($id);
        $doctors=User::whereRoleIs('Doctor')->get();
        return view('users.patients.docedit',compact('patient','doctors'));
    }

    public function update(Request $request, $id)
    {

        $request->validate([
            'NextAppointment'=>'required',
            'MedicalHistory'=>'required',
            'DentalHistory'=>'required',
            'ChiefComplain'=>'required',
            'name' => 'required',
            'age'  => 'required|numeric|min:1|max:120',
            'address'  => 'required',
            'cellphone'=> 'required|max:11|min:9',
            // 'telephone' => 'required|max:11|min:9',
            'job' => 'required',
            'doctorName'=>'required',
        ]);

         $patient=Patient::find($id);

         $z=$patient->update($request->all());
         
         session()->flash('success',__('site.edited_successfully'));
        return redirect()->route('users.patients.index');

    }

   
    // public function destroy($id)
    // {
    //     //
    // }
}
