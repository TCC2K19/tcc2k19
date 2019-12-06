@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-green text-white">Alterar Senha</div>
                        <div class="card-body">
                            @if (session('error'))
                                <div class="alert alert-danger">
                                 {{ session('error') }}
                                </div>
                            @endif
                            @if (session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif
                                <form class="" method="POST" action="{{ route('changePassword') }}">
                                {{ csrf_field() }}
                                <div class="form-group row{{ $errors->has('current-password') ? ' has-error' : '' }}">
                                    <label for="new-password" class="col-md-4 control-label">Senha Atual</label>
                                    <div class="col-md-6">
                                        <input id="current-password" type="password" class="form-control" 
                                        name="current-password" required>
                                        @if ($errors->has('current-password'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('current-password') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row{{ $errors->has('new-password') ? ' has-error' : '' }}">
                                    <label for="new-password" class="col-md-4 control-label">Nova Senha</label>
                                    <div class="col-md-6">
                                        <input id="new-password" type="password" class="form-control" 
                                        name="new-password" required>

                                        @if ($errors->has('new-password'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('new-password') }}</strong>
                                            </span>
                                        @endif

                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="new-password-confirm" class="col-md-4 control-label">Confirme a Nova Senha</label>
                                    <div class="col-md-6">
                                        <input id="new-password-confirm" type="password" class="form-control" name="new-password_confirmation" required>
                                    </div>
                                </div>
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-green">Mudar Senha</button>
                                </div>        
                            </form>
                        </div>
                </div>
            </div>
        </div>
    </div>
@endsection
