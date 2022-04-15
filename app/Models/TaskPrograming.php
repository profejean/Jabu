<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskPrograming extends Model
{
    use HasFactory; 

    protected $table = 'task_programings';

    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = [
                            'type',
                            'user_id',
                            'task_id',
                            'title',
                            'content',
                            'date',
                            'check',
                            'end'
                          ];
}
