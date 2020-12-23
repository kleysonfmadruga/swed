# Swed
## Sobre
O Swed é um acrônimo para **S**istema **we**b de **d**ivulgação de estabelecimentos, que permite aos gerentes divulgarem seus estabelecimentos e aos usuários encontrar de forma facilitada os produtos e serviços da região desejada.

![Badge](https://img.shields.io/github/license/kleysonfmadruga/swed)
![Badge](https://img.shields.io/github/last-commit/kleysonfmadruga/swed)

## Tecnologias

O projeto foi construido utilizando as seguintes ferramentas e tecnologias:

- [PHP](https://www.php.net/)
- [Laravel](https://laravel.com/)
- [Tailwind CSS](https://tailwindcss.com/)
- [MySQL](https://www.mysql.com/)
- [npm](https://www.npmjs.com/)

## Testando localmente

### Pré-requisitos

Antes de começar, é necessário que você tenha o [PHP](https://www.php.net/), o [Git](https://git-scm.com/), o [Composer](https://getcomposer.org/), o [MySQL](https://www.mysql.com/) e o [npm](https://www.npmjs.com/) instalados na sua máquina. Além disso, é preciso que haja um banco de dados chamado 'laravel' no servidor de banco de dados MySQL (o nome do banco de dados a ser utilizado pode ser alterado substituindo o valor da variável de ambiente DB_DATABASE definida no arquivo .env). Para fazer alterações no projeto, recomendo a utilização de algum editor de código, como o [VSCode](https://code.visualstudio.com/)

### Rodando a aplicação

```bash
# Clone este repositório
$ git clone https://github.com/kleysonfmadruga/swed

# Entre na pasta do projeto
$ cd swed

# Instale as dependências de PHP do Laravel
$ composer update

# Instale as dependências de Javascript do Laravel
$ npm install

# Compile os assets de CSS e Javascript
$ npm run dev

# Copie as variáveis de ambiente do arquivo de exemplo
$ cp .env.example .env

# Gere uma nova chave para a aplicação
$ php artisan key:generate

# Execute as migrações para criar as tabelas no banco de dados
$ php artisan migrate

# Crie um link simbólico da pasta storages para a pasta public para torná-la pública
$ php artisan storage:link

# Inicie o servidor
$ php artisan serve

# O servidor iniciará na porta: 8000 - acesse o site por <http://localhost:8000>
```

## Autores
<!-- ALL-CONTRIBUTORS-LIST:START - Do not remove or modify this section -->
<!-- prettier-ignore-start -->
<!-- markdownlint-disable -->
<table>
  <tr>
    <td align="center"><a href="https://github.com/alissonfelipee"><img src="https://avatars1.githubusercontent.com/u/62302819?s=460&v=4" width="100px;" alt=""/><br /><sub><b>Alisson Felipe</b></sub></a></td>
    <td align="center"><a href="https://github.com/hugofsantos"><img src="https://avatars3.githubusercontent.com/u/74878213?s=400&v=4" width="100px;" alt=""/><br /><sub><b>Hugo dos Santos</b></sub></a></td>
    <td align="center"><a href="https://github.com/johnReberty"><img src="https://avatars3.githubusercontent.com/u/68155695?s=460&u=4d3186a52764e0d41ac34e7355b71771e56abf68&v=4" width="100px;" alt=""/><br /><sub><b>Johnny Reberty</b></sub></a></td>
    <td align="center"><a href="https://github.com/kleysonfmadruga"><img src="https://avatars2.githubusercontent.com/u/40344712?s=460&u=22908c3d03495629b06a09ce724a510d4a9dc96a&v=4" width="100px;" alt=""/><br /><sub><b>Kleyson Madruga</b></sub></a></td>
   </tr>
</table>
<!-- markdownlint-enable -->
<!-- prettier-ignore-end -->
<!-- ALL-CONTRIBUTORS-LIST:END -->
    
