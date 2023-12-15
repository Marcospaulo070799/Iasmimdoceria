<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>atualiza usuario</title>
</head>
<body>
    
<?php /*
 $host = "localhost:3307";
 $user = "root";
 $pass = "";
 $db   = "projetodavid";

 // Estabelecendo a conexão
 $conn = mysqli_connect($host, $user, $pass, $db);


 // Verificando a conexão
 if(! $conn) {
      
     exit();
     header("Location: consulta.php");   
 } else{

 if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $id = $_POST['id'];       
            $nome = $_POST['nome'];
            $cpf = $_POST['cpf'];
            $telefone = $_POST['telefone'];
            $email = $_POST['email'];
            $senha = $_POST['senha'];

            $sql = "UPDATE usuarios SET nome = '$nome', cpf = '$cpf', telefone = '$telefone', email = '$email', senha = '$senha' WHERE id='$id'";

            if (mysqli_query($conn, $sql)) {
                echo "Usuário atualizado com sucesso!";
            } else {
                echo "Erro ao atualizar usuário: " . mysqli_error($conn);
            }

 }
}

*/
$host = "localhost:3307";
$user = "root";
$pass = "";
$db = "projetodavid";

// Estabelecendo a conexão
$conn = mysqli_connect($host, $user, $pass, $db);

// Verificando a conexão
if (mysqli_connect_errno()) {
    exit(header("Location: consulta.php")); // Redirecionamento após falha na conexão
} else {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $id = mysqli_real_escape_string($conn, $_POST['id']);
        $nome = mysqli_real_escape_string($conn, $_POST['nome']);
        $cpf = mysqli_real_escape_string($conn, $_POST['cpf']);
        $telefone = mysqli_real_escape_string($conn, $_POST['telefone']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $senha = mysqli_real_escape_string($conn, $_POST['senha']);

        $sql = "UPDATE usuarios SET nome = '$nome', cpf = '$cpf', telefone = '$telefone', email = '$email', senha = '$senha' WHERE id='$id'";

        if (mysqli_query($conn, $sql)) {
            echo "Usuário atualizado com sucesso!";
        } else {
            echo "Erro ao atualizar usuário: " . mysqli_error($conn);
        }
    }
}
?>

</body>
</html>