@extends('layouts.app')

@section('content')
        @if (Session::has('message'))
            <div class="container">
                <div class="alert alert-info">{{ Session::get('message') }}</div>
            </div>
        @endif
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-9 col-md-10">
                    <div class="card">
                        <div class="card-header text-white bg-green">
                            Turmas
                            <a class="float-right text-light" href="{{ url('/turmas/create') }}">{{ __('Nova Turma') }}</a>
                        </div>

                        <div class="card-body">
                            <table class="table table-bordered table-hover table-responsive-md">
                                <thead class="text-center bg-green text-white">
                                    <tr>
                                        <th scope="col" class="align-middle" width="10%">#</th>
                                        <th scope="col" class="align-middle">Número</th>
                                        <th scope="col" class="align-middle">Curso</th>
                                        <th scope="col" class="align-middle">Período</th>
                                        <th scope="col" class="align-middle" width="30%">Ação</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($turmas as $turma)
                                    <tr class="text-center">
                                        <th scope="row">{{$turma->id}}</th>
                                            <td class="align-middle">
                                                <a class="link-table-green" href="{{ url('/turmas/' . $turma->id) }}">
                                                    {{$turma->numero}}
                                                </a>
                                            </td>
                                        <td class="align-middle">
                                            <?php
                                                $curso = DB::table('cursos')->find($turma->curso);
                                            ?>
                                            {{$curso->sigla}}
                                        </td>
                                        <td class="align-middle">
                                            {{$turma->periodo}}
                                        </td>
                                        <td class="align-middle">
                                            <div class="btn-group" role="group" aria-label="actions">
                                                <a href="{{ URL::to('turmas/' . $turma->id . '/edit') }}">
                                                    <button type="button" class="btn btn-warning">Editar</button>
                                                </a>&nbsp;
                                                <form action="{{url('turmas', [$turma->id])}}" method="POST">
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <input type="submit" class="btn btn-danger" value="Apagar"/>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                            {!! $turmas->links() !!}
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
