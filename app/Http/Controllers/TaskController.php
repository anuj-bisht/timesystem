<?php

namespace App\Http\Controllers;
use App\Models\Task;
use Illuminate\Http\Request;
use Session;

class TaskController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks=Task::orderby('id','DESC')->get();    
        return view('tasks.list',compact('tasks','tasks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tasks.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       // dd($request->all());
      
        $request->validate([
            'first_name'=>'required',
            'last_name'=>'required',
            'email'=>'required|email|unique:users',
            'mobile_number'=>'required',
            'role'=>'required'
        ]);
       // echo $request->input('role');
        //die;
        $password_auto = generateStrongPassword();        
        $pwd=bcrypt($password_auto);
        User::create([
            'first_name' => $request->input('first_name'),
            'last_name'  =>  $request->input('last_name'),
            'email'  =>  $request->input('email'),
            'password' => $pwd,
            'is_active' =>1,
            'mobile_number' => $request->input('mobile_number'),
            'role' => $request->input('role')
        ]);
        Session::flash('flash_message', "User Created Successfully.");
        return redirect('/users');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('users.view',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('users.edit',compact('user','user'));
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
      
        $request->validate([
            'first_name'=>'required',
            'last_name'=>'required',
            'mobile_number'=>'required',
            'role'=>'required',
            'is_active'=>'required'
        ]);
        $user = User::find($id);
        $user->first_name = $request->get('first_name');
        $user->last_name = $request->get('last_name');
        $user->mobile_number = $request->get('mobile_number');
        $user->is_active = $request->get('is_active');
        $user->role = $request->get('role');

        $user->update();
        Session::flash('flash_message', "User Updated Successfully.");
        return redirect('/users');
    }

     /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
           // echo $id;
           // die;
        User::find($id)->delete();
        Session::flash('flash_message', "User Deleted Successfully.");
        return redirect('/users');
    }
    
}
