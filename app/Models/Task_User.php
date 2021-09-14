<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task_User extends Model
{
    use HasFactory;

    protected $table = 'task_user';

    protected $fillable = ['user_id', 'task_id', 'asigned_id'];

    // return $user->id === $task->user_id;
}
