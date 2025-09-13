<?php

include 'conexao.php';


session_start();

$mensagem = ''; 


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $nome_de_usuario = trim($_POST['nome_de_usuario']);
    $email = trim($_POST['email']);
    $senha_digitada = $_POST['senha'];

    
    if (empty($nome_de_usuario) || empty($email) || empty($senha_digitada)) {
        $mensagem = "Por favor, preencha todos os campos.";
    } else {
       
        $senha_hashed = password_hash($senha_digitada, PASSWORD_DEFAULT);

       
        $sql = "INSERT INTO usuarios (nome_de_usuario, email, senha) VALUES (?, ?, ?)";
        $stmt = $conexao->prepare($sql);

        
        if ($stmt === false) {
            die('Erro ao preparar a instrução: ' . $conexao->error);
        }

        
        $stmt->bind_param("sss", $nome_de_usuario, $email, $senha_hashed);
        
        if ($stmt->execute()) {
            $mensagem = "Cadastro realizado com sucesso! <a href='login.php'>Faça login agora.</a>";
        } else {
            
            $mensagem = "Erro: " . $stmt->error . " ou nome de usuário(a)/e-mail já existente.";
        }

        $stmt->close();
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Cadastro</title>
</head>

<body>
    <h2>Cadastro de Usuário</h2>

    <?php if (!empty($mensagem)): ?>
    <p style="color: red;"><?php echo $mensagem; ?></p>
    <?php endif; ?>

    <form action="cadastro.php" method="POST">
        <label for="nome_de_usuario">Nome de Usuário:</label><br>
        <input type="text" id="nome_de_usuario" name="nome_de_usuario" required><br><br>

        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" required><br><br>

        <label for="senha">Senha:</label><br>
        <input type="password" id="senha" name="senha" required><br><br>

        <button type="submit">Cadastrar</button>
    </form>

    <p>Já tem uma conta? <a href="login.php">Faça login</a>.</p>
</body>

</html>
