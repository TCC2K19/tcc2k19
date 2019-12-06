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
                        Eventos
                        <a class="float-right text-light" href="{{ url('/eventos') }}">{{ __('Listagem de Eventos') }}</a>
                    </div>

                    <div class="card-body">
                        <h1>Adicionar Novo Evento</h1>
                        <hr>
                        <form action="{{ url('/eventos') }}" method="post">
                            {{ csrf_field() }}
                            <div class="form-row">
                                <div class="form-group col-12">
                                    <label for="nome">Nome</label>
                                    <input type="text" value="{{old('nome')}}"class="form-control" id="nome"  name="nome">
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-6">
                                    <label for="local">Local</label>
                                    <input type="text" value="{{old('local')}}" class="form-control" id="local"  name="local">
                                </div>

                                <div class="form-group col-3">
                                    <label for="inicio">Início</label>
                                    <input type="time" value="{{old('inicio')}}" class="form-control" id="inicio"  name="inicio">
                                </div>

                                <div class="form-group col-3">
                                    <label for="fim">Término</label>
                                    <input type="time" value="{{old('fim')}}" class="form-control" id="fim"  name="fim">
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-4">
                                    <label for="data">Data</label>
                                    <input type="date" value="{{old('data')}}" class="form-control" id="data"  name="data">
                                </div>

                                <div class="form-group col-8">
                                    <label for="responsavel">Responsável</label>
                                    <input type="text" value="{{old('responsavel')}}" class="form-control" id="responsavel"
                                    name="responsavel">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-4">
                                    <label for="tipo_evento">Tipo de Evento</label>
                                    <input type="text" value="{{old('tipo_evento')}}" class="form-control" id="tipo_evento"
                                    name="tipo_evento">
                                </div>

                                <div class="form-group col-2">
                                    <label for="vagas">Vagas</label>
                                    <input type="number" value="{{old('vagas')}}" class="form-control" id="vagas"
                                    name="vagas">
                                </div>

                                <div class="form-group col-6">
                                    <label for="publico_alvo">Público-Alvo</label>
                                    <input type="text" value="{{old('publico_alvo')}}" class="form-control" id="publico_alvo"
                                    name="publico_alvo">
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Disponibilizações</label><br/>
                                <?php
                                    $turmas = DB::table('turmas')
                                                ->join('cursos', 'turmas.curso', '=', 'cursos.id')
                                                ->select('turmas.id', 'turmas.numero', 'cursos.sigla')
                                                ->orderBy('id')
                                                ->get();
                                    $i = 0;
                                ?>
                                <table class="table text-center">
                                    <tr>
                                        <td>
                                    @foreach($turmas as $turma)
                                        @if ((($i+1) % 5 == 1) && $i > 0)
                                            </td>
                                            <td>
                                        @endif
                                        <input type="checkbox" {{ (is_array(old('turmas')) and in_array(($i+1), old('turmas'))) ? ' checked' : '' }} id="turmas[{{$i}}]" name="turmas[]" value="{{$turma->id}}" class="form-check-input">
                                        <label for="turmas[{{$i}}]" class="form-check-label mr-1" style="font-family: 'Lucida Console', Monaco, monospace">{{$turma->sigla . ' ' . $turma->numero}}</label><br/>
                                        <?php $i++; ?>
                                    @endforeach
                                    </tr>
                                </table>
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
                            <button type="submit" class="btn btn-green">Enviar</button>
                            <a class="btn btn-link" href="{{ url('/eventos') }}">{{ __('Voltar') }}</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
