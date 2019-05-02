<?php

namespace App\Http\Controllers;
use App\Patient;
use App\Session;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Sessioncontroller extends Controller
{
     public function __construct()
    {
        $this->middleware(['permission:readsession_patients'])->only('index');
        $this->middleware(['permission:createsession_patients'])->only('create');
        $this->middleware(['permission:updatesession_patients'])->only('edit');
        $this->middleware(['permission:viewsession_patients'])->only('show');
        $this->middleware(['permission:deletesession_patients'])->only('destroy');
        
    }//end of constructor

    public function index(Request $request)
    {   

        $patient=Patient::find($request->id);
        $x=Session::where(function($query) use($request){
            return $query->where('Date',$request->search);
        })->latest()->paginate(10);
        return view('users.patients.sessions.index',compact('x','patient'));
    }//end of index function

    public function create($id)
    {
        // dd($id);
        return view('users.patients.sessions.create',compact('id'));
    }//end of index function

    public function store(Request $request)
    {
         $request->validate([
            'Date' => 'required',
            'Procedure'  => 'required',
            'TotalFee'  => 'required|numeric|min:1',
        ]);
        $request['Paid']='0.0';
        $request['Remaining']='0.0';
        $request['status']=0;
         Session::create($request->all());
        session()->flash('success',__('site.added_successfully'));
        return redirect()->route('users.patient_sessions.show',$request->patient_id);
    }//end of store function

    public function show($id)
    {

        $patient=Patient::find($id);
        return view('users.patients.sessions.index',compact('patient'));
    }//end of index function

    public function edit($id)
    {
        $session=Session::find($id);
        return view('users.patients.sessions.edit',compact('session'));
    }//end of edit function

    public function update(Request $request,  $sessionid)
    {
        $request->validate([
            'Date' => 'required',
            'Procedure'  => 'required',
            'TotalFee'  => 'required|numeric|min:1',
        ]);
        $request['Paid']='0.0';
        $request['Remaining']='0.0';
        $session=Session::find($sessionid);
        $session->update($request->all());
         session()->flash('success',__('site.edited_successfully'));
        return redirect()->route('users.patient_sessions.show',$request->patient_id);
    }//end of update function

    public function destroy( Request $request,$id)
    {
        Session::find($id)->delete();
        session()->flash('success',__('site.deleted_successfully'));
        return redirect()->route('users.patient_sessions.show',$request->patient_id);
    }//end of destroy function
}
