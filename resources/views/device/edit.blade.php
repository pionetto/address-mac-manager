@extends('layouts.principal')
@section('title', 'Editar Dispositivo')
@section('content')

<h3>Editar Dispositivo - {{ $device->id }} </h3>
<form action="{{ route("device.update", $device->id) }}" method="POST">
    @method('PUT')
    @include('device._form')
    <button type="submit" class="btn btn-success">Alterar</button>
</form>
@stop