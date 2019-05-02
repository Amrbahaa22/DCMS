<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Illuminate\Validation\Rule;
class Doctorcontroller extends Controller
{
     public function __construct()
    {
        $this->middleware(['permission:create_users'])->only('create');
        $this->middleware(['permission:read_users'])->only('index');
        $this->middleware(['permission:update_users'])->only('edit');
        $this->middleware(['permission:delete_users'])->only('destroy');
    }//end of constructor
    public function index(Request $request)
    {
        $users=User::whereRoleIs('Doctor')->where(function($q) use($request){
            return $q->when($request->search,function($query) use($request){
            return $query->whereRoleIs('Doctor')->where('name','like','%'.$request->search.'%')->orwhere('phone','like','%'.$request->search.'%');
        });
        })->latest()->paginate(2);
        return view('users.doctors.index',compact('users'));
    }//end of index function

   
    public function create()
    {
        return view('users.doctors.create');
    }//end of create function

   
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'age'  => 'required|numeric|min:1|max:120',
            'phone'  => 'required|max:11|min:9',
            'email'=> 'required|unique:users',
            'image'=> 'image',
            'Incomerate' => 'required|numeric|min:1|max:100',
            'password' => 'required|confirmed',

        ]);
        $request['HourSalary']='0.0';
        $request_data=$request->except(['password','password_confirmation','image']);
        $request_data['password']=bcrypt($request->password);
        if($request->image){
        
        Image::make($request->image)->resize(300, null, function ($constraint) {
        $constraint->aspectRatio();
        })->save(public_path('uploads/user_images/'.$request->image->hashName()));
        
        $request_data['image']=$request->image->hashName();

        }//end of if
        $user = User::create($request_data);

        $user->attachRole('Doctor');

        session()->flash('success',__('site.added_successfully'));
        return redirect()->route('users.doctors.index');


    }//end of store function

   
    public function edit($userid)
    {   
        $user=User::find($userid);
        return view('users.doctors.edit',compact('user'));   
    }//end of edit function

    public function update(Request $request,  $userid)
    {

         $request->validate([
            'name' => 'required',
            'age'  => 'required|numeric|min:1|max:120',
            'phone'  => 'required|max:11|min:9',
            'email'=> ['required',Rule::unique('users')->ignore($userid),],
            'image'=> 'image',
            'Incomerate' => 'required|numeric|min:1|max:100',

        ]);
        
        $request_data=$request->except(['image']);
        
        $user=User::find($userid);
        
        if($request->image){
            
            if($user->image != 'default.png'){
                Storage::disk('public_uploads')->delete('/user_images/'.$user->image);
            }//end of inner if
       
            Image::make($request->image)->resize(300, null, function ($constraint) {
            $constraint->aspectRatio();
            })->save(public_path('uploads/user_images/'.$request->image->hashName()));
            
            $request_data['image']=$request->image->hashName();
        }//end of external if
        $user->update($request_data);
        session()->flash('success',__('site.edited_successfully'));
        return redirect()->route('users.doctors.index');
    }//end of update function

    public function destroy($id)
    {
        $user=USER::find($id);
        if($user->image != 'default.png'){
            Storage::disk('public_uploads')->delete('/user_images/'.$user->image);
        }
        $user->delete();
        session()->flash('success',__('site.deleted_successfully'));
        return redirect()->route('users.doctors.index');
    }//end of destroy function

}
