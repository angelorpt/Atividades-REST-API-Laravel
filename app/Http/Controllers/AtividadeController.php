<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Atividade;

class AtividadeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dados = Atividade::all();
        return $dados;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        // Pega os dados do Json
        $data = $request->json()->all();

        // Cria um novo objeto Atividade
        $atividade = new Atividade;
        
        $atividade = $this->salvar($atividade, $data);

        // Retorna o Objeto
        return response()->json($atividade, 201);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $atividade = Atividade::find($id);

        if(!$atividade) {
            return response()->json([
                'message'   => 'Atividade não encontrada',
            ], 404);
        }
                
        return $atividade;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Cria um novo objeto Atividade
        $atividade = Atividade::find($id);

        if(!$atividade) {
            return response()->json([
                'message'   => 'Atividade não encontrada',
            ], 404);
        }        

        // Retorna o Objeto
        return $atividade;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Pega os dados do Json
        $data = $request->json()->all();

        // Cria um novo objeto Atividade
        $atividade = Atividade::find($id);

        if(!$atividade) {
            return response()->json([
                'message'   => 'Atividade não encontrada',
            ], 404);
        }

        $atividade = $this->salvar($atividade, $data);

        // Retorna o Objeto
        return response()->json($atividade, 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $atividade = Atividade::find($id);

        if(!$atividade) {
            return response()->json([
                'message'   => 'Atividade não encontrada',
            ], 404);
        }        
        
        Atividade::destroy($id);
        
        return $atividade;
    }

    private function salvar(Atividade $atividade, $dados)
    {
        $atividade->atividade      = $dados['atividade'];
        $atividade->responsavel_id = $dados['responsavel_id'];
        $atividade->status_id      = $dados['status_id'];
        $atividade->deadline       = $dados['deadline'];

        $atividade->save();

        return $atividade;
    }

}
