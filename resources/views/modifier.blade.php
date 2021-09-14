@extends('layouts.app')

@section('content')
    <div class="row mt-5 justify-content-center">
        <div class="col-4">
            <div class="card border-primary mb-3 p-4">
                <h5 class="card-header bg-white text-primary">{{ $task->title }}</h5>
                <div class="card-body text-primary">
                    <p class="card-text">{{ $task->content }}</p>
                    @foreach ($task->users as $user)
                        <span class="border border-primary rounded p-1 text-primary">{{ $user->name }}</span>
                    @endforeach 
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-5 justify-content-center">
        <div class="col-8">
            <form  method="post" action="{{ route('tasks.modifier', $task->id) }}">
                @csrf
                <div class="form-group">
                    <label>Modifier le titre</label>
                    <input type="text" class="form-control" value='{{ $task->title }}' name='title'>
                </div>
                <div class="form-group">
                    <label>Modifier le texte</label>
                    <textarea type="text" class="form-control" name='content'>{{ $task->content }}</textarea>
                </div>
                <div class="form-group">
                    <label>Modifier l'assignation à un utilisateur (mail)</label>
                    <input name='email' type="text" class="form-control" value='{{ $user->email }}'
                </div>
                <button type="submit" class="btn btn-primary mt-4">Modifier</button>
            </form>

        </div>
    </div>
@endsection