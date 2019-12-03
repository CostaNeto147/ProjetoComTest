@extends('layouts.app')
@section('content')
<div class="card-border">
    <div class="card-border">
        <div class="card-header">
            <h3 class="card-title"> Projetos</h3>
            <a href="{{route('projetos.create')}}" class="btn btn-primary btn-sm float-right border-0 rounded-0 my-4">Novo Projeto</a>

        </div>

        <div class="card-body">
            <div class="card-table">
                <table class="table table-bordered text-center table-hover">
                    <thead>
                        <tr>
                            <th>Titulo</th>
                            <th>Data</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($projetos as $projeto)

                        <tr>

                            <td><a  href="{{route('projetos.edit', $projeto->id)}}">{{$projeto->titulo}}</a></td>
                            <td>{{$projeto->data}}</td>
                            <td>status</td>

                        </tr>
                        @endforeach

                    </tbody>

                </table>
            </div>
        </div>
    </div>
</div>

@endsection
