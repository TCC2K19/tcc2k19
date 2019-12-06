@extends('layouts.app')

@section('content')
    @if (Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-white bg-green">
                        Cursos
                        <a class="float-right text-light" href="{{ url('/cursos') }}">{{ __('Listagem de Cursos') }}</a>
                    </div>

                    <div class="card-body">
                        <h1>Adicionar Novo Curso</h1>
                        <hr>
                        <form action="{{ url('/cursos') }}" method="post">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="title">Sigla</label>
                                <input type="text" class="form-control" id="cursoSigla"  name="sigla">
                            </div>
                            <div class="form-group">
                                <label for="description">Nome</label>
                                <input type="text" class="form-control" id="cursoNome" name="nome">
                            </div>
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <button type="submit" class="btn btn-primary">Enviar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
