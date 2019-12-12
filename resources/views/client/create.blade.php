@extends('principal')
@section('title', 'Cadastrar Cliente')
@section('content')

<h3>Cadastro de Clientes</h3>
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

<form action="{{action("ClientController@store") }}" method="POST">
    @include('client._form')
    <button type="submit" class="btn btn-success">Cadastrar</button>
</form>
@stop