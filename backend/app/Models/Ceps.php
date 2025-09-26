<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Model para gerenciar dados de CEPs
 * 
 * Este model representa a tabela 'ceps' no banco de dados
 * e contém informações sobre endereços brasileiros
 */
class Ceps extends Model
{
    /**
     * Desabilita timestamps automáticos (created_at, updated_at)
     * pois não precisamos rastrear quando os CEPs foram criados/modificados
     */
    public $timestamps = false;

    /**
     * Campos que podem ser preenchidos em massa (mass assignment)
     * Define quais campos podem ser inseridos/atualizados via create() ou fill()
     */
    protected $fillable = [
        'cep',           // Código do CEP (apenas números)
        'logradouro',    // Nome da rua/avenida
        'complemento',   // Complemento do endereço (ex: "Quadra 11")
        'localidade',    // Cidade
        'bairro',        // Bairro (ex: "Centro", "Vila Nova")
        'uf',           // Unidade Federativa (sigla: GO, SP, etc.)
        'estado',       // Nome completo do estado
        'regiao'        // Região do Brasil (Centro-Oeste, Sul, etc.)
    ];
}
