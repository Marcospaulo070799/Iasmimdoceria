<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enviar</title>
</head>
<body>
    <?php 
        $host = "localhost:3307";
        $user = "root";
        $pass = "";
        $db   = "projetodavid";

        // Estabelecendo a conexão
        $conn = mysqli_connect($host, $user, $pass, $db);

        // Verificando a conexão
        if(! $conn) {
            // Redirecionamento para a página de formulário em caso de falha na conexão
            header("Location: registro.html");
            exit();
        } else {
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                // Obtenção dos dados do formulário
                $nome = mysqli_real_escape_string($conn, $_POST['nome']);
                $cpf = mysqli_real_escape_string($conn, $_POST['cpf']);
                $telefone = mysqli_real_escape_string($conn, $_POST['telefone']);
                $email = mysqli_real_escape_string($conn, $_POST['email']);
                $senha = mysqli_real_escape_string($conn, $_POST['senha']);
                
                // Preparação e execução da consulta SQL para inserção de dados
                $sql = "INSERT INTO usuarios (nome, cpf, telefone, email, senha) VALUES ('$nome', '$cpf', '$telefone', '$email', '$senha')";

                if (mysqli_query($conn, $sql)) {
                    echo "Usuário inserido com sucesso!";
                } else {
                    echo "Erro ao inserir usuário: " . mysqli_error($conn);
                }
            }
        }
    ?>
</body>
</html>
