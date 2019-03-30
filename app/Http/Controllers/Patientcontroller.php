<?php

namespace App\Http\Controllers;

use App\Patient;
use Illuminate\Http\Request;

class Patientcontroller extends Controller
{
    public function index()
    {
        $patients=patient::all();
        return view('users.patients.index',compact('patients'));
    }

    public function create()
    {
        return view('users.patients.create');
    }

    public function store(Request $request)
    {
        //
    }

    public function edit(Patient $patient)
    {
        //
    }

    public function update(Request $request, Patient $patient)
    {
        //
    }

    public function destroy(Patient $patient)
    {
        //
    }
}
