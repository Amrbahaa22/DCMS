<?php

namespace App\Http\Controllers;
use App\Session;
use App\Patient;
use Illuminate\Http\Request;

class Dentalcliniccontroller extends Controller
{
 	public function index(){
 		$sessions=Session::where('status', 0)->get();
 		return view('users.index',compact('sessions'));

 	}//end of index function
 	public function update(Request $request, $id){

 		$patientsession=Session::find($id);
        $request->validate([
            'Paid' => 'required|min:0',
            
        ]);
        $request_data['Paid']=$request['Paid'];
        $request_data['Remaining']=$patientsession->TotalFee - $request->Paid;
        $request_data['status']=1;
        $patientsession->update($request_data);
        return back();

 	}//end of index function
}
