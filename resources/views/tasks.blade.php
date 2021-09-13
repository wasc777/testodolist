@extends('layouts.app')


<div class="row">
@section('content')
    <div class="col-4 p-0 m-0">
        <h1 class="pt-5">Ajouter une tâche</h1>

        <form method="POST" action="{{ route('tasks.ajouter') }}">
            @csrf
            <div class="form-group">
                <label>Nom de la tâche</label>
                <input type="text" class="form-control" name="title">
            </div>
            <div class="form-group">
                <label>Nom de la tâche</label>
                <textarea type="text" class="form-control" name="content"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Créer</button>
        </form>
    </div>

    <h1 class="pt-5">Vos tâches</h1>
    <div class="card-columns mt-5">
        @foreach ($tasks as $task)
            <div class="card p-4">
                <h5 class="card-title">{{ $task->title }}</h5>
                <p class="card-text">{{ $task->content }}</p>
                <i class="fas fa-times-circle"></i>
            </div>
        @endforeach
    </div>
@endsection

</div>
