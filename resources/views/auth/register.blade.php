@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-green text-white">{{ __('Cadastro') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nome') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Senha') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirme a Senha') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <!--<div class="form-group row">
                            <label for="estudante_ifrj" class="col-md-4 col-form-label text-md-right">{{ __('Estudante no IFRJ') }}</label>

                            <div class="col-md-6 align-self-center">
                                <div class="form-check form-check-inline align-middle">
                                    <input class="form-check-input" type="radio" name="estudante_ifrj" id="estudante_ifrj_true" value="1">
                                    <label class="form-check-label" for="estudante_ifrj_true">
                                        Sim
                                    </label>
                                </div>
                                <div class="form-check form-check-inline inline-table align-middle">
                                    <input class="form-check-input" type="radio" name="estudante_ifrj" id="estudante_ifrj_false" value="0" checked>
                                    <label class="form-check-label" for="estudante_ifrj_false">
                                        Não
                                    </label>
                                </div>
                            </div>
                        </div>-->

                        <div class="form-group row">
                            <label for="matricula" class="col-md-4 col-form-label text-md-right">{{ __('Matrícula') }}</label>
                            <div class="col-md-6">
                                <input id="matricula" type="text" maxlength="14" class="form-control" name="matricula" autocomplete="nova-matricula" maxlength="14">

                                @error('matricula')
                                <span class="invalid-feedback" role="alert" style="display: block">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="turma" class="col-md-4 col-form-label text-md-right">{{ __('Turma') }}</label>

                            <div class="col-md-6">
                                <?php
                                    $turmas = DB::table('turmas')
                                                ->join('cursos', 'turmas.curso', '=', 'cursos.id')
                                                ->select('turmas.id', 'turmas.numero', 'cursos.sigla')
                                                ->orderBy('id')
                                                ->get();
                                ?>
                                <select class="form-control fonte-turma" id="turma" name="turma">
                                    @foreach($turmas as $turma)
                                        <option value="{{$turma->id}}">{{$turma->sigla . ' ' . $turma->numero}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <!--<div class="form-group row">
                            <label for="estudanteIFRJ" class="col-md-4 col-form-label text-md-right">{{ __('Estudante') }}</label>

                            <div class="col-md-6">
                                <input id="estudanteIFRJ" type="number" class="form-control @error('estudanteIFRJ') is-invalid @enderror" name="estudanteIFRJ" value="{{ old('estudanteIFRJ') }}" required autocomplete="estudanteIFRJ">

                                @error('estudanteIFRJ')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>-->

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-green">
                                    {{ __('Registrar') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
