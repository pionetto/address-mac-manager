@extends('principal')
@section('title', 'Editar Conta')
@section('content')

<h3>Editar Cadastro - {{ $clients->id }} </h3>
<form action="{{ action("ClientController@update", $clients->id) }}" method="POST">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" name="update" value="update">
    <div class="form-group">
        <label>Nome:</label>
    <input type="text" name="name" class="form-control" value="{{ $clients->name }}">
    </div>
    <div class="form-group">
            <label>Matrícula:</label>
            <input type="text" name="regist" class="form-control" value="{{ $clients->regist }}">
    </div>
    <div class="form-group">
        <label>Secretaria:</label>
        <input type="text" name="secretary" class="form-control" value="{{ $clients->secretary }}">
    </div>
    <div class="form-group">
        <label>Lotação:</label>
        <input type="text" name="workplace" class="form-control" value="{{ $clients->workplace }}">
    </div>
    <button type="submit" class="btn btn-success">Alterar</button>
</form>
@stop