<?php

namespace App\Http\Controllers;
use App\User;
use App\Workedhour;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Workedhourscontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees=User::whereRoleIs('Employee')->get();
        return view('users.employees.workedhours',compact('employees'));
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
        $request->validate([
            'name' => 'required',
            'Date'  => 'required',
            'id'=>'required',
            'workhours'  => 'required|min:1|max:24',
        ]);
        $request_data=$request->except(['id']);;
        $request_data['user_id']=$request->id;

        Workedhour::create($request_data);


        session()->flash('success',__('site.added_successfully'));
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Workedhour  $workedhour
     * @return \Illuminate\Http\Response
     */
    public function show(Workedhour $workedhour)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Workedhour  $workedhour
     * @return \Illuminate\Http\Response
     */
    public function edit(Workedhour $workedhour)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Workedhour  $workedhour
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Workedhour $workedhour)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Workedhour  $workedhour
     * @return \Illuminate\Http\Response
     */
    public function destroy(Workedhour $workedhour)
    {
        //
    }
}
