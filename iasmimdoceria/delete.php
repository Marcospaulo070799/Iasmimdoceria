<?php
$host = "localhost:3307";
$user = "root";
$pass = "";
$db = "projetodavid";

// Estabelecendo a conexão
$conn = mysqli_connect($host, $user, $pass, $db);

// Verificando a conexão
if (!$conn) {
    header("Location: delete.php"); // Redirecionamento após falha na conexão
    exit();
} else {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $id = mysqli_real_escape_string($conn, $_POST['id']);

        $sql = "DELETE FROM usuarios WHERE id = ?";
        $stmt = mysqli_prepare($conn, $sql);
        
        mysqli_stmt_bind_param($stmt, "i", $id); // "i" indica que é um valor inteiro
        if (mysqli_stmt_execute($stmt)) {
            echo "Usuário excluído com sucesso!";
        } else {
            echo "Erro ao excluir usuário: " . mysqli_error($conn);
        }
        
        mysqli_stmt_close($stmt);
    }
}
?>
