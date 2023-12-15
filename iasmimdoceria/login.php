<?php 
    $host = "localhost:3307";
    $user = "root";
    $pass = "";
    $db   = "projetodavid";

    // Estabelecendo a conexão
    $conn = mysqli_connect($host, $user, $pass, $db);

    // Verificando a conexão
    if (!$conn) {
        die("Falha na conexão: " . mysqli_connect_error());
    } else {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Obtenção dos dados do formulário
            $email = mysqli_real_escape_string($conn, $_POST['email']);
            $senha = mysqli_real_escape_string($conn, $_POST['senha']);

            // Consulta SQL para verificar se o usuário existe
            $sql = "SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha'";
            $result = mysqli_query($conn, $sql);

            // Verificando se a consulta retornou algum resultado
            if (mysqli_num_rows($result) > 0) {
                // Login bem-sucedido - redirecionar para o cardápio
                header("Location: cardapio.html"); // Substitua 'cardapio.php' pelo caminho correto do seu cardápio
                exit();
            } else {
                // Login falhou - exibir mensagem de erro e redirecionar para tela de login
                echo "Usuário ou senha inválidos!";
                header("Refresh: 3; login.php"); // Substitua 'login.php' pelo caminho correto da tela de login
                exit();
            }
        }
    }
?>

