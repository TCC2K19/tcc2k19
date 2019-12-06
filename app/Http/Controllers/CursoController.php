<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use Illuminate\Http\Request;

class CursoController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        $cursos = Curso::all();
        return view('cursos.index', compact('cursos', $cursos));
    }

    public function create()
    {
        return view('cursos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'sigla' => 'required',
            'nome' => 'required|min:3',
        ]);

        $curso = Curso::create([
            'sigla' => $request->sigla,
            'nome' => $request->nome,
        ]);

        return redirect('/cursos/'.$curso->id);
    }

    public function show(Curso $curso)
    {
        return view('cursos.show', compact('curso', $curso));
    }

    public function edit(Curso $curso)
    {
        return view('cursos.edit', compact('curso', $curso));
    }

    public function update(Request $request, Curso $curso)
    {
        $request->validate([
            'sigla' => 'required',
            'nome' => 'required|min:3',
        ]);

        $curso->sigla = $request->sigla;
        $curso->nome = $request->nome;
        $curso->save();
        $curso->update($request->all());
        return redirect()->route('cursos.index')->with('message','Curso atualizado com sucesso!');
        //$request->session()->flash('message', 'Curso modificado com sucesso!');
        //return redirect('cursos');
    }

    public function destroy(Request $request, Curso $curso)
    {
        $curso->delete();
        $request->session()->flash('message', 'Curso deletado com sucesso!');
        return redirect('cursos');
    }
}
