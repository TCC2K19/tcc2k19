@extends('layouts.app')

@section('content')
        @if (Session::has('message'))
            <div class="container">
                <div class="alert alert-info">{{ Session::get('message') }}</div>
            </div>
        @endif
        <div class="container-fluid m-0">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header text-white bg-green">
                            Eventos
                            <a class="float-right text-light" href="{{ url('/eventos/create') }}">{{ __('Novo Evento') }}</a>
                        </div>

                        <div class="card-body">
                            <table class="table table-bordered table-hover table-responsive-md">
                                <thead class="text-center bg-green text-white">
                                    <tr>
                                        <th scope="col" class="align-middle" width="5%">#</th>
                                        <th scope="col" class="align-middle">Nome</th>
                                        <th scope="col" class="align-middle">Local</th>
                                        <th scope="col" class="align-middle" width="10%ph">Horário</th>
                                        <th scope="col" class="align-middle">Data</th>
                                        <th scope="col" class="align-middle">Responsável</th>
                                        <th scope="col" class="align-middle" width="12%">Tipo de Evento</th>
                                        <th scope="col" class="align-middle">Vagas</th>
                                        <th scope="col" class="align-middle" width="5%">Ação</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($eventos as $evento)
                                    <tr class="text-center">
                                        <th scope="row">{{$evento->id}}</th>
                                            <td class="align-middle">
                                                <a class="link-table-green" href="{{ url('/eventos/' . $evento->id) }}">
                                                    {{$evento->nome}}
                                                </a>
                                            </td>
                                        <td class="align-middle">
                                            {{$evento->local}}
                                        </td>
                                        <td class="align-middle">
                                            {{date('H:i', strtotime($evento->inicio)) . ' às ' . date('H:i', strtotime($evento->fim))}}
                                        </td>
                                        <td class="align-middle">
                                            {{date('d/m/Y', strtotime($evento->data))}}
                                        </td>
                                        <td class="align-middle">
                                            {{$evento->responsavel}}
                                        </td>
                                        <td class="align-middle">
                                            {{$evento->tipo_evento}}
                                        </td>
                                        <td class="align-middle">
                                            {{$evento->vagasPreenchidas . '/' .$evento->vagas}}
                                        </td>
                                        <td class="align-middle">
                                            <div class="btn-group" role="group" aria-label="actions">
                                                <a href="{{ URL::to('eventos/' . $evento->id . '/edit') }}">
                                                    <button type="button" class="btn btn-warning">Editar</button>
                                                </a>&nbsp;
                                                <form action="{{url('eventos', [$evento->id])}}" method="POST">
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <input type="submit" class="btn btn-danger" value="Apagar"/>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                            {!! $eventos->links() !!}
                            <style>
                                ul.pagination {
                                    justify-content: center !important;
                                }
                            </style>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
