<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div>
        <!--<style>
            .page-break {
                page-break-after: always;
            }
        </style>
        <h1>Page 1</h1>
        <div class="page-break"></div>
        <h1>Page 2</h1>-->
        <table style="width: 100%">
            <tr>
                <td colspan="4" style="text-align: center;">
                    <h4 style="font: Arial, sans-serif;"><b>{{ $evento->nome }}<b></h4>
                </td>
            </tr>
            <tr>
                <td>
                    <strong>Local:</strong> {{ $evento->local }}
                </td>
                <td>
                    <strong>Início:</strong> {{ date('H:i', strtotime($evento->inicio)) }}
                </td>
                <td>
                    <strong>Fim:</strong> {{ date('H:i', strtotime($evento->fim)) }}
                </td>
                <td>
                    <strong>Data:</strong> {{ date('d/m/Y', strtotime($evento->data)) }}
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <strong>Responsável:</strong> {{ $evento->responsavel }}
                </td>
                <td colspan="2">
                    <strong>Tipo de Evento:</strong> {{ $evento->tipo_evento }}
                </td>
            </tr>
            <tr>
                <td>
                    <strong colspan="1">Vagas:</strong> {{ $evento->vagas }}
                </td>
                <td>
                    <strong colspan="3">Público-Alvo:</strong> {{ $evento->publico_alvo }}
                </td>
            </tr>
        </table>
        <br/>
        <style>
            table, th, tr, td {
                border: 1px solid #000;
            }
        </style>
        <table width="100%">
            <thead>
                <tr>
                    <th style="width: 5%; text-align: center;">#</th>
                    <th style="width: 10%">Matrícula</th>
                    <th style="width: 48%">Nome</th>
                    <th style="width: 37%">Assinatura</th>
                </tr>
            </thead>

            <tbody>
                <?php $i=0; ?>
                @foreach ($alunos as $aluno)
                    <?php $i++ ?>
                    <tr>
                    <td style="text-align: center;">{{$i}}</td>
                        <td>{{ $aluno->matricula }}</td>
                        <td>{{ $aluno->name }}</td>
                        <td></td>
                    </tr>
                @endforeach

                @for ($i; $i < $evento->vagas; $i++)
                    <tr>
                        <td style="text-align: center;">{{($i+1)}}</td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                @endfor
            </tbody>
        </table>
    </div>
</body>
</html>
