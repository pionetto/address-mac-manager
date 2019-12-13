@extends('layouts.principal')
@section('title', 'Editar Conta')
@section('content')

<h3>Editar Cadastro - {{ $clients->id }} </h3>
@include('helpers.alert-error')
<form action="{{ route("client.update", $clients->id) }}" method="POST">
    @method('PUT')
    @include('client._form')
    <button type="submit" class="btn btn-success">Alterar</button>
</form>
@stop