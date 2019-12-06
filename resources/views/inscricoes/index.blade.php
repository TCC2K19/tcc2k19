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
                            Lista de Eventos
                        </div>
                        <?php
                            $eventos = DB::table('eventos')
                                            ->join('disponibilizacoes', 'disponibilizacoes.evento', '=', 'eventos.id')
                                            ->where('disponibilizacoes.turma', '=', Auth::user()->turma)
                                            ->orderBy('inicio')
                                            ->get();
                            $inscricoes = DB::select('select evento from inscricoes where usuario = ?', [Auth::user()->id]);
                            $inscricoes = array_column($inscricoes, 'evento');

                            $datas = $eventos->groupBy(function ($evento) {
                                return $evento->data;
                            });
                        ?>
                        <div class="card-body">
                            <form>
                                @csrf
                                <span id="result"></span>
                                @foreach ($datas as $data => $eventos)
                                    <h1>{{date('d/m/Y', strtotime($data))}}</h1>
                                    <table class="table table-bordered table-hover  table-responsive-sm  table-responsive-md">
                                        <thead class="text-center bg-green text-white">
                                            <tr>
                                                <th scope="col" class="align-middle" style="width: 10%">Horário</th>
                                                <th scope="col" class="align-middle" style="width: 35%">Nome</th>
                                                <th scope="col" class="align-middle" style="width: 15%">Local</th>
                                                <th scope="col" class="align-middle" style="width: 15%">Responsável</th>
                                                <th scope="col" class="align-middle" style="width: 10%">Público-Alvo</th>
                                                <th scope="col" class="align-middle" style="width: 5%">Vagas Preenchidas</th>
                                                <th scope="col" class="align-middle" style="width: 10%">Ação</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($eventos as $evento)
                                                @if ($evento->data == $data)
                                                <tr>
                                                    <td class="align-middle">
                                                        {{date('H:i', strtotime($evento->inicio)) . ' às ' . date('H:i', strtotime($evento->fim))}}
                                                    </td>
                                                    <td class="id" style="display: none;">{{$evento->id}}</div>
                                                    <td class="turma" style="display: none;">{{$evento->turma}}</div>
                                                    <td class="align-middle">
                                                        {{$evento->nome}}
                                                    </td>

                                                    <td class="align-middle">
                                                        {{$evento->local}}
                                                    </td>
                                                    <td class="align-middle">
                                                        {{$evento->responsavel}}
                                                    </td>
                                                    <td class="align-middle">
                                                        {{$evento->publico_alvo}}
                                                    </td>
                                                    <td class="align-middle vagas">
                                                        {{$evento->vagasPreenchidas . '/' .$evento->vagas}}
                                                    </td>
                                                    <td class="text-center align-middle">
                                                        @if (in_array($evento->id, $inscricoes))
                                                            <button type="submit" id="send_form" class="btn btn-danger btn-submit">Cancelar</button>
                                                        @else
                                                            @if($evento->vagas == $evento->vagasPreenchidas)
                                                                <button type="submit" id="send_form" class="btn bg=secondary" disabled="true">Lotado</button>
                                                            @else
                                                                <button type="submit" id="send_form" class="btn btn-success btn-submit">Inscrever</button>
                                                            @endif
                                                        @endif
                                                    </td>
                                                </tr>
                                                @endif
                                            @endforeach
                                        </tbody>
                                    </table>
                                @endforeach
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script type="text/javascript">
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $(".btn-submit").click(function(e){
                var btn = $(this);
                e.preventDefault();
                var path = window.location.href;
                var usuario = {{Auth::user()->id}};
                var evento = $(this).parent().parent().children(".id").text();
                var usr_turma = {{Auth::user()->turma}};
                var evt_turma = $(this).parent().parent().children(".turma").text();

                console.log('Usuario: ' + usuario + '\nEvento: ' + evento + '\nUsuario_Turma: ' + usr_turma + '\nEvento_Turma: ' + evt_turma);

                if($(this).hasClass('btn-success')) {
                    $.ajax({
                        type:'POST',
                        url: path,
                        data:{usuario:usuario, evento:evento, usr_turma:usr_turma, evt_turma:evt_turma},
                        success:function(data){
                            if(data.message === '1') {
                                alert('Desculpe, este evento está lotado!');
                                window.location.reload();
                            }
                            else if(data.message === '2') {
                                alert('Você já está inscrito em um evento nesse horário!')
                            }
                            else {
                                btn.removeClass('btn-success');
                                btn.addClass('btn-danger');
                                btn.html('Cancelar');
                                var vagas = btn.parent().parent().children('.vagas');
                                var numeroVagas = vagas.text();
                                numeroVagas = numeroVagas.replace(/\/.*/, '') * 1 + 1;
                                vagas.html(vagas.text().replace(/(.*)\//, numeroVagas+'/'));
                                //alert(data.message);
                            }
                        }
                    });
                }
                else if(btn.hasClass('btn-danger')) {
                    var token = $('meta[name="csrf-token"]').attr('content');
                    $.ajax({
                        type:'DELETE',
                        url:path+'/'+evento+'/'+usuario,
                        data:{
                            evento:evento,
                            usuario:usuario,
                            "_token": token
                        },
                            success:function(data){
                                btn.removeClass('btn-danger');
                                btn.addClass('btn-success');
                                btn.html('Inscrever');
                                var vagas = btn.parent().parent().children('.vagas');
                                var numeroVagas = vagas.text();
                                numeroVagas = numeroVagas.replace(/\/.*/, '') * 1 - 1;
                                vagas.html(vagas.text().replace(/(.*)\//, numeroVagas+'/'));
                                //alert(data.message);
                            }
                    });
                }
            });
        </script>
@endsection
