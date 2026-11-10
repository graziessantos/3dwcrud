# 3dwcrud — CRUD de Usuários em PHP

Projeto de estudo de um CRUD (cadastrar, listar, alterar e excluir) de usuários, feito em **PHP com PDO e MySQL**, seguindo uma organização em camadas (Modelo, Visão e Controle). A interface tem visual pixelado, estilo jogo 8 bits, em tons de roxo.

## Tecnologias

- PHP 8.2
- MySQL / MariaDB (XAMPP)
- PDO
- HTML e CSS (fontes `Press Start 2P` e `VT323`, do Google Fonts)

## Estrutura de pastas

```
3dwcrud/
├── index.php                  Página principal (inclui os formulários e a listagem)
├── css/
│   └── style.css              Estilo pixelado em tons de roxo
├── Controle/
│   └── ControleUsuario.php    Recebe as ações (cadastrar, alterar, excluir)
├── Modelo/
│   ├── ClassUsuario.php       Entidade Usuario (id, nome, email)
│   └── DAO/
│       ├── Conexao.php        Conexão com o banco via PDO
│       └── ClassUsuarioDAO.php  Classe UsuariosDAO (acesso ao banco)
└── Visao/
    ├── FormCadUsuario.php     Formulário de cadastro
    ├── FormAltUsuario.php     Formulário de alteração
    ├── FormExcUsuario.php     Formulário de exclusão
    └── ListarUsuario.php      Tabela de usuários cadastrados
```

## Como executar

1. Instale o [XAMPP](https://www.apachefriends.org/) e inicie o **Apache** e o **MySQL** pelo painel.
2. Copie a pasta `3dwcrud` para `C:\xampp\htdocs\`.
3. Crie o banco de dados e a tabela (veja a próxima seção).
4. Confira a configuração de conexão em `Modelo/DAO/Conexao.php`.
5. Acesse no navegador: <http://localhost/3dwcrud/>

## Banco de dados

Crie o banco `bdpoo` no phpMyAdmin (ou pelo console) e execute:

```sql
CREATE DATABASE IF NOT EXISTS bdpoo CHARACTER SET utf8mb4;
USE bdpoo;

CREATE TABLE usuarios (
    idUsuario INT AUTO_INCREMENT PRIMARY KEY,
    nome      VARCHAR(100) NOT NULL,
    email     VARCHAR(100) NOT NULL
);
```

### Configuração da conexão

O arquivo `Modelo/DAO/Conexao.php` usa estes valores:

```php
$dsn  = 'mysql:host=localhost;port=3307;dbname=bdpoo';
$user = 'root';
$pass = '';
```

> **Atenção à porta:** neste projeto o MySQL do XAMPP roda na porta **3307**. Se o seu usa a porta padrão, troque para `3306` (ou remova o `port=`). A porta aparece no topo do phpMyAdmin, em "Servidor: 127.0.0.1:XXXX".

## Funcionalidades

| Ação      | Formulário            | Método | Rota no controle                                  |
|-----------|-----------------------|--------|---------------------------------------------------|
| Cadastrar | `FormCadUsuario.php`  | POST   | `Controle/ControleUsuario.php?ACAO=cadastrarUsuario` |
| Alterar   | `FormAltUsuario.php`  | POST   | `Controle/ControleUsuario.php?ACAO=alterar`          |
| Excluir   | `FormExcUsuario.php`  | GET    | `Controle/ControleUsuario.php?ACAO=excluir&idex=ID`  |
| Listar    | `ListarUsuario.php`   | —      | Exibida na própria `index.php`                       |

Depois de cada ação, o controle redireciona para o `index.php` com uma mensagem (`?MSG=...`), exibida em um `alert`.


## Observações

- O projeto é para estudo e uso local. Não há autenticação, validação de duplicidade de e-mail nem proteção contra CSRF.
- "Alterar" com os mesmos dados que já estão no banco exibe "Não foi alterado!", pois o MySQL conta 0 linhas modificadas.
- "Excluir" com um ID inexistente também exibe sucesso, pois o DAO retorna `TRUE` sempre que não há exceção.
