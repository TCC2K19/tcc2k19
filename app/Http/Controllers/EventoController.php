<?php

namespace App\Http\Controllers;

use App\Models\Disponibilizacao;
use App\Models\Evento;
use Illuminate\Http\Request;
use PDF;
use Illuminate\Support\Facades\DB;

class EventoController extends Controller
{
    public function index()
    {
        $eventos = DB::table('eventos')->paginate(10);;
        return view('eventos.index', compact('eventos', $eventos))
            ->with('i', (request()->input('page', 1) - 1) * 10);
    }

    public function create()
    {
        return view('eventos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required',
            'local' => 'required',
            'inicio' => 'required',
            'fim' => 'required',
            'data' => 'required',
            'responsavel' => 'required',
            'tipo_evento' => 'required',
            'vagas' => 'required',
            'publico_alvo' => 'required',
            'turmas' => 'required',
        ]);

        $evento = Evento::create([
            'nome' => $request->nome,
            'local' => $request->local,
            'inicio' => $request->inicio,
            'fim' => $request->fim,
            'data' => $request->data,
            'responsavel' => $request->responsavel,
            'tipo_evento' => $request->tipo_evento,
            'vagas' => $request->vagas,
            'publico_alvo' => $request->publico_alvo,
        ]);

        foreach ($request->turmas as $turma) {
            Disponibilizacao::create([
                'evento' => $evento->id,
                'turma' => $turma,
            ]);
        }

        return redirect('/eventos/'.$evento->id);
    }

    public function show(Evento $evento)
    {
        return view('eventos.show', compact('evento', $evento));
    }

    public function edit(Evento $evento)
    {
        return view('eventos.edit', compact('evento', $evento));
    }

    public function update(Request $request, Evento $evento)
    {
        $request->validate([
            'nome' => 'required',
            'local' => 'required',
            'inicio' => 'required',
            'fim' => 'required',
            'data' => 'required',
            'responsavel' => 'required',
            'tipo_evento' => 'required',
            'vagas' => 'required',
            'publico_alvo' => 'required',
            'turmas' => 'required',
        ]);

        /*$evento->nome = $request->nome;
        $evento->local = $request->local;
        $evento->inicio = $request->inicio;
        $evento->fim = $request->fim;
        $evento->data = $request->data;
        $evento->responsavel = $request->responsavel;
        $evento->tipo_evento = $request->tipo_evento;
        $evento->vagas = $request->vagas;
        $evento->publico_alvo = $request->publico_alvo;
        $evento->save();*/
        $evento->update($request->all());
        return redirect()->route('eventos.index')->with('message', 'Evento atualizada com sucesso!');
    }

    public function destroy(Request $request, Evento $evento)
    {
        $evento->delete();
        $request->session()->flash('message', 'Curso deletado com sucesso!');
        return redirect('eventos');
    }

    public function listagem($id)
    {
        $evento = Evento::find($id);
        /*$alunos = DB::select('SELECT users.matricula, users.name
                                                    FROM eventos
                                                    JOIN inscricoes ON eventos.id = inscricoes.evento
                                                    JOIN users ON inscricoes.usuario = users.id
                                                    WHERE eventos.id = ?', [$evento->id]);*/
        $alunos = DB::table('users')
                    ->select('users.matricula', 'users.name')
                    ->join('inscricoes', 'inscricoes.usuario', '=', 'users.id')
                    ->join('eventos', 'eventos.id', '=', 'inscricoes.evento')
                    ->where('eventos.id', '=', $id)
                    ->orderBy('users.name')
                    ->get();
        $pdf = PDF::loadView('eventos.listagem', ['evento' => $evento, 'alunos' => $alunos])->setPaper('a4', 'portrait');
        $fileName = 'Evento_'. $evento->id . '_Listagem';
        return $pdf->stream($fileName . '.pdf');
    }
}
