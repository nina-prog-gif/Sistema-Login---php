<?php
include 'conexao.php';
session_start();

$mensagem = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome_de_usuario = trim($_POST['nome_de_usuario']);
    $senha_digitada = $_POST['senha'];

    if (empty($nome_de_usuario) || empty($senha_digitada)) {
        $mensagem = "Por favor, preencha todos os campos.";
    } else {
       
        $sql = "SELECT id, nome_de_usuario, senha FROM usuarios WHERE nome_de_usuario = ?";
        $stmt = $conexao->prepare($sql);
        
        if ($stmt === false) {
            die('Erro ao preparar a instrução: ' . $conexao->error);
        }

       
        $stmt->bind_param("s", $nome_de_usuario);
        $stmt->execute();
        $resultado = $stmt->get_result();

        if ($resultado->num_rows === 1) {
            $usuario = $resultado->fetch_assoc();
            
            
            if (password_verify($senha_digitada, $usuario['senha'])) {
               
                $_SESSION['logado'] = true;
                $_SESSION['id_usuario'] = $usuario['id'];
                $_SESSION['nome_de_usuario'] = $usuario['nome_de_usuario'];
                
                
                header("Location: dashboard.php");
                exit;
            } else {
                $mensagem = "Senha incorreta.";
            }
        } else {
            $mensagem = "Usuário não encontrado.";
        }
        $stmt->close();
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>

<body>
    <h2>Login</h2>

    <?php if (!empty($mensagem)): ?>
    <p style="color: red;"><?php echo $mensagem; ?></p>
    <?php endif; ?>

    <form action="login.php" method="POST">
        <label for="nome_de_usuario">Nome de Usuário:</label><br>
        <input type="text" id="nome_de_usuario" name="nome_de_usuario" required><br><br>

        <label for="senha">Senha:</label><br>
        <input type="password" id="senha" name="senha" required><br><br>

        <button type="submit">Entrar</button>
    </form>

    <p>Não tem uma conta? <a href="cadastro.php">Cadastre-se</a>.</p>
</body>

</html>
