<?php
// conecto ao banco de dados
session_start();
include("conexao.php");

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: login.php");
    exit;
}

//pega o input do login
$nome_usuario = trim($_POST['nome_usuario']?? null);
$senha = trim($_POST['Senha']?? null);
$lembrar_usuario = isset($_POST['lembrar_usuario']) ? true : false;

//fazendo o select no banco para achar o usuário.
$sql = "SELECT * FROM USUARIO WHERE nome_usuario = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $nome_usuario);
$stmt->execute();
$result = $stmt->get_result();

if($result->num_rows == 1) {
    $user = $result->fetch_assoc();
// se a senha for igual a do banco, ele inicia

    if(password_verify($senha,$user['Senha'])) {
        $_SESSION['Id_usuario'] = $user['Id_usuario'];
        $_SESSION['nome_usuario'] = $user['nome_usuario'];
        header("Location: index.php");
        exit;   
    } else {
        header("Location: login.php?msg=" . urlencode("Senha Incorreta.") );
        exit;
    }
} else {
    header("Location: cadastro.php?msg=" . urlencode("Usuário não encontrado.") );
    exit;
}
?>
