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
                        Exibição do Eventos {{ $evento->id }}
                        <a class="float-right text-light" href="{{ url('/eventos') }}">{{ __('Listagem de Eventos') }}</a>
                    </div>

                    <div class="card-body">
                        <div class="jumbotron text-center pt-4 pb-4 mb-2">
                            <p class="pb-0 mb-0">
                                <strong>Nome:</strong> {{ $evento->nome }} <br>
                                <strong>Local:</strong> {{ $evento->local }} <br/>
                                <strong>Início:</strong> {{ date('H:i', strtotime($evento->inicio)) }}<br/>
                                <strong>Fim:</strong> {{ date('H:i', strtotime($evento->fim)) }} <br/>
                                <strong>Data:</strong> {{ date('d/m/Y', strtotime($evento->data)) }}<br/>
                                <strong>Responsável:</strong> {{ $evento->responsavel }}<br/>
                                <strong>Tipo de Evento:</strong> {{ $evento->tipo_evento }}<br/>
                                <strong>Vagas:</strong> {{ $evento->vagas }}<br/>
                                <strong>Público-Alvo:</strong> {{ $evento->publico_alvo }}<br/>
                                <?php
                                    $turmas = DB::table('disponibilizacoes')
                                        ->join('turmas', 'disponibilizacoes.turma', '=', 'turmas.id')
                                        ->join('cursos', 'turmas.curso', '=', 'cursos.id')
                                        ->where('evento', '=', $evento->id)
                                        ->get();
                                    $i = 0;
                                ?>
                                <strong>Disponibilização:</strong>
                                <table class="table m-0 p-0">
                                    <tr>
                                        <td>
                                    @foreach($turmas as $turma)
                                        @if ((($i+1) % 5 == 1) && $i > 0)
                                            </td>
                                            <td>
                                        @endif
                                        <label for="turmas[{{$i}}]" class="form-check-label mr-1" style="font-family: 'Lucida Console', Monaco, monospace">{{$turma->sigla . ' ' . $turma->numero}}</label><br/>
                                        <?php $i++; ?>
                                    @endforeach
                                    </tr>
                                </table>
                            </p>
                            <a href="{{ url('/eventos/'. $evento->id . '/listagem') }}" class="btn btn-green">Listagem de Presença</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
