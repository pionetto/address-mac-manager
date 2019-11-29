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
        <td>Dispositivo</td>
        <td>Matricula</td>
        <td>Secretaria</td>
        <td>Lotação</td>
        <td>Editar</td>
        <td>Apagar</td>
    </tr>
@foreach ($clients as $c)
    <tr>
        <td>{{ $c->id }}</td>
        <td>{{ $c->name }}</td>
        <td> 
            <ul>
            @foreach ($c->devices as $device)
                <li>{{ $device->name }}</li>
            @endforeach
            </ul>
        </td>
        <td>{{ $c->regist }}</td>
        <td>{{ $c->secretary }}</td>
        <td>{{ $c->workplace }}</td>
        <td><a class="btn btn-small btn-info" href="{{ action("ClientController@edit", $c->id) }}">Editar</a></td>
        <td><a class="btn btn-small btn-danger" href="#" onclick="deletar('{{ action("ClientController@delete", $c->id) }}');">Apagar</a></td>
    </tr>
@endforeach
</table>

<td><a class="btn btn-small btn-info" href="{{ action("ClientController@register") }}">Cadastro</a></td>

@stop