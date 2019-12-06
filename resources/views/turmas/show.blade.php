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
                        Exibição da Turma {{ $turma->numero }}
                        <a class="float-right text-light" href="{{ url('/turmas') }}">{{ __('Listagem de Turmas') }}</a>
                    </div>

                    <div class="card-body">
                        <div class="jumbotron text-center">
                            <p>
                                <strong>Número:</strong> {{ $turma->numero }}<br>
                                <?php
                                    $curso = DB::table('cursos')->find($turma->curso);
                                ?>
                                <strong>Curso:</strong> {{ $curso->nome }}<br>
                                <strong>Periodo:</strong> {{ $turma->periodo }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
