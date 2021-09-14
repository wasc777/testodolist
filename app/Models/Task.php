<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Task extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'content'];

    public function users()
    {
        return $this->belongsToMany(User::class, 'task_user');
    }    
}
