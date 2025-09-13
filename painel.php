<?php
session_start();


if (!isset($_SESSION['logado']) || $_SESSION['logado'] !== true) {
    
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
</head>

<body>
    <h2>Bem-vindo, <?php echo htmlspecialchars($_SESSION['nome_de_usuario']); ?>!</h2>
    <p>Você está logado e pode ver este conteúdo restrito.</p>

    <p><a href="logout.php">Sair</a></p>
</body>

</html>
