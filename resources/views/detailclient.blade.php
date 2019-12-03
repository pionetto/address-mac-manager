@extends('principal')
@section('title', 'Detalhes Cadastro')
@section('content')

<h3>Detalhes Cadastro - {{ $client->id }} </h3>
<form action="{{ action("ClientController@detailclient", $client->id) }}" method="GET">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" name="update" value="update">
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
    <ul>
        <label>Dispositivo Associado:</label>
        @forelse ($client->devices as $device)
            <li>{{ $device->name }}</li>
        @empty
            <li>Nenhum dispositivo associado</li>
        @endforelse
    </ul>
    {{-- <button type="submit" class="btn btn-success" href="{{ action("ClientController@assigndevice") }}">Associar dispositivo</button> --}}
</form>
@stop