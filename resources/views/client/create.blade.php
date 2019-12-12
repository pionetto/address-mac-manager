@extends('principal')
@section('title', 'Cadastrar Cliente')
@section('content')

<h3>Cadastro de Clientes</h3>
@include('helpers.alert-error')

<form action="{{action("ClientController@store") }}" method="POST">
    @include('client._form')
    <button type="submit" class="btn btn-success">Cadastrar</button>
</form>
@stop