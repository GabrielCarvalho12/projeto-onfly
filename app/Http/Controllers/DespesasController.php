<?php

namespace App\Http\Controllers;

use App\Http\Requests\DespesasRequest;
use Illuminate\Http\Request;
use App\Models\Despesas;
use App\Models\User;
use App\Http\Resources\DespesasResource;
use App\Http\Resources\DespesasResourceCollection;
use App\Http\Resources\UserResource;

class DespesasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = User::where('email', $request->header('email'))->first();
        $user = new UserResource($user);

        $despesa = Despesas::where('usuario', $user->id)->get();

        $this->authorize('verDespesa', $despesa->first());

        $despesa = new DespesasResourceCollection($despesa);

        return response()->json([
            "data" => $despesa
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DespesasRequest $request)
    {
        $despesa = Despesas::create([
            'descricao' => $request->descricao,
            'data' => $request->data,
            'usuario' => $request->usuario,
            'valor' => $request->valor,
        ]);

        $dados = new DespesasResource($despesa);

        return response()->json([
            "message" => "Despesa Inserida",
            "data" => $dados
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->authorize('verDespesa', Despesas::find($id));

        $despesa = Despesas::where('id', $id)
            ->get();

        return response()->json([
            "data" => $despesa
        ], 201);
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
        $this->authorize('verDespesa', Despesas::find($id));

        $despesa = Despesas::find($id);

        $despesa->descricao = $request->descricao;
        $despesa->data = $request->data;
        $despesa->valor = $request->valor;

        $despesa->save();

        return response()->json([
            "message" => "Despesa Atualizada"
        ], 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $despesa = Despesas::find($id);

        $this->authorize('verDespesa', $despesa);

        $despesa->delete();

        return response()->json([
            "message" => "Despesa Excluída"
        ], 201);
    }
}
