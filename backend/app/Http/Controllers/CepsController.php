<?php

namespace App\Http\Controllers;

use App\Models\Ceps;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/**
 * Controller para gerenciar consultas de CEPs
 * 
 * Este controller implementa a lógica de negócio para consulta
 * de endereços através de CEPs
 */
class CepsController extends Controller
{
    /**
     * Consulta endereço através do CEP
     * 
     * @param string $cep CEP a ser consultado (aceita formatação)
     * @return \Illuminate\Http\JsonResponse
     */
    public function index($cep)
    {
        // Remove todos os caracteres não numéricos do CEP
        // Exemplo: "123.456-78" vira "12345678"
        $cepLimpo = preg_replace('/\D/', '', $cep);

        // Busca o endereço no banco de dados usando o CEP limpo
        $endereco = Ceps::where('cep', $cepLimpo)->first();

        // Se não encontrar o CEP, retorna erro 404
        if (!$endereco) {
            return response()->json(['erro' => true], 404);
        }

        // Retorna os dados do endereço em formato JSON
        return response()->json($endereco);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Ceps $ceps)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ceps $ceps)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ceps $ceps)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ceps $ceps)
    {
        //
    }
}
