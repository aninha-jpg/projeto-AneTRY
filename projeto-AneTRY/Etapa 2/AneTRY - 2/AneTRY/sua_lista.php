<?php
error_reporting(E_ALL); // Reporta todos os erros
ini_set('display_errors', 1); // Exibe os erros na tela
session_start();
include("conexao.php");
if (!isset($_SESSION['Id_usuario']) || empty($_SESSION['Id_usuario'])) {
    // se caso o usuario nao estiver logado, ele volta para a pagina do login
    header("Location: login.php");
    exit;
}
$id_usuario_logado = $_SESSION['Id_usuario']; 
$nome_usuario_logado = htmlspecialchars($_SESSION['nome_usuario']); 

//seleciono as avaliações no banco
$sql_read = "SELECT Id_avaliacoes, jogo, nota, data, comentario FROM AVALIACOES WHERE Id_usuario = ? ORDER BY data DESC";

$stmt_read = $conn->prepare($sql_read);

$stmt_read->bind_param("i", $id_usuario_logado); 

$stmt_read->execute(); 
$result_read = $stmt_read->get_result(); 
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $nome_usuario_logado; ?> - Sua Lista</title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <link rel="stylesheet" href="css/style.css" />
</head>         
<body id="sua_lista">
  <!-- crio o conteiner para divisão e organização e para chamar a página e um id para melhor estilização no css -->
<!-- crio um menu simples para navegação entre páginas -->

<nav class="navbar navbar-expand-lg navbar-dark ">
  <div class="container-fluid">
  <a class="navbar-brand" href="index.php">AneTRY</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Alterna navegação">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="form.php">Avaliar um Jogo</a>
      </li>
      <li class="nav-item">
        <a class="nav-link active" href="sua_lista.php">Sua Lista</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="about.php">Conheça AneTRY</a>
          <li class="nav-item">
          <a class="nav-link" href="logout.php">Logout</a>
        </li>
      </li>
    </ul>
  </div>
  </div>
</nav>

  <!-- puxa o formulário e preenche com as informções dadas pelo usuário -->
    <div class="conteudo">
      <!-- crio ouma classe para estilizar o nome da pagina -->
      <h1>Minhas Avaliações</h1>
 <?php if ($result_read->num_rows > 0): ?>
  <div id="responsive">
    <table border="1" cellpadding="8" cellspacing="0">
      <thead>
        <tr>
        <th>Jogo</th>
        <th>Comentário</th>
        <th>Nota</th>
        <th>Data</th>
        <th>Ações</th>
        </tr>
      </thead>
        <tbody>
          <?php while ($avaliacao = $result_read->fetch_assoc()): ?>
            <tr>
              <td><?php echo htmlspecialchars($avaliacao['jogo']); ?></td>
              <td><?php echo nl2br(htmlspecialchars($avaliacao['comentario'])); ?></td>
              <td><?php echo htmlspecialchars($avaliacao['nota']); ?></td>
              <td><?php $data_br = date('d/m/Y', strtotime($avaliacao['data'])); echo htmlspecialchars($data_br);?></td>
              <td class="actions">
              <a href="editar_avaliacao.php?id=<?php echo urlencode($avaliacao['Id_avaliacoes']); ?>" class="btn btn-outline-branco">Editar
                <i class="fa-solid fa-pen"></i>
              </a>
              <a href="excluir_avaliacao.php?id=<?php echo urlencode($avaliacao['Id_avaliacoes']); ?>" class="btn btn-outline-branco" onclick="return confirm('Tem certeza que deseja excluir esta avaliação?');">Excluir
                <i class="fa-solid fa-trash"></i>
              </a>
              </td>
            </tr>
          <?php endwhile; ?>
        </tbody>
      </table>
      </div>
            <?php else: ?>
                <p>Você ainda não fez nenhuma avaliação de jogo.</p>
            <?php endif; ?>
        </div>
    <?php
    $stmt_read->close();
    if (isset($conn) && $conn instanceof mysqli) { 
        $conn->close(); 
    }
    ?>
    <p><a href="form.php" class="btn btn-outline-rosa">Nova Avaliação</a></p>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>