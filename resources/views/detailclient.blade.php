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
<form action="{{action("DeviceController@store") }}" method="POST">
    <input type="hidden" name="client_id" value="{{ $client->id }}">
    @csrf
    <div class='row'>
        <div class="form-group col-3" >
        <label>Nome:</label>
        <input type="text" name="name" class="form-control" value="{{ old('name') }}">
    </div>
    <div class="form-group col-3" >
        <label>Tipo:</label>
        <input type="text" name="type" class="form-control"  value="{{ old('type') }}">
    </div>
    <div class="form-group col-3" >
        <label>Mac:</label>
        <input type="text" name="device" class="form-control"  value="{{ old('device') }}">    
    </div>
    <button type="submit" class="btn btn-success col-3" >Cadastrar</button>
    </div>
    
    
</form>
    {{-- <ul>
        <label>Dispositivo Associado:</label>
        @forelse ($client->devices as $device)
            <li>{{ $device->name }}</li>
        @empty
            <li>Nenhum dispositivo associado</li>
        @endforelse
    </ul> --}}

    <script type="text/javascript">
        function deletar(url) {
            if (window.confirm('Deseja realmente apagar?')){
                window.location = url;
            }
        }
    </script>
    
    <h3>Dispositivos Associados</h3>
      
    <table width="100%" class="table table-striped table-bordered table-hover">
        <tr>
            <td>ID</td>
            <td>Nome</td>
            <td>Tipo</td>
            <td>Endereço MAC</td>
            <td>Status</td>
            <td>Editar</td>
            <td>Apagar</td>
        </tr>
    @foreach ($client->devices as $device)
        <tr>
            <td>{{ $device->id }}</td>
            <td>{{ $device->name }}</td>
            <td>{{ $device->type }}</td>
            <td>{{ $device->device }}</td>
            <td>{{ $device->enable ? 'Ativo':'Inativo' }}</td>
            <td><a class="btn btn-small btn-info" href="{{ action("DeviceController@edit", $device->id) }}">Editar</a></td>
            <td>
                <form action="{{ action("DeviceController@destroy", $device->id) }}" method="POST">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-small btn-danger">Apagar</button>
                </form>
            </td>
        </tr>
    @endforeach
    </table>
@stop