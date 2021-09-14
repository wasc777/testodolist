<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use App\Models\Task_User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class TaskController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function showall()
    {
        $tasks = User::find(Auth::user()->id)->tasks;
        foreach ($tasks as $task) {
            $task->users;
        }
        
        $asignedTask = User::find(Auth::user()->id)->task_asign;
        foreach ($asignedTask as $task) {
            $task->users;
        }

        

        return view('tasks', compact('tasks', 'asignedTask'));
    }

    public function ajouter(Request $request)
    {

        //-------VALIDATOR
        $validator = Validator::make($request->all(), [
            'title' => ['required', 'max:255'],
            'content' => ['required'],
            'email' => ['nullable', ['email']]
        ]);
        
        if ($validator->fails()){
            return redirect()
            ->back()
            ->withErrors($validator->errors());
        };

        //-------ASSIGNER UN AUTRE USER A UNE TASK
        $task = Task::create($request->all());

        if(request('email')){
            $user = User::where('email', request('email') )->first();

            Task_User::create([
                'user_id' => Auth::user()->id, 
                'task_id' => $task->id,
                'asigned_id' => $user->id
            ]);
        }
        else{

            Task_User::create([
                'user_id' => Auth::user()->id,
                'task_id' => $task->id,
                'asigned_id' => Auth::user()->id
            ]);

        }
        
        return redirect()->back();
    }

    public function showmodifier($id)
    {
        $task = Task::findOrFail($id);

        return view('modifier', compact('task'));
    }


    public function modifier(Request $request, $id)
    {
        $task = Task::find($id);

        $validator = Validator::make($request->all(), [
            'title' => ['required', 'max:255'],
            'content' => ['required'],
            'email' => ['nullable', ['email']]
        ]);
        
        if ($validator->fails()){
            return redirect()
            ->back()
            ->withErrors($validator->errors());
        }

        $task->title = request('title');
        $task->content = request('content');

        if(request('email')){
            $user = User::where('email', request('email') )->first();
        }

        $task->save();

        return redirect()->route('tasks');
    }

    public function deletetask($id)
    {
       $task = Task::find($id);

       if($task){
           $task->delete();
       }

       return redirect()->back();
    }


}



