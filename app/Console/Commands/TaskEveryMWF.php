<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Task;
use App\Models\TaskPrograming;
use Carbon\Carbon;

class TaskEveryMWF extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'task:everyMWF';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create Tasks Every Monday, Wendnesday, Friday';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $task = Task::where('status','=','Active')->where('type','=','Every-M-W-F')->get();
            $date = Carbon::now('America/Caracas');
        foreach($task as $task){
            $taskPrograming = new TaskPrograming();
            $taskPrograming->task_id = $task->id;     
            $taskPrograming->user_id = $task->user_id;   
            $taskPrograming->type = $task->type;            
            $taskPrograming->title = $task->title;
            $taskPrograming->content = $task->content;
            $taskPrograming->check = 'New Task';
            $taskPrograming->date = $date->toDateTimeString();
            $taskPrograming->save();
        }
    }
}
