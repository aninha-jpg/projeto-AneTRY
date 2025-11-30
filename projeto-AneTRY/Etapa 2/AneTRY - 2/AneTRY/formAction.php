<?php
session_start();
include("conexao.php");
if (!isset($_SESSION['Id_usuario']) || empty($_SESSION['Id_usuario'])) {
    // se caso o usuario nao estiver logado, ele volta para a pagina do login
    header("Location: login.php");
    exit;
}

$jogo = $_POST['jogo'] ?? '';
$nota = $_POST['nota'] ?? '';
$id_usuario = $_SESSION['Id_usuario'];
$comentario = $_POST['comentario'] ?? '';
$data = date('Y-m-d');

//fazer a inserção da avaliação no banco de dados

$sql = "INSERT INTO AVALIACOES (jogo, nota, data, Id_usuario, comentario) VALUES (?, ?, NOW(), ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("siis", $jogo, $nota, $id_usuario, $comentario);

$msg = '';
if ($stmt->execute()) {
  $msg = '<div class="alert alert-success" role="alert" style="max-width: 500px;">
    Avaliação salva com sucesso! Você pode acessar elas na Sua Lista!
  </div>';
} else {
  $msg = '<div class="alert alert-danger" role="alert">
    Erro ao salvar avaliação: ' . htmlspecialchars($stmt->error) . '
  </div>';
  exit;
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>AneTRY - Avaliar um Jogo</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <link rel="stylesheet" href="css/style.css"/>
</head>
<body id="formAction">
  <!-- crio o conteiner para divisão e organização e para chamar a página e um id para melhor estilização no css -->
<!-- crio um menu simples para navegação entre páginas -->
<nav class="navbar navbar-expand-lg navbar-dark">
  <div class="container-fluid">
  <a class="navbar-brand" href="index.php">AneTRY</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Alterna navegação">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link active" href="form.php">Avaliar um Jogo</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="sua_lista.php">Sua Lista</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="about.php">Conheça AneTRY</a>
      </li>
    </ul>
  </div>
  </div>
</nav>

<?php
  if (!empty($msg)) {
    echo $msg;
  }
?>

  <!-- puxa o formulário e preenche com as informções dadas pelo usuário -->
    <div class="conteudo">
      <!-- crio ouma classe para estilizar o nome da pagina -->
      <h1>Sua Análise</h1>
      <ul>
        <li><strong> Nome do Jogo:  </strong><?php echo htmlspecialchars($jogo); ?></li>
        <li><strong> Nota:  </strong><?php echo htmlspecialchars($nota); ?></li>
        <li><strong> Review:  </strong><?php echo nl2br(htmlspecialchars($comentario)); ?></li>
        <li><strong> Data da Avaliação: </strong> <?php echo $data; ?></li>
      </ul>
    </div>
  </div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>
