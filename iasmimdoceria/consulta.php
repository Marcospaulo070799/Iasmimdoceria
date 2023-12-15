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
            $id = $_POST['id'];

            $sql = "SELECT * FROM usuarios WHERE id = '" . mysqli_real_escape_string($conn, $id) . "'";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
                $nome = $row['nome'];
                $cpf = $row['cpf'];
                $telefone = $row['telefone'];
                $email = $row['email'];
                $senha = $row['senha'];
            } else {
                echo "<script>alert('Usuário não encontrado!');</script>";
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta e Atualização</title>
    <link rel="icon" type="image/x-icon" href="assets/favicon-32x32.png" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding:0;
            background-color: beige;
        }

        h2 {
            text-align: center;
        }

        form {
            margin: 0 auto;
            width: 300px;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="password"],
        input[type="submit"] {
            width: calc(100% - 12px);
            padding: 8px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        input[type="submit"] {
            background-color: #3498db;
            color: white;
            cursor: pointer;
        }

        p {
            text-align: center;
            margin-top: 10px;
        }

        a {
            color: #3498db;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div style="width: 2515px; height: 100px; background-color: #ec77bb; box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.5);">
        <nav class="navbar navbar-expand-lg navbar-light" id="mainNav">
            <div class="container px-4 px-lg-5">
                <img src="assets/favicon-32x32.png" wight="80px", height="80px" alt="Minha Imagem">
                <a class="navbar-brand" href="index.html"  >Iasmim Doceria</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto py-4 py-lg-0">
                        <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="./cardapio.html">cardapio</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <hr><hr>
    <form method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
        <h2>Consulta e Atualização</h2>
        ID: <input type="text" name="id">
        <input type="submit" value="Consultar">
    </form>
    <?php if (isset($nome)) { ?>
        <form method="POST" action="atualiza.php">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <p>Nome: <br> <input type="text" name="nome" value="<?php echo $nome; ?>"> </p>
            <p>CPF: <br> <input type="text" name="cpf" value="<?php echo $cpf; ?>"> </p>
            <p>Telefone: <br> <input type="text" name="telefone" value="<?php echo $telefone; ?>"> </p>
            <p>Email: <br> <input type="text" name="email" value="<?php echo $email; ?>"> </p>
            <p>Senha: <br> <input type="password" name="senha" value="<?php echo $senha; ?>"> </p>
            <p><input type="submit" value="Atualizar usuário"></p>
        </form>
    <?php } ?>
</body>
</html>
