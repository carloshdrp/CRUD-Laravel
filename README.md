# CRUD Fullstack com Laravel - Sistema de Gerenciamento de Produtos

---

## Visão Geral do Projeto

Este é um sistema completo de gerenciamento de produtos desenvolvido com Laravel 10, implementando operações CRUD (Create, Read, Update, Delete) com autenticação de usuários e relacionamentos entre entidades. O projeto foi construído seguindo a **arquitetura MVC**.

### Tecnologias Principais

- **Backend**: Laravel 10 com Eloquent ORM
- **Banco de Dados**: MySQL com migrações e seeders
- **Frontend**: Tailwind CSS com componentes Blade
- **Autenticação**: Laravel Breeze (Sessões)
- **Assets**: Vite + Alpine.js para interatividade
- **Relacionamentos**: N-N entre Produtos e Categorias


## Funcionalidades Principais

O sistema oferece um painel administrativo com:

- **Gestão de Produtos**: Cadastro com upload de imagens, edição e exclusão
- **Categorização**: Sistema de categorias com associação múltipla
- **Autenticação**: Login e registro



## Estrutura do Projeto

O sistema segue a estrutura padrão do Laravel:

```
app/
├── Http/Controllers/      # Controladores para todas as entidades
├── Models/                # Modelos com validação customizada
database/
├── migrations/            # Esquema completo do banco de dados
├── seeders/               # Dados iniciais para testes
resources/views/
├── auth/                  # Telas de autenticação
├── dashboard/             # Interface administrativa
├── layouts/               # Templates base
public/img/                # Armazenamento de imagens uploadadas
routes/web.php             # Definição de rotas web
```


## Como Executar

1. Clone o repositório: `git clone https://github.com/carloshdrp/CRUD-Laravel`
2. Instale as dependências: `composer install && npm install`
3. Configure o arquivo `.env` com suas credenciais de banco de dados
4. Execute as migrações: `php artisan migrate --seed`
5. Inicie o servidor: `php artisan serve`
6. Acesse `http://localhost:8000` no navegador

**Credenciais Iniciais** (após seeders):

- Email: admin@email.com
- Senha: 12345678


## Destaques

O projeto implementa validação customizada diretamente nos modelos Eloquent, garantindo consistência dos dados em todas as operações. O sistema de upload de imagens armazena os arquivos no filesystem público com caminhos relativos.

Os relacionamentos many-to-many entre produtos e categorias são gerenciados através de uma tabela de relacionamento (`category_products`), permitindo associações dinâmicas através do select na interface. A paginação nativa do Laravel é utilizada para melhor performance na listagem de itens.

A interface responsiva foi desenvolvida com Tailwind CSS e componentes Blade reutilizáveis, garantindo consistência visual em todas as páginas.

## Resultados

### Página inicial
<img src="https://github.com/carloshdrp/portifolio-novo/blob/fcc055dbaeed2465150fb3a6513cf7b7d809bdf3/src/content/projects/images/artlist-home.png" />

### Visualização do produto
<img src="https://github.com/carloshdrp/portifolio-novo/blob/fcc055dbaeed2465150fb3a6513cf7b7d809bdf3/src/content/projects/images/artilist-produto.png" />

### Painel categorias
<img src="https://github.com/carloshdrp/portifolio-novo/blob/fcc055dbaeed2465150fb3a6513cf7b7d809bdf3/src/content/projects/images/artlist-categorias.png" />

### Edição de produto
<img src="https://github.com/carloshdrp/portifolio-novo/blob/fcc055dbaeed2465150fb3a6513cf7b7d809bdf3/src/content/projects/images/artilist-editar.png" />


