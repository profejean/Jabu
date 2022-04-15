<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\User;
use Illuminate\Support\Str;
use Carbon\Carbon;

class TaskController extends Controller
{
    public function index()
    {
        return Task::select('id','type','user_id','title','status','content')->get();
    }


  
    public function store(Request $request)
    {  
        $request->validate([
            'type'=>'required',          
            'title'=>'required',       
            'content'=>'required'
        ]);

        try{
         
            $task = new Task();
            $task->type = $request->get('type');
            $task->user_id = 1;/*$request->get('user_id');*/
            $task->title = $request->get('title');
            $task->status = 'Active';
            $task->content = $request->get('content');
            $task->save();

            return response()->json([
                'message'=>'Task Created Successfully!!'
            ]);
        }catch(\Exception $e){
            \Log::error($e->getMessage());
            return response()->json([
                'message'=>'Something goes wrong while creating a task!!'
            ],500);
        }
    }

   
    public function show(Task $task)
    {
        return response()->json([
            'task'=>$task
        ]);
    }

  
    public function update(Request $request, Task $task)
    {
        $request->validate([             
            'title'=>'required',         
            'content'=>'required', 
            'status'=>'required',
            'type'=>'required'    
        ]);

        try{

            $task->fill($request->all())->update();            

            return response()->json([
                'message'=>'Task Updated Successfully!!'
            ]);

        }catch(\Exception $e){
            \Log::error($e->getMessage());
            return response()->json([
                'message'=>'Something goes wrong while updating a task!!'
            ],500);
        }
    }

    public function destroy(Task $task)
    {
        try {          

            $task->delete();

            return response()->json([
                'message'=>'Task Deleted Successfully!!'
            ]);
            
        } catch (\Exception $e) {
            \Log::error($e->getMessage());
            return response()->json([
                'message'=>'Something goes wrong while deleting a task!!'
            ]);
        }
    }
}
