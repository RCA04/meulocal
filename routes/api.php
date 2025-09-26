<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CepsController;

/**
 * Rotas da API
 * 
 * Este arquivo define as rotas disponíveis para a API REST
 */

// Rota para consulta de CEP
// GET /api/ceps/{cep} - Consulta endereço através do CEP
// Exemplo: GET /api/ceps/12345678 ou GET /api/ceps/12345-678
Route::get('/ceps/{cep}', [CepsController::class, 'index']);