@extends('layouts.principal')
{{-- @section('title', 'Listagem de Clientes') --}}
@section('content')

<script type="text/javascript">
    function deletar(url) {
        if (window.confirm('Deseja realmente apagar?')){
            window.location = url;
        }
    }
</script>

<h3>Lista de Clientes e Address Mac's</h3>

@component('components.alert', ['state'=>'success', 'title'=>'Sucesso'])
    Qualquer texto aqui dentro
@endcomponent

<table width="100%" class="table table-striped table-bordered table-hover">
    <tr>
        <td>ID</td>
        <td>Nome</td>
        <td>Matricula</td>
        <td>Editar</td>
        <td>Apagar</td>
        <td>Ver</td>

    </tr>
@foreach ($clients as $client)
    <tr>
        <td>{{ $client->id }}</td>
        <td>{{ $client->name }}</td>
        <td>{{ $client->regist }}</td>
        <td><a class="btn btn-small btn-info" href="{{ route('client.edit', $client->id) }}">Editar</a></td>
        <td>
            <form  action="{{ route('client.destroy', $client->id) }}" method="POST">
                @method('DELETE')
                @csrf
                <button type="submit" class="btn btn-small btn-danger">Apagar</button>
            </form>
        </td>
        <td><a class="btn btn-secondary href=" href="{{ route('client.show', $client->id) }}">Ver</a></td>
    </tr>
@endforeach
</table>

<td><a class="btn btn-small btn-info" href="{{ route('client.create') }}">Cadastro</a></td>

@stop