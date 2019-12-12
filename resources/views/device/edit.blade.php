@extends('principal')
@section('title', 'Editar Dispositivo')
@section('content')

<h3>Editar Dispositivo - {{ $device->id }} </h3>
<form action="{{ action("DeviceController@update", $device->id) }}" method="POST">
        @csrf
        @method('PUT')
    <div class="form-group">
        <label>Nome:</label>
    <input type="text" name="name" class="form-control" value="{{ $device->name }}">
    </div>
    <div class="form-group">
            <label>Tipo:</label>
            <input type="text" name="type" class="form-control" value="{{ $device->type }}">
    </div>
    <div class="form-group">
        <label>Endereço MAC:</label>
        <input type="text" name="device" class="form-control" value="{{ $device->device }}">
    </div>
    <div class="form-group">
        <label>Status:</label>
        <input type="checkbox" name="enable" class="form-control" {{ $device->enable ? "checked" : false }}>
    </div>
    <button type="submit" class="btn btn-success">Alterar</button>
</form>
@stop