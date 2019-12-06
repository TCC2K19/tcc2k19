<?php

namespace App\Http\Controllers;

use App\Models\Turma;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TurmaController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        $turmas = DB::table('turmas')->paginate(5);;
        return view('turmas.index', compact('turmas', $turmas))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        return view('turmas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'numero' => 'required',
            'curso' => 'required',
            'periodo' => 'required',
        ]);

        $turma = Turma::create([
            'numero' => $request->numero,
            'curso' => $request->curso,
            'periodo' => $request->periodo
        ]);
        return redirect('/turmas/'.$turma->id);
    }

    public function show(Turma $turma)
    {
        return view('turmas.show', compact('turma', $turma));
    }

    public function edit(Turma $turma)
    {
        return view('turmas.edit', compact('turma', $turma));
    }

    public function update(Request $request, Turma $turma)
    {
        $request->validate([
            'numero' => 'required',
            'curso' => 'required',
            'periodo' => 'required',
        ]);

        $turma->numero = $request->numero;
        $turma->curso = $request->curso;
        $turma->periodo = $request->periodo;
        $turma->save();
        $turma->update($request->all());
        return redirect()->route('turmas.index')->with('message', 'Turma atualizada com sucesso!');
    }

    public function destroy(Request $request, Turma $turma)
    {
        $turma->delete();
        $request->session()->flash('message', 'Turma deletada com sucesso!');
        return redirect('turmas');
    }
}
