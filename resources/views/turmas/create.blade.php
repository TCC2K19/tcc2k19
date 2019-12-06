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
                        <a class="float-right text-light" href="{{ url('/turmas') }}">{{ __('Listagem de Turmas') }}</a>
                    </div>

                    <div class="card-body">
                        <h1>Adicionar Nova Turma</h1>
                        <hr>
                        <form action="{{ url('/turmas') }}" method="post">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="numero">Numero</label>
                                <input type="number" value="{{old('numero')}}" class="form-control" id="numero"  name="numero">
                            </div>
                            <div class="form-group">
                                <label for="numero">Curso</label>
                                <?php
                                    $cursos = DB::table('cursos')->get();
                                ?>
                                <select class="form-control" id="curso" name="curso">
                                    <option value="null">Selecione um curso</option>
                                    @foreach($cursos as $curso)
                                        <option @if(old('curso')==$curso->id) {{'selected="selected"'}} @endif value="{{$curso->id}}">{{$curso->nome}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="periodo">Periodo</label>
                                <input type="text" value="{{old('periodo')}}" class="form-control" id="periodo" name="periodo">
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
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
