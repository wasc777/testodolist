@extends('layouts.app')



@section('content')
<div class="row">
    <div class="col-4">
        <h1 class="pt-5">Ajouter une tâche</h1>

        <form method="POST" action="{{ route('tasks.ajouter') }}">
            @csrf
            <div class="form-group">
                <label>Nom de la tâche</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" name="title">
                @error('title')
                    <span class="invalid-feedback">
                        {{ $message }}
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label>Nom de la tâche</label>
                <textarea type="text" class="form-control @error('content') is-invalid @enderror" name="content"></textarea>
                @error('content')
                    <span class="invalid-feedback">
                        {{ $message }}
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label>Assigner un utilisateur à cette tâche (mail)</label>
                <input type="mail" class="form-control @error('email') is-invalid @enderror" name="email">
                @error('email')
                    <span class="invalid-feedback">
                        {{ $message }}
                    </span>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Créer</button>
        </form>
    </div>

</div>
    
<div class="row">
    <div class="col-8">
        <h1 class="pt-5">Vos tâches</h1>
    </div>
    <div class="card-columns mt-5">
        @foreach ($tasks as $task)
            <div class="card border-primary mb-3 p-4">
                <a href="{{ route('tasks.delete',$task->id) }}"><span aria-hidden="true">&times;</span></a>
                <h5 class="card-header bg-white text-primary">{{ $task->title }}</h5>
                <div class="card-body text-primary">
                    <p class="card-text">{{ $task->content }}</p>
                    @foreach ($task->users as $user)
                        <span class="border border-primary rounded p-1 text-primary">{{ $user->name }}</span>
                    @endforeach 
                </div>
                <a href="{{ route('tasks.showmodifier', $task->id) }}" class="btn btn-dark">Modifier</a>        
            </div>
        @endforeach
    </div>
</div>
<div class="row">
    <div class="col-8">
        <h1 class="pt-5">Vos tâches assignées</h1>
    </div>
    <div class="card-columns mt-5">
        @foreach ($asignedTask as $task)
            <div class="card border-primary mb-3 p-4">
                <a href="{{ route('tasks.delete',$task->id) }}"><span aria-hidden="true">&times;</span></a>
                <h5 class="card-header bg-white text-primary">{{ $task->title }}</h5>
                <div class="card-body text-primary">
                    <p class="card-text">{{ $task->content }}</p>
                    @foreach ($task->users as $user)
                        <span class="border border-primary rounded p-1 text-primary">{{ $user->name }}</span>
                    @endforeach 
                </div>
                <a href="{{ route('tasks.showmodifier', $task->id) }}" class="btn btn-dark">Modifier</a>        
            </div>
        @endforeach
    </div>
</div>

@endsection

{{-- @dd(get_defined_vars()) --}}


