<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $table = 'tasks';

    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = [
                            'type',
                            'user_id',
                            'title',
                            'content',
                            'status'
                          ];
}


