@extends('layouts.app')
@section('content')
<div class="card-border">
    <div class="card-header">
        <h3 class="card-title"> Cadastro de Projeto</h3>
    </div>
    <div class="card-body">


            <div class="form-group">
                <label for="nome">Nome: </label>
                <input type="text" name="titulo" id="nome" value="{{$projeto->titulo}}" class="form-control">
            </div>
            <div class="form-group">
                <label for="desc">Descrição: </label>
                <textarea name="descricao" id="desc" cols="30" rows="10" class="form-control">{{$projeto->descricao}}</textarea>
            </div>
            <div class="form-group">
                <label for="dat">Data: </label>
                <input type="text" name="data" id="det" value="{{$projeto->data}}" class="form-control">
            </div>

            <a href="{{route('tasks.create')}}" class="btn btn-primary btn-sm">Adicionar Tarefa</a>
            <a href="{{route('projetos.index')}}" type="cancel" class="btn btn-success btn-sm">Voltar</a>



    </div>
</div>

@endsection
