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
                        Editar <b>{{ $turma->numero }}</b>
                    </div>

                    <div class="card-body">
                    <form action="{{url('turmas', [$turma->id])}}" method="POST">
                        <input type="hidden" name="_method" value="PUT">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="numero">Numero</label>
                            <input type="text" value="{{$turma->numero}}" class="form-control" id="numero"  name="numero">
                        </div>
                        <div class="form-group">
                            <label for="numero">Curso</label>
                                <?php
                                    $cursos = DB::table('cursos')->get();
                                ?>
                                <select class="form-control" id="curso" name="curso">
                                    @foreach($cursos as $curso)
                                        <option value="{{$curso->id}}">{{$curso->nome}}</option>
                                    @endforeach
                                </select>
                        </div>
                        <div class="form-group">
                            <label for="nome">Periodo</label>
                            <input type="text" value="{{$turma->periodo}}" class="form-control" id="periodo" name="periodo">
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

                        <button type="submit" class="btn btn-primary">
                            Enviar
                        </button>
                        <a class="btn" href="{{ url('/turmas') }}">{{ __('Voltar') }}</a>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
