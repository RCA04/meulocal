<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Migration para adicionar campo 'bairro' na tabela 'ceps'
 * 
 * Esta migration adiciona o campo 'bairro' à tabela existente 'ceps'
 * para armazenar informações sobre o bairro do endereço
 */
return new class extends Migration {
    /**
     * Executa a migration - adiciona o campo 'bairro'
     */
    public function up(): void
    {
        Schema::table('ceps', function (Blueprint $table) {
            // Adiciona campo bairro (pode ser nulo para CEPs antigos)
            $table->string('bairro')->nullable();
        });
    }

    /**
     * Reverte a migration - remove o campo 'bairro'
     */
    public function down(): void
    {
        Schema::table('ceps', function (Blueprint $table) {
            // Remove o campo bairro da tabela
            $table->dropColumn('bairro');
        });
    }
};
