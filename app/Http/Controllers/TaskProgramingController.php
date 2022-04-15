<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Task;
use App\Models\TaskPrograming;
use App\Models\User;
use Illuminate\Support\Str;
use Carbon\Carbon;

class TaskProgramingController extends Controller
{
    public function index()
    {
        $date = Carbon::now('America/Caracas');

        return TaskPrograming::where('date','=',$date->toDateString())->select('id','type','user_id','task_id','title','date','content','check','end')->get();
    }

    public function tomorrow()
    {

        $tomorrow = Carbon::tomorrow();       
        return TaskPrograming::where('date','=',$tomorrow->toDateString())->select('id','type','user_id','task_id','title','date','content','check')->get();
    }

    public function nextweek()
    {

        $sdate = Carbon::parse('this monday')->toDateString();
        $edate = Carbon::parse('this monday')->addDay(6)->toDateString();    

        return TaskPrograming::where('date', '>', $sdate)->where('end', '<=', $edate)->select('id','type','user_id','task_id','title','date','content','check')->get();
    }

    public function nextask()
    {

        $date = Carbon::now('America/Caracas');

        return TaskPrograming::where('date','>',$date->toDateString())->select('id','type','user_id','task_id','title','date','content','check')->get();
    }
   

    
   
    public function show(TaskPrograming $task)
    {
        return response()->json([
            'task'=>$task
        ]);
    }

  
    public function update(Request $request, TaskPrograming $task)
    {
        $request->validate([
            'check'=>'required',                 
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

    public function destroy($id)
    {
        try {          

            $task = TaskPrograming::findOrFail($id);
            $task->check = 'Task Finish';
            $task->save();
        

            return response()->json([
                'message'=>'Task Finish Successfully!!'
            ]);
            
        } catch (\Exception $e) {
            \Log::error($e->getMessage());
            return response()->json([
                'message'=>'Something goes wrong while deleting a task!!'
            ]);
        }
    }

    
    
  
}
