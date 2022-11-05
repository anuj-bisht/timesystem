<?php
namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Auth;
use Validator;
use App\Models\Project;
use App\Models\Assign;
use App\Models\User;
use App\Models\Task;

class ApiController extends Controller
{
//project listing
    public function projectList(){
       
        $project =Project::orderby('id','DESC')->get();
        return response()->json(['data' => $project]);
    }

    //assign projectlist to user
    public function assignProjectList(Request $request){

        $request->validate([
            'user_id'=>'required',
        ]);
        $user_id=$request->user_id;
        $results = Assign::where('user_id','=' ,$user_id)
        ->leftJoin("users", "users.id", "=", "assigns.user_id")
        ->leftJoin("projects", "projects.id", "=", "assigns.project_id")
        ->get();
        return response()->json(['data' => $results]);
    }
    //create project
    public function createProject(Request $request){
        $request->validate([
            'name'=>'required|unique:projects',
            'description'=>'required',
            'start_date'=>'required',
            'end_date'=>'required',
            'duration'=>'required'

        ]);
        $project=Project::create([
            'name'=>$request->name,
            'description'=>$request->description,
            'start_date'=>$request->start_date,
            'end_date'=>$request->end_date,
            'duration'=>$request->duration,
            'is_active'=>1
        ]);
        return response()->json(['data' => $project]);
    }

    //user listing
    public function userList(Request $request){

        $user =User::orderby('id','DESC')->where('role','=' ,2)
        ->get();
        return response()->json(['data' => $user]);
    }

    //project update
    public function updateProject(Request $request,$id)
    {
        
        
        $project = Project::find($id);
        $project->update($request->all());
        //return $project;
        return response()->json(['data' => $project,'message'=>'Update record sucessfully!']);
        
       
    }

    public function Projectdestroy($id)
    {
        //
        return Project::destroy($id);
    }

    public function assignProject(Request $request)
    {
        $user = Auth::user();
        $request->validate([
            'project_id'=>'required',
            'user_id'=>'required'
            
        ]);
       
        $rows = $request->user_id;
        
        
        foreach ($rows as $key=>$val)
        {

            
            $charges[] = [
                'project_id'=>$request->project_id,
                'user_id'=>$val,
                'assign_by'=> $user->id
            ];


            
        }
        
        $data = Assign::insert($charges);
        return response()->json(['data' => $data]);
        //Assign::create($Charges);
        
        
    }
    
    //create task
    public function createTask(Request $request){
        $user = Auth::user();
        $request->validate([
            'name'=>'required|unique:tasks',
            'description'=>'required',
            'date'=>'required',
            'duration'=>'required',
            'project_id'=>'required'

        ]);


        $task=Task::create([
            'name'=>$request->name,
            'description'=>$request->description,
            'date'=>$request->date,
            'duration'=>$request->duration,
            'is_active'=>1,
            'user_id' => $user->id,
            'project_id' =>$request->project_id,
        ]);
        return response()->json(['data' => $task]);
    }

    //Task update
    public function updateTask(Request $request,$id)
    {
        
        
        $task = Task::find($id);
        $task->update($request->all());
        //return $project;
        return response()->json(['data' => $task,'message'=>'Update record sucessfully!']);
        
       
    }

    //Task Destory
    public function Taskdestroy($id)
    {
        //
        $data =  Task::destroy($id);
        return response()->json(['data' => $data,'message'=>'Delete record sucessfully!']);
    }

    public function TaskListByDate(Request $request){
        $request->validate([
            'date'=>'required'

        ]);
        $data = Task::where('date', '=', $request->date)->get();
        return response()->json(['data' => $data,'message'=>'Search Record!']);
    }


    public function TaskListByUserList(Request $request){
        
        $request->validate([
            'user_id'=>'required'
        ]);
        $data = Task::where('id', '=', $request->user_id)->get();
        if(count($data)){
            return response()->json(['data' => $data,'message'=>'Task Record!']);
        }else{
            return response()->json(['data' => $data,'message'=>'Task Not Found!']);

        }
        
    }

    public function ApprovedTask(Request $request, $id){
        $task = Task::find($id);
        
        $task->update($request->all());

        return response()->json(['data' => $task,'message'=>'Task approved sucessfully!']);
    }

}