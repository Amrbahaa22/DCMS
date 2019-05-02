<?php

namespace App\Http\Controllers;
use App\User;
use App\Expense;
use App\PatientLab;
use App\Http\Controllers\SalaryStrategy;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Reportcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $doctorsdata=[];
        $employeesdata=[];
        $reportdata=[];
        if($request->Date1!='' and $request->Date2!=''){
          $i=0;
        $j=0;
        $totalexpenses=0.0;
        $totaldocsalary=0.0;
        $totalempsalary=0.0;
        $doctorsalary=0.0;
        $total_unpaid_lab=0.0;
        $totalincome=0.0;
        $total_paid_lab=0.0;
        $doctors=User::whereRoleIs('Doctor')->get();
        $employees=User::whereRoleIs('Employee')->get();
        $expenses=Expense::whereBetween('Date', [$request->Date1, $request->Date2])->get();
        $patients_unpaid_lab=PatientLab::whereBetween('Date', [$request->Date1, $request->Date2])->where('Paymentstatus',0)->get();
        $patients_paid_lab=PatientLab::whereBetween('Date', [$request->Date1, $request->Date2])->where('Paymentstatus',1)->get();
        $x=new CalculateSalary();
        foreach ($doctors as $doctor) {
            $arr=$x->calculateSalary(new DoctorSalary,$request->Date1,$request->Date2,$doctor->name);
            $doctorsdata[$i][0]=$doctor->name;
            $doctorsdata[$i][1]=$arr[0];
            $doctorsdata[$i][2]=$doctor->Incomerate;
            $doctorsdata[$i][3]=$arr[1];
            $totaldocsalary+=$arr[0];
            $totalincome+=$arr[1];
            $i++;
        }
        foreach ($employees as $employee) {
            $arr1=$x->calculateSalary(new EmployeeSalary,$request->Date1,$request->Date2,$employee->name);
            $employeesdata[$j][0]=$employee->name;
            $employeesdata[$j][1]=$arr1[0];
            $employeesdata[$j][2]=$employee->HourSalary;
            $employeesdata[$j][3]=$arr1[1];
            $totalempsalary+=$arr1[1];
            $j++;
        }
        foreach ($patients_unpaid_lab as $patient_unpaid_lab) {
            $total_unpaid_lab+=$patient_unpaid_lab->expenses;
        }
        foreach ($patients_paid_lab as $patient_paid_lab) {
            $total_paid_lab+=$patient_paid_lab->expenses;
        }
        foreach ($expenses as $expense) {
            $totalexpenses+=$expense->cost;
        }
        $reportdata[0]=$totalincome-($totalempsalary+$totalexpenses+$totaldocsalary+$total_paid_lab);
        $reportdata[1]=$total_unpaid_lab;
        $reportdata[2]=$total_paid_lab;
        $reportdata[3]=$totaldocsalary;
        $reportdata[4]=$totalempsalary;
        $reportdata[5]=$totalexpenses;
        
        return view('report.report',compact('doctorsdata','employeesdata','expenses','reportdata'));   
        }
        $reportdata[0]=0.0;
        $reportdata[1]=0.0;
        $reportdata[2]=0.0;
        $reportdata[3]=0.0;
        $reportdata[4]=0.0;
        $reportdata[5]=0.0;    
        $expenses=Expense::where('id',-1)->get();
        return view('report.report',compact('doctorsdata','employeesdata','expenses','reportdata'));
           
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('report.report');
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
