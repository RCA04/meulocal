<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Migration para criar a tabela de CEPs
 * 
 * Esta migration cria a estrutura da tabela 'ceps' que armazenará
 * informações sobre endereços brasileiros
 */
return new class extends Migration {
    /**
     * Executa a migration - cria a tabela 'ceps'
     */
    public function up(): void
    {
        Schema::create('ceps', function (Blueprint $table) {
            // Chave primária auto-incremento
            $table->id();
            
            // CEP (apenas números, ex: "12345678")
            $table->string('cep');
            
            // Nome da rua/avenida (ex: "Rua das Flores")
            $table->string('logradouro');
            
            // Complemento do endereço (ex: "Quadra 11", "Lote 5")
            $table->string('complemento');
            
            // Cidade (ex: "São Paulo", "Rio de Janeiro")
            $table->string('localidade');
            
            // Unidade Federativa - sigla (ex: "SP", "RJ", "GO")
            $table->string('uf');
            
            // Nome completo do estado (ex: "São Paulo", "Goiás")
            $table->string('estado');
            
            // Região do Brasil (ex: "Sudeste", "Centro-Oeste")
            $table->string('regiao');
        });
    }

    /**
     * Reverte a migration - remove a tabela 'ceps'
     */
    public function down(): void
    {
        Schema::dropIfExists('ceps');
    }
};
