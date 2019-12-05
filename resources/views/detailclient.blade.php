@extends('principal')
@section('title', 'Detalhes Cadastro')
@section('content')

<h3>Detalhes Cadastro - {{ $client->id }} </h3>
    <div class="form-group">
        <label>Nome:</label>
        <label> {{ $client->name }} </label>
    </div>
    <div class="form-group">
            <label>Matrícula:</label>
            <label> {{ $client->regist }} </label>
    </div>
    <div class="form-group">
        <label>Secretaria:</label>
        <label> {{ $client->secretary }} </label>
    </div>
    <div class="form-group">
        <label>Lotação:</label>
        <label> {{ $client->workplace }} </label>
    </div>

    <h3>Cadastro Dispositivos </h3>
<form action="{{action("ClientController@savedevice", $client->id) }}" method="POST">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="form-group">
        <label>Nome:</label>
        <input type="text" name="name" class="form-control" value="{{ old('name') }}">
    </div>
    <div class="form-group">
            <label>Tipo:</label>
            <input type="text" name="type" class="form-control"  value="{{ old('type') }}">
    </div>
    <div class="form-group">
        <label>Mac:</label>
        <input type="text" name="device" class="form-control"  value="{{ old('device') }}">
    </div>
        
    <button type="submit" class="btn btn-success">Cadastrar</button>
</form>
    <ul>
        <label>Dispositivo Associado:</label>
        @forelse ($client->devices as $device)
            <li>{{ $device->name }}</li>
        @empty
            <li>Nenhum dispositivo associado</li>
        @endforelse
    </ul>
    
    {{-- {{ <button type="submit" class="btn btn-success" href="{{ action("ClientController@assigndevice") }}">Associar dispositivo</button>}} --}}
@stop