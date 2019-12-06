<?php

namespace App\Http\Controllers;

use App\Models\Inscricao;
use App\Models\Evento;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class InscricaoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('inscricoes.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'usuario' => 'required',
            'evento' => 'required',
            'usr_turma' => 'required',
            'evt_turma' => 'required'
        ]);
        $data = $request->all();

        $evento = Evento::find($request->evento);

        $evt_ins = DB::table('inscricoes')
            ->join('eventos', 'inscricoes.evento', '=', 'eventos.id')
            ->where('inscricoes.usuario', '=', $request->usuario)
            ->get();

        if($evento->vagas < $evento->vagasPreenchidas+1){
            return response()->json(['message'=>'1']);
        }

        foreach ($evt_ins as $e_i) {
            if(!(($e_i->fim <= $evento->inicio) || ($e_i->inicio >= $evento->fim)) && ($e_i->data == $evento->data)){
                return response()->json(['message'=>'2']);
            }
        }

        Inscricao::insert($data);


        $evento->vagasPreenchidas++;
        $evento->save();

        return response()->json(['message'=>'Inscrição realizada com sucesso!']);
    }

    public function destroy(Request $request) {
        Inscricao::where('evento', $request->evento)->where('usuario', $request->usuario)->delete();

        $evento = Evento::find($request->evento);
        $evento->vagasPreenchidas--;
        $evento->save();

        return response()->json(['message'=>'Inscrição cancelada com sucesso!']);
    }

    /*public function create()
    {
        //
    }

    public function show(Inscricao $inscricao)
    {
        //
    }

    public function edit(Inscricao $inscricao)
    {
        //
    }

    public function update(Request $request, Inscricao $inscricao)
    {
        //
    }
    */
}
