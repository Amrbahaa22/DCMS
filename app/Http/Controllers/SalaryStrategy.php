<?php

namespace App\Http\Controllers;
use App\Session;
use App\Patient;
use App\User;
use App\Workedhour;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

interface SalaryStrategy 
{
    public function calculatesalary(string $from,string $to,string $name);
}
/**
 * 
 */
class DoctorSalary implements SalaryStrategy
{
	
	public function calculatesalary(string $from,string $to,string $name){
		$arr = array();
		$arr2=array();
 		$totalpaid=0;
		$patients=Patient::where('doctorName',$name)->get();
		foreach ($patients as $patient) {
			 array_push($arr, $patient->id);
		}
		$patients_sessions=Session::whereBetween('Date', [$from, $to])->whereIn('patient_id',$arr )->get();
		foreach ($patients_sessions as  $session) {
			$totalpaid += $session->Paid;
		}
		$doctor=User::whereRoleIs('Doctor')->where('name',$name)->get();
		 array_push($arr2, ( $doctor[0]->Incomerate / 100.0 ) * $totalpaid);
		 array_push($arr2, $totalpaid);
		return $arr2;
	}
}

class EmployeeSalary implements SalaryStrategy
{
	
	public function calculatesalary(string $from,string $to,string $name)
	{
		$arr2=array();
		$totalhour=0;
		$employee = Workedhour::whereBetween('Date', [$from, $to])->where('name',$name)->get();
		// return $employee;
		$t=User::whereRoleIs('Employee')->where('id',$employee[0]->user_id)->get();
			foreach ($employee as $emp) {
					$totalhour += $emp->workhours;
			}
		array_push($arr2 , $totalhour);
		array_push($arr2 , $totalhour*$t[0]->HourSalary);
			return $arr2;
	}
}

class CalculateSalary 
{
	
	public function calculateSalary(SalaryStrategy $salary,string $from,string $to,string $name){
		return $salary->calculatesalary($from,$to,$name);

	}
}