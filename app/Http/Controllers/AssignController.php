<?php

namespace App\Http\Controllers;
use App\Models\Project;
use App\Models\User;
use App\Models\Assign;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;

class AssignController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $projects=Project::orderby('id','DESC')->get();  
        return view('assign.list',compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {    
        $users=User::orderby('id','DESC')->where('role','2')->get();
        $projects=Project::orderby('id','DESC')->get();    
        return view('assign.create',compact('projects','users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        $request->validate([
            'project_id'=>'required',
            'user_id'=>'required'
            
        ]);

        $rows = $request->input('user_id');

        
        foreach ($rows as $key=>$val)
        {

            
            $charges[] = [
                'project_id'=>$request->input('project_id'),
                'user_id'=>$val,
                'assign_by'=> $user->id
            ];


            
        }
        
        Assign::insert($charges);
        //Assign::create($Charges);
        Session::flash('flash_message', "Project Assign Successfully.");
        return redirect('/assign');
        die;
        Assign::create([
            'project_id'=>$request->input('project_id'),
            'user_id'=>$request->input('user_id'),
            'assign_by'=> $user->id
        ]);

        Session::flash('flash_message', "Project Assign Successfully.");
        return redirect('/assign');
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
