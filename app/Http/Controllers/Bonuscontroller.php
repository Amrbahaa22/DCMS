<?php

namespace App\Http\Controllers;
use App\User;
use App\Bonus;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Bonuscontroller extends Controller
{
    public function __construct()
    {
        $this->middleware(['permission:update_users'])->only('show');
    }//end of constructor

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
     
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
            'user_id'      => 'required',
            'cach'         => 'required',
            'Date'         => 'required',
            'typeofreward' => 'required',
            
        ]);
         
        
        $bonus = Bonus::create($request->all());
        $x=0;
        $user=User::find($request->user_id);
        
        if($user->hasRole('Doctor')){
            $x=1;
        }else{
            $x=0;
        }
        
        
        session()->flash('success',__('site.added_successfully'));
        if($x==1){
        return redirect()->route('users.doctors.index');
        }
        return redirect()->route('users.employees.index');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Bonus  $bonus
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $x=0;
        $user=User::find($id);
        // $y=$user->hasRole('Doctor');
        // return  $y;
        if($user->hasRole('Doctor')){
            $x=1;
        }else{
            $x=0;
        }
        
        if($x==1){
        return view('users.doctors.addbonus',compact('id'));     
        }else{
         return view('users.employees.addbonus',compact('id')); 
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Bonus  $bonus
     * @return \Illuminate\Http\Response
     */
    public function edit(Bonus $bonus)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Bonus  $bonus
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bonus $bonus)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Bonus  $bonus
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bonus $bonus)
    {
        //
    }
}
