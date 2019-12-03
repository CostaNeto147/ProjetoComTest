@extends('layouts.app')
@section('content')
<div class="card-border">
    <div class="card-header">
        <h3 class="card-title"> Cadastro de Tarefa</h3>
    </div>
    <div class="card-body">
        <form action="{{route('task.store')}}" method="post">
            @csrf
            <div class="form-group">
                <label for="desc">Descrição: </label>
                <textarea name="descricao" id="desc" cols="30" rows="10" class="form-control"></textarea>
            </div>

            <button type="submit" class="btn btn-primary btn-sm">Salvar</button>

        <a href="{{route('task.index')}}" type="cancel" class="btn btn-success btn-sm">Voltar</a>

        </form>

    </div>
</div>

@endsection
