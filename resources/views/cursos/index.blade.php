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
                            Cursos
                            <a class="float-right text-light" href="{{ url('/cursos/create') }}">{{ __('Novo Curso') }}</a>
                        </div>

                        <div class="card-body">
                            <table class="table table-bordered table-hover table-responsive-md">
                                <thead class="text-center bg-green text-white">
                                    <tr>
                                        <th scope="col" class="align-middle">#</th>
                                        <th scope="col" class="align-middle">Sigla</th>
                                        <th scope="col" class="align-middle">Nome</th>
                                        <th scope="col" class="align-middle">Ação</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($cursos as $curso)
                                    <tr class="text-center">
                                        <th scope="row">{{$curso->id}}</th>
                                        <td class="align-middle">
                                            <a class="link-table-green" href="{{ url('/cursos/' . $curso->id) }}">
                                                {{$curso->sigla}}
                                            </a>
                                        </td>
                                        <td class="align-middle">
                                            {{$curso->nome}}
                                        </td>
                                        <td class="align-middle">
                                            <div class="btn-group" role="group" aria-label="actions">
                                                <a href="{{ URL::to('cursos/' . $curso->id . '/edit') }}">
                                                    <button type="button" class="btn btn-warning">Editar</button>
                                                </a>&nbsp;
                                                <form action="{{url('cursos', [$curso->id])}}" method="POST">
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <input type="submit" class="btn btn-danger" value="Apagar"/>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
