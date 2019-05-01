<?php

namespace App\Http\Controllers;

use App\Lab;
use App\Patient;
use App\PatientLab;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Labcontroller extends Controller
{
    public function __construct()
    {
        $this->middleware(['permission:updatedoc_patients'])->only('create');
        $this->middleware(['permission:viewdoc_patients'])->only('show','index');
    }//end of constructor
    public function index(Request $request)
    {
        $labs=Lab::where(function($q) use($request){
            return $q->when($request->search,function($query) use($request){
            return $query->where('Name','like','%'.$request->search.'%')->orwhere('Phone','like','%'.$request->search.'%');
        });
        })->latest()->paginate(2);
        return view('labs.index',compact('labs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('labs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'Name' => 'required',
            'Phone'  => 'required|min:9|max:11',
            'Address'  => 'required|max:255',
        ]);


        Lab::create($request->all());


        session()->flash('success',__('site.added_successfully'));
        return redirect()->route('labs.index');



    }

    public function show($id)
    {
        // // $lab=Lab::find($id);
        // $patients = Lab::find(1)->patients()->get();
        // // foreach ($lab->patients as $patient) {
        // //     dd($patient);
        // // }
        // dd($patients);
 // User::select('name')->distinct()->get();
        $lab=Lab::find($id);
        // $lab_patients = $lab->patients->get();  
        $dates=PatientLab::Select('Date')->distinct()->get();
        // dd($dates);
        // dd($lab_patients);
    
        return view('users.patients.patient_lab.listlabpatients',compact('dates','lab'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Lab  $lab
     * @return \Illuminate\Http\Response
     */
    public function edit(Lab $lab)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Lab  $lab
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lab $lab)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Lab  $lab
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lab $lab)
    {
        $lab->delete();
        session()->flash('success',__('site.deleted_successfully'));
        return redirect()->route('labs.index');
    }
}
