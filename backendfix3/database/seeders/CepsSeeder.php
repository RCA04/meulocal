<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Ceps;

/**
 * Seeder para popular a tabela 'ceps' com dados de exemplo
 * 
 * Este seeder insere CEPs fictícios para testes e demonstração da API
 */
class CepsSeeder extends Seeder
{
    /**
     * Executa o seeder - insere dados de exemplo na tabela 'ceps'
     */
    public function run(): void
    {
        // CEP 1: Valparaíso - GO
        Ceps::create([
            'cep' => '12345678',           // CEP fictício
            'logradouro' => 'Rua 11',      // Nome da rua
            'complemento' => 'Quadra 11',  // Complemento do endereço
            'localidade' => 'Valparaíso',  // Cidade
            'bairro' => 'Esplanada V',     // Bairro
            'uf' => 'GO',                  // Unidade Federativa (Goiás)
            'estado' => 'Goías',           // Nome completo do estado
            'regiao' => 'Centro-Oeste'     // Região do Brasil
        ]);

        // CEP 2: Paraíso - DF
        Ceps::create([
            'cep' => '87654321',           // CEP fictício
            'logradouro' => 'Rua 12',      // Nome da rua
            'complemento' => 'Quadra 12',  // Complemento do endereço
            'localidade' => 'Paraíso',     // Cidade
            'bairro' => 'Esplanada VI',    // Bairro
            'uf' => 'DF',                  // Unidade Federativa (Distrito Federal)
            'estado' => 'Goías',           // Nome completo do estado
            'regiao' => 'Centro-Oeste'     // Região do Brasil
        ]);

        // CEP 3: Ralapenõ - DF
        Ceps::create([
            'cep' => '11223344',           // CEP fictício
            'logradouro' => 'Rua 13',      // Nome da rua
            'complemento' => 'Quadra 14',  // Complemento do endereço
            'localidade' => 'Ralapenõ',    // Cidade
            'bairro' => 'Esplanada VII',   // Bairro
            'uf' => 'DF',                  // Unidade Federativa (Distrito Federal)
            'estado' => 'Goías',           // Nome completo do estado
            'regiao' => 'Centro-Oeste'     // Região do Brasil
        ]);

        // CEP 4: Vale dos Riachos - GO
        Ceps::create([
            'cep' => '55667788',           // CEP fictício
            'logradouro' => 'Rua 14',      // Nome da rua
            'complemento' => 'Quadra 14',  // Complemento do endereço
            'localidade' => 'Vale dos Riachos', // Cidade
            'bairro' => 'Esplanada VIII',  // Bairro
            'uf' => 'GO',                  // Unidade Federativa (Goiás)
            'estado' => 'Goías',           // Nome completo do estado
            'regiao' => 'Centro-Oeste'     // Região do Brasil
        ]);

        // CEP 5: Ceu Azul - SP
        Ceps::create([
            'cep' => '12341234',           // CEP fictício
            'logradouro' => 'Rua 15',      // Nome da rua
            'complemento' => 'Quadra 15',  // Complemento do endereço
            'localidade' => 'Ceu Azul',    // Cidade
            'bairro' => 'Esplanada IX',    // Bairro
            'uf' => 'SP',                  // Unidade Federativa (São Paulo)
            'estado' => 'São Paulo',       // Nome completo do estado
            'regiao' => 'Sul'              // Região do Brasil
        ]);
    }
}
