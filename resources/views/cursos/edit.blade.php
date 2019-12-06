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
                        Editar <b>{{ $curso->nome }}</b>
                    </div>

                    <div class="card-body">
                    <form action="{{url('cursos', [$curso->id])}}" method="POST">
                        <input type="hidden" name="_method" value="PUT">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="sigla">Sigla</label>
                            <input type="text" value="{{$curso->sigla}}" class="form-control" id="cursoSigla"  name="sigla">
                        </div>
                        <div class="form-group">
                            <label for="nome">Nome</label>
                            <input type="text" value="{{$curso->nome}}" class="form-control" id="cursoNome" name="nome">
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

                        <button type="submit" class="btn btn-green">
                            Enviar
                        </button>
                        <a class="btn" href="{{ url('/cursos') }}">{{ __('Voltar') }}</a>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
