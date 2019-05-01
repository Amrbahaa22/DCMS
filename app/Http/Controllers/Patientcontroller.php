<?php

namespace App\Http\Controllers;

use App\Patient;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Patientcontroller extends Controller
{
     public function __construct()
    {
        $this->middleware(['permission:create_patients'])->only('create');
        $this->middleware(['permission:read_patients'])->only('index');
        $this->middleware(['permission:updatesec_patients'])->only('edit');
        $this->middleware(['permission:delete_patients'])->only('destroy');
        $this->middleware(['permission:viewsec_patients'])->only('show');
    }//end of constructor
   
    public function index(Request $request)
    {
        $patients=Patient::where(function($q) use($request){
            return $q->when($request->search,function($query) use($request){
            return $query->where('name','like','%'.$request->search.'%')->orwhere('cellphone','like','%'.$request->search.'%')->orwhere('telephone','like','%'.$request->search.'%');
        });
        })->latest()->paginate(2);
        return view('users.patients.index',compact('patients'));
    }//end of index function

    public function create()
    {
        $doctors=User::whereRoleIs('Doctor')->get();
        return view('users.patients.create',compact('doctors'));
    }//end of create function

    public function store(Request $request)
    {
          $request->validate([
            'name' => 'required|unique:patients',
            'age'  => 'required|numeric|min:1|max:120',
            'address'  => 'required',
            'cellphone'=> 'required|min:9|max:11',
          //'telephone' => 'required',
            'job' => 'required',
            'doctorName'=>'required',
            'NextAppointment'=>'required',
        ]);
        $request['attendance']=0;
        $request['SubmitDate']=date('Y-m-d');

        
        $patient = Patient::create($request->all());


        session()->flash('success',__('site.added_successfully'));
        return redirect()->route('users.patients.index');
    }//end of store function

    public function edit(Patient $patient)
    {
        $doctors=User::whereRoleIs('Doctor')->get();
        return view('users.patients.secedit',compact('patient','doctors'));
    }//end of edit function

    public function update(Request $request, Patient $patient)
    {
          $request->validate([
            'name' => ['required',Rule::unique('patients')->ignore($patient->id),],
            'age'  => 'required|numeric|min:1|max:120',
            'address'  => 'required',
            'cellphone'=> 'required|min:9|max:11',
          //'telephone' => 'required',
            'job' => 'required',
            'doctorName'=>'required',
            'NextAppointment'=>'required'
        ]);

         $patient->update($request->all());
         session()->flash('success',__('site.edited_successfully'));
        return redirect()->route('users.patients.index');

    }//end of update function

    public function show($id)
    {
        $patient=Patient::find($id);
        return view('users.patients.secview',compact('patient'));
    }//end of show function

    public function destroy(Patient $patient)
    {
        $patient->delete();
         session()->flash('success',__('site.deleted_successfully'));
        return redirect()->route('users.patients.index');
    }//end of destroy function
}
