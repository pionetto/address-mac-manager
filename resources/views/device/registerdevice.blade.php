@extends('principal')
@section('title', 'Cadastrar Dispositivo')
@section('content')

<h3>Cadastro de Dispositivos</h3>
 @if (count($errors) > 0 )
        <div class="alert alert-danger">
        <strong> Erros: </strong>
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
@endif

<form action="{{action("ClientController@saving") }}" method="POST">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" name="insert" value="insert">
    <div class="form-group">
        <label>Nome:</label>
        <input type="text" name="name" class="form-control" value="{{ old('name') }}">
    </div>
    <div class="form-group">
            <label>Matricula:</label>
            <input type="text" name="regist" class="form-control"  value="{{ old('regist') }}">
    </div>
    <div class="form-group">
        <label>Secretaria:</label>
        <input type="text" name="secretary" class="form-control"  value="{{ old('secretary') }}">
    </div>
    <div class="form-group">
        <label>Lotação:</label>
        <input type="text" name="workplace" class="form-control"  value="{{ old('workplace') }}">
</div>
    <button type="submit" class="btn btn-success">Cadastrar</button>
</form>
@stop