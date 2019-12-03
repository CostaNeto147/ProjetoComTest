@extends('layouts.app')
@section('content')
<div class="card-border">
    <div class="card-header">
        <h3 class="card-title"> Cadastro de Projeto</h3>
    </div>
    <div class="card-body">
        <form action="{{route('projetos.store')}}" method="post">
            @csrf
            <div class="form-group">
                <label for="nome">Nome: </label>
                <input type="text" name="titulo" id="nome" class="form-control">
            </div>
            <div class="form-group">
                <label for="desc">Descrição: </label>
                <textarea name="descricao" id="desc" cols="30" rows="10" class="form-control"></textarea>
            </div>
            <div class="form-group">
                <label for="dat">Data: </label>
                <input type="text" name="data" id="det" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary btn-sm">Salvar</button>

        <a href="{{route('projetos.index')}}" type="cancel" class="btn btn-success btn-sm">Voltar</a>

        </form>

    </div>
</div>

@endsection
