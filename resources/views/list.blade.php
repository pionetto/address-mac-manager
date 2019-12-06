@extends('principal')
@section('title', 'Listagem de Clientes')
@section('content')

<script type="text/javascript">
    function deletar(url) {
        if (window.confirm('Deseja realmente apagar?')){
            window.location = url;
        }
    }
</script>

<h3>Lista de Clientes e Address Mac's</h3>

@if(old('insert'))
    <div class="alert alert-success">
        <strong>Sucesso</strong>
            {{ old('descricao')}} cadastrado!
    </div>
@endif

@if(old('update'))
    <div class="alert alert-success">
        <strong>Sucesso</strong>
            {{ old('descricao')}} alterado!
    </div>
@endif

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
        <td><a class="btn btn-small btn-info" href="{{ action("ClientController@edit", $client->id) }}">Editar</a></td>
        <td><a class="btn btn-small btn-danger" href="#" onclick="deletar('{{ action("ClientController@delete", $client->id) }}');">Apagar</a></td>
        <td><a class="btn btn-secondary href=" href="{{ action("ClientController@detailclient", $client->id) }}">Ver</a></td>
    </tr>
@endforeach
</table>

<td><a class="btn btn-small btn-info" href="{{ action("ClientController@register") }}">Cadastro</a></td>

@stop