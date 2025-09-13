<?php

$servidor = "localhost";
$usuario = "root"; 
$senha = "Flamengo@1"; 
$banco_de_dados = "loginmaiscadstro";


$conexao = new mysqli($servidor, $usuario, $senha, $banco_de_dados, "3306");


if ($conexao->connect_error) {
    die("Erro na conexão: " . $conexao->connect_error);
}
?>
