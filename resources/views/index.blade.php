@extends('layouts.app')

@section('content')
<div class="row justify-content-center pt-5">
    <div class="col-4">
        <h1>Bonjour</h1>
        <p>Veuillez vous connecter ou créer un compte pour voir ou créer des tâches</p>
        <a href="{{ route('tasks') }}"><button class="btn btn-primary">Mes tâches</button></a>
    </div>
</div>
@endsection