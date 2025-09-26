
# API de Consulta de CEPs

Uma API REST simples desenvolvida em Laravel para consulta de endereços através de CEPs.

## 📋 Descrição

Esta API permite consultar informações de endereços brasileiros através do CEP (Código de Endereçamento Postal). O sistema armazena dados de CEPs em um banco de dados local e fornece uma interface REST para consultas.

## 🚀 Funcionalidades

- ✅ Consulta de endereços por CEP
- ✅ Validação e limpeza de CEPs (remove caracteres especiais)
- ✅ Retorno de dados estruturados em JSON
- ✅ Tratamento de erros (CEP não encontrado)
- ✅ Banco de dados SQLite para armazenamento local
- ✅ Seeder com dados de exemplo

## 🛠️ Tecnologias Utilizadas

- **PHP 8.2+**
- **Laravel 12.0**
- **SQLite** (banco de dados)
- **Composer** (gerenciamento de dependências)

## 📁 Estrutura do Projeto

```
api/
├── app/
│   ├── Http/Controllers/
│   │   └── CepsController.php    # Controller principal da API
│   └── Models/
│       ├── Ceps.php             # Model para CEPs
│       └── User.php             # Model de usuário (padrão Laravel)
├── database/
│   ├── migrations/
│   │   ├── 2025_07_10_214156_create_ceps_table.php
│   │   └── 2025_07_10_224737_adicionar_bairro_em_ceps.php
│   └── seeders/
│       └── CepsSeeder.php       # Dados de exemplo
├── routes/
│   └── api.php                  # Rotas da API
└── composer.json
```

## 🗄️ Estrutura do Banco de Dados

### Tabela `ceps`

| Campo | Tipo | Descrição |
|-------|------|-----------|
| id | bigint | Chave primária |
| cep | string | Código do CEP (apenas números) |
| logradouro | string | Nome da rua/avenida |
| complemento | string | Complemento do endereço |
| localidade | string | Cidade |
| bairro | string | Bairro (adicionado posteriormente) |
| uf | string | Unidade Federativa (sigla) |
| estado | string | Nome completo do estado |
| regiao | string | Região do Brasil |

## 🚀 Instalação e Configuração

### Pré-requisitos

- PHP 8.2 ou superior
- Composer
- Extensões PHP: PDO, SQLite

### Passos para instalação

1. **Clone o repositório**
   ```bash
   git clone <url-do-repositorio>
   cd api
   ```

2. **Instale as dependências**
   ```bash
   composer install
   ```

3. **Configure o ambiente**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. **Execute as migrações**
   ```bash
   php artisan migrate
   ```

5. **Popule o banco com dados de exemplo**
   ```bash
   php artisan db:seed --class=CepsSeeder
   ```

6. **Inicie o servidor de desenvolvimento**
   ```bash
   php artisan serve
   ```

A API estará disponível em `http://localhost:8000`

## 📚 Documentação da API

### Endpoint de Consulta

**GET** `/api/ceps/{cep}`

Consulta informações de endereço através do CEP.

#### Parâmetros

- `cep` (string, obrigatório): CEP a ser consultado (aceita com ou sem formatação)

#### Exemplos de Requisição

```bash
# CEP com formatação
GET /api/ceps/12345-678

# CEP sem formatação
GET /api/ceps/12345678

# CEP com outros caracteres
GET /api/ceps/123.456-78
```

#### Respostas

**Sucesso (200 OK)**
```json
{
  "id": 1,
  "cep": "12345678",
  "logradouro": "Rua 11",
  "complemento": "Quadra 11",
  "localidade": "Valparaíso",
  "bairro": "Esplanada V",
  "uf": "GO",
  "estado": "Goías",
  "regiao": "Centro-Oeste"
}
```

**Erro - CEP não encontrado (404 Not Found)**
```json
{
  "erro": true
}
```

## 🧪 Dados de Exemplo

O seeder inclui os seguintes CEPs de exemplo:

| CEP | Logradouro | Localidade | UF | Estado | Região |
|-----|------------|------------|----|---------|---------| 
| 12345678 | Rua 11 | Valparaíso | GO | Goías | Centro-Oeste |
| 87654321 | Rua 12 | Paraíso | DF | Goías | Centro-Oeste |
| 11223344 | Rua 13 | Ralapenõ | DF | Goías | Centro-Oeste |
| 55667788 | Rua 14 | Vale dos Riachos | GO | Goías | Centro-Oeste |
| 12341234 | Rua 15 | Ceu Azul | SP | São Paulo | Sul |

## 🔧 Comandos Úteis

```bash
# Executar migrações
php artisan migrate

# Reverter migrações
php artisan migrate:rollback

# Executar seeders
php artisan db:seed

# Limpar cache
php artisan cache:clear

# Executar testes
php artisan test

# Ver rotas registradas
php artisan route:list
```

## 🏗️ Desenvolvimento

### Adicionando Novos CEPs

Para adicionar novos CEPs ao banco de dados, você pode:

1. **Via Seeder** (recomendado para dados de teste):
   ```php
   // Em database/seeders/CepsSeeder.php
   Ceps::create([
       'cep' => '00000000',
       'logradouro' => 'Nova Rua',
       'complemento' => 'Complemento',
       'localidade' => 'Nova Cidade',
       'bairro' => 'Novo Bairro',
       'uf' => 'XX',
       'estado' => 'Novo Estado',
       'regiao' => 'Nova Região'
   ]);
   ```

2. **Via Tinker** (para testes rápidos):
   ```bash
   php artisan tinker
   ```
   ```php
   App\Models\Ceps::create([...]);
   ```

### Estrutura do Controller

O `CepsController` implementa o padrão Resource Controller do Laravel, mas atualmente apenas o método `index` está implementado para consulta de CEPs.

### Validação de CEP

O sistema automaticamente:
- Remove todos os caracteres não numéricos do CEP
- Busca no banco de dados usando apenas números
- Retorna erro 404 se o CEP não for encontrado

## 🐛 Solução de Problemas

### Erro de Conexão com Banco
- Verifique se o arquivo `database/database.sqlite` existe
- Execute `php artisan migrate` para criar as tabelas

### CEP não encontrado
- Verifique se o CEP existe no banco de dados
- Execute o seeder: `php artisan db:seed --class=CepsSeeder`

### Erro 500
- Verifique os logs em `storage/logs/laravel.log`
- Execute `php artisan config:clear`

## 📝 Licença

Este projeto está sob a licença MIT. Veja o arquivo `LICENSE` para mais detalhes.

## 🤝 Contribuição

1. Faça um fork do projeto
2. Crie uma branch para sua feature (`git checkout -b feature/AmazingFeature`)
3. Commit suas mudanças (`git commit -m 'Add some AmazingFeature'`)
4. Push para a branch (`git push origin feature/AmazingFeature`)
5. Abra um Pull Request

## 📞 Suporte

Para suporte, entre em contato através de:
- Email: [seu-email@exemplo.com]
- Issues: [link-para-issues]

---

**Desenvolvido com ❤️ usando Laravel**
### Premium Partners

- **[Vehikl](https://vehikl.com)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Redberry](https://redberry.international/laravel-development)**
- **[Active Logic](https://activelogic.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

