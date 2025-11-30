<?php
session_start();
include("conexao.php");
if (!isset($_SESSION['Id_usuario']) || empty($_SESSION['Id_usuario'])) {
    // se caso o usuario nao estiver logado, ele volta para a pagina do login
    header("Location: login.php");
    exit;
}
$id_usuario_logado = $_SESSION['Id_usuario']; 

if (!isset($_GET['id'])) {
    header("Location: sua_lista.php");
    exit;
}

$id_avaliacao = intval($_GET['id']);
$erro = '';
$sucesso = '';


$sql = "SELECT jogo, nota, comentario FROM AVALIACOES WHERE Id_avaliacoes = ? AND Id_usuario = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ii", $id_avaliacao, $id_usuario_logado);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    header("Location: sua_lista.php");
    exit;
}

$avaliacao = $result->fetch_assoc();


//parte que atualiza a avaliação, mudando no bd.
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $jogo = trim($_POST['jogo']);
    $nota = intval($_POST['nota']);
    $comentario = trim($_POST['comentario']);

    if ($jogo && $nota >= 0 && $nota <= 10) {
        $sql_update = "UPDATE AVALIACOES SET jogo = ?, nota = ?, comentario = ? WHERE Id_avaliacoes = ? AND Id_usuario = ?";
        $stmt_update = $conn->prepare($sql_update);
        $stmt_update->bind_param("sisii", $jogo, $nota, $comentario, $id_avaliacao, $id_usuario_logado);
        $stmt_update->execute();

        $sucesso = "Avaliação atualizada com sucesso!";

        $avaliacao['jogo'] = $jogo;
        $avaliacao['nota'] = $nota;
        $avaliacao['comentario'] = $comentario;
    } else {
        $erro = "Verifique os dados preenchidos.";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>AneTRY - Editar</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body id="editar">
  <!-- nav bar como menu simples-->
<nav class="navbar navbar-expand-lg navbar-dark">
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
      </li>
        <li class="nav-item">
          <a class="nav-link" href="logout.php">Logout</a>
        </li>
    </ul>
  </div>
  </div>
</nav>
  <!-- mensagens de erro e sucesso-->
        <?php if ($erro): ?>
            <p style="color: red;"><?php echo htmlspecialchars($erro); ?></p>
        <?php endif; ?>
          <?php if ($sucesso): ?>
            <div class="alert alert-success" role="alert">
              <?php echo htmlspecialchars($sucesso); ?>
            </div>
            <p class="text-center">
              <a href="sua_lista.php" class="btn btn-outline-rosa">Voltar para a Lista</a>
            </p>
          <?php else: ?>

    <div class="conteudo">
        <!-- passo as variaveis para alterar o banco de dados-->
        <div class="container" style="max-width: 400px; margin-top: 40px;"><br><br>
        <h1 class="mb-4 text-center">Editar Avaliação</h1>

            <form action="editar_avaliacao.php?id=<?php echo htmlspecialchars($id_avaliacao); ?>" method="POST">
               <input type="hidden" name="id_avaliacao" value="<?php echo htmlspecialchars($id_avaliacao); ?>">
                <div class="mb-3">
                <label>Nome do Jogo:</label><br>
                <input type="text" class="form-control" name="jogo" value="<?php echo htmlspecialchars($avaliacao['jogo']); ?>" required>
                </div>
                <div class="mb-3">
                <label>Nota (0 a 10):</label><br>
                <input type="number" class="form-control" class="form-control" name="nota" min="0" max="10" value="<?php echo htmlspecialchars($avaliacao['nota']); ?>" required>
                </div>
                <div class="mb-3">
                <label>Review:</label><br>
                <textarea name="comentario" rows="6" class="form-control"><?php echo htmlspecialchars($avaliacao['comentario']); ?></textarea>
                </div>
                <button type="submit" class="btn btn-outline-rosa">Salvar Alterações</button> <a href="sua_lista.php" class="btn btn-outline-rosa">Cancelar e Voltar</a>
            </form>
        </div>
        </div>
        <?php endif; ?>
    </div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>