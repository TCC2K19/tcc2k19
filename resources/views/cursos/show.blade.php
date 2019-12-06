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
                        Exibição do Curso {{ $curso->sigla }}
                        <a class="float-right text-light" href="{{ url('/cursos') }}">{{ __('Listagem de Cursos') }}</a>
                    </div>

                    <div class="card-body">
                        <div class="jumbotron text-center">
                            <p>
                                <strong>Sigla:</strong> {{ $curso->sigla }}<br>
                                <strong>Nome:</strong> {{ $curso->nome }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
