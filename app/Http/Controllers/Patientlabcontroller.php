<?php

namespace App\Http\Controllers;
use App\Lab;
use App\PatientLab;
use App\Patient;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Patientlabcontroller extends Controller
{
    public function __construct()
    {
        $this->middleware(['permission:updatedoc_patients'])->only('create');
        $this->middleware(['permission:viewdoc_patients'])->only('show','index');
    }//end of constructor
    public function index(Request $request)
    {
        $lab=Lab::find($request->id);
        $dates=PatientLab::Select('Date')->distinct()->get();
        // dd($lab);
        $patients_founded=PatientLab::where(function($query) use($request){
            return $query->where('lab_id',$request->id)->where('Date','like','%'.$request->search.'%');
        })->latest()->paginate(2);
        // return $patients_founded;
        return view('users.patients.patient_lab.listlabpatients',compact('patients_founded','lab','dates'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $request->validate([
            'patient_id' => 'required',
            'labName'  => 'required',
            'expenses'  => 'required|numeric|min:1',
            'type'=> 'required|max:255',
            'Date'=>'required',
        ]);
        $request_data=$request->except(['lab_id']);
        $lab=Lab::where('Name',$request->labName)->get();
        $request_data['lab_id']=$lab[0]->id;
        $request_data['Paymentstatus']=0;
        $patient = PatientLab::create($request_data);


        session()->flash('success',__('site.added_successfully'));
        return redirect()->route('users.patients.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $labs=Lab::find(1)->all();
        // dd($labs);
        return view('users.patients.patient_lab.addpatientlab',compact('id','labs'));
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
        $patientlab=PatientLab::find($id);
        $patientlab->update([
            
            'Paymentstatus'=>request()->has('Paymentstatus')

        ]);
        return back();
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
