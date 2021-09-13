<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Task_User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function showall()
    {   
        $tasks = auth()->user()->tasks;
        return view('tasks', compact('tasks'));
    }

    public function ajouter(Request $request)
    {
        
        // $userId = auth()->id();
        // $request['user_id'] = $userId;

        // Task::create([
        //     'title' => $request->title,
        //     'content' => $request->content,
        // ]);

        $task = Task::create($request->all());
        Task_User::create([
            'user_id' => Auth::user()->id,
            'task_id' => $task->id,
        ]);
        
        return (redirect()->back());
    }
}
