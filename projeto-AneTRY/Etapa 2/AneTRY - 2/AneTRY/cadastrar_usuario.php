<?php
// conecto ao banco de dados
session_start();
include("conexao.php");

//pega o input do login
$nome_usuario = trim($_POST['nome_usuario']);
$senha = trim($_POST['Senha']);

//Faço para verificar se o usuário já existe
$sql = "SELECT * FROM USUARIO WHERE nome_usuario = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $nome_usuario);
$stmt->execute();
$result = $stmt->get_result();


if( $result->num_rows > 0){
    header("Location: login.php?msg=" . urlencode("Nome de Usuário já existente. Escolha Outro."));
    exit;
}

$senha_hashed = password_hash($senha, PASSWORD_DEFAULT);

//parte que isere o novo usuario no banco

$sql = "INSERT INTO USUARIO (nome_usuario, Senha) VALUES (?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $nome_usuario, $senha_hashed);

if ($stmt->execute()) {
    header("Location: login.php?msg=" . urlencode("Usuário cadastrado com sucesso! Faça seu login."));
    exit;
} else {
    header("Location: login.php?msg=" . urlencode("Erro ao cadastrar usuário! Tente novamente mais tarde."));
}

$stmt->close();
$conn->close();
?>
