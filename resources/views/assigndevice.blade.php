@extends('principal')
@section('title', 'Dispositivos')
@section('content')

<h3>Cadastro Dispositivos - {{ $devices->id }} </h3>
<form action="{{ action("ClientController@assigndevice", $devices->id) }}" method="GET">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" name="update" value="update">
    <div class="form-group">
        <label>Nome:</label>
        <label> {{ $devices->name }} </label>
    </div>
    <div class="form-group">
            <label>Tipo:</label>
            <label> {{ $devices->type }} </label>
    </div>
    <div class="form-group">
        <label>Habilitado:</label>
        <label> {{ $devices->enable }} </label>
    </div>
    <div class="form-group">
        <label>Dispositivo:</label>
        <label> {{ $devices->device }} </label>
    </div>
    <button type="submit" class="btn btn-success" href="{{ action("ClientController@assigndevice") }}">Associar dispositivo</button>
</form>
@stop