# Sistema-Login---php
Sistema de login + cadastro em PHP
Sistema de Login e Cadastro em PHP
Este é um projeto simples de sistema de login e cadastro desenvolvido para fins de aprendizado, utilizando as tecnologias:

HTML para interface.
PHP para lógica de back-end.
MySQL para o banco de dados.
Funcionalidades
Cadastro de Usuário: Permite que novos usuários se registrem com nome de usuário, e-mail e senha.
Login de usuário: Autentica usuários existentes e inicia uma sessão.
Proteção de Rota: Redireciona usuários não logados que permitem acessar páginas restritas.
Sair: Encerra a sessão do usuário.
Segurança: Utilize password_hash()e password_verify()para armazenar senhas de forma segura.
Estrutura do Projeto
O projeto é composto pelos seguintes arquivos:

cadastro.php: Página com o formulário de cadastro e a lógica de registro.
login.php: Página com o formulário de login e a lógica de autenticação.
dashboard.php: Página restrita, acessível apenas após o login.
logout.php: Encerre a sessão e redirecione para a página de login.
conexao.php: Arquivo de configuração para conexão com o banco de dados.
Como usar
Pré-requisitos
Servidor local (como XAMPP, WAMP ou MAMP) com PHP e MySQL instalado e rodando.
Configuração
Clone o repositório ou baixe os arquivos para a pasta htdocs(ou www) do seu servidor local.

Crie um banco de dados com o nome sistema_loginno phpMyAdmin.

Crie a tabelausuarios executando o seguinte código SQL:

CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome_de_usuario VARCHAR(50) NOT NULL UNIQUE,
    email VARCHAR(100) NOT NULL UNIQUE,
    senha VARCHAR(255) NOT NULL,
    data_de_criacao TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
Ajuste o arquivoconexao.php com suas credenciais do banco de dados (usuário, senha e porta, se necessário).
