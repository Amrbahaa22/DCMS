<?php

namespace App\Http\Controllers;
use App\Patient;
use App\Todaypatients;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Todaypatientscontroller extends Controller
{
     public function __construct()
    {
        $this->middleware(['permission:updatesec_patients'])->only('index');
    }//end of constructor
    public function index()
    {   
        $time=date('H:i');
        // return $time;
        $today=date('Y-m-d');
        $patients_retreved=Patient::where('NextAppointment',date('Y-m-d'))->get();
        $patients_retreved2=Patient::where('NextAppointment',date('Y-m-d',strtotime("-1 days")))->get();
        $todaypatients=Todaypatients::find(1)->all();
        foreach ($todaypatients as $todaypatient) {
            $today=$todaypatient->Date;
            break;
        }
        if($time < '02:00'){  
                Todaypatients::truncate();
                foreach ($patients_retreved2 as $patient) {
                    $data['name'] = $patient->name;
                    $data['Date'] = $patient->NextAppointment;
                    $data['attendance'] = $patient->attendance;
                    Todaypatients::create($data);
                }
            
        }else{
                Todaypatients::truncate();
                foreach ($patients_retreved as $patient) {
                    $data['name'] = $patient->name;
                    $data['Date'] = $patient->NextAppointment;
                    $data['attendance'] =$patient->attendance;
                    Todaypatients::create($data);
                }
        }
       
         $patients=Todaypatients::find(1)->all();
         // return $patients;
        return view('todaypatients.index',compact('patients'));
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
        //
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
        $attendedpatient=Todaypatients::find($id);
        $attendedpatient2=Patient::where('name',$attendedpatient->name);
        $attendedpatient->update([
            
            'attendance'=>request()->has('attendance')

        ]);

        $attendedpatient2->update([
            
            'attendance'=>request()->has('attendance')

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
