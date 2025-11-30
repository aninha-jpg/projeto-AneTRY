<?php
session_start();
include("conexao.php");
if (!isset($_SESSION['Id_usuario']) || empty($_SESSION['Id_usuario'])) {
    // se caso o usuario nao estiver logado, ele volta para a pagina do login
    header("Location: login.php");
    exit;
}
$id_usuario_logado = $_SESSION['Id_usuario']; 
$nome_usuario_logado = htmlspecialchars($_SESSION['nome_usuario']); 

if (isset($_GET['id'])) {
    $id_avaliacao = intval($_GET['id']);
    $id_usuario_logado = $_SESSION['Id_usuario'];

    // confirmação que o user pertence mesmo ao dono
    $sql_check = "SELECT Id_avaliacoes FROM AVALIACOES WHERE Id_avaliacoes = ? AND Id_usuario = ?";
    $stmt_check = $conn->prepare($sql_check);
    $stmt_check->bind_param("ii", $id_avaliacao, $id_usuario_logado);
    $stmt_check->execute();
    $result_check = $stmt_check->get_result();

    if ($result_check->num_rows > 0) {
        // exclui do bd
        $sql_delete = "DELETE FROM AVALIACOES WHERE Id_avaliacoes = ?";
        $stmt_delete = $conn->prepare($sql_delete);
        $stmt_delete->bind_param("i", $id_avaliacao);
        $stmt_delete->execute();
    }
}

header("Location: sua_lista.php");
exit;
?>