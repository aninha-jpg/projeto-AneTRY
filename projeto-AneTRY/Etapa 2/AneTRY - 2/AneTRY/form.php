<?php
session_start();
if (!isset($_SESSION['Id_usuario']) || empty($_SESSION['Id_usuario'])) {
    // se caso o usuario nao estiver logado, ele volta para a pagina do login
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>AneTRY - Avaliar um Jogo</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <link rel="stylesheet" href="css/style.css" />
</head>
<body id="form">
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
        <li class="nav-item">
          <a class="nav-link" href="logout.php">Logout</a>
        </li>
    </ul>
  </div>
  </div>
</nav>

    <!-- parte da avaliação do usuário -->
    <div class="conteudo">
  <div class="container" style="max-width: 400px; margin-top: 40px;">
  <h1 class="mb-4 text-center">Envie seu Review</h1>
  <form action="formAction.php" method="POST">
  <div class="mb-3">
    <input type="text" class="form-control" id="jogo" name="jogo" placeholder="Nome do Jogo" required>
  </div>

  <div class="mb-3">
    <label for="nota" class="form-label">Nota de 0 a 10:</label>
    <input type="number" class="form-control" id="nota" name="nota" min="0" max="10" required>
  </div>

  <div class="mb-3">
    <textarea id="comentario" name="comentario" rows="6" class="form-control" placeholder="Deixe sua Review"></textarea>
  </div>

  <button type="submit" class="btn btn-outline-rosa">Enviar</button>
</form>
    </div>
    </div>
    </div>
    <script>

    //passo um script js para mais segurança na hora de validar os dados
    document.getElementById('avaliacaoForm').addEventListener('submit', function(event) {
    const nomeJogo = document.getElementById('jogo').value.trim();
    const nota = parseInt(document.getElementById('nota').value, 10);

    let erros = [];

    if (nomeJogo === '') {
      erros.push("O nome do jogo é obrigatório.");
    }

    if (isNaN(nota) || nota < 0 || nota > 10) {
      erros.push("A nota deve ser um número entre 0 e 10.");
    }

    if (erros.length > 0) {
      alert(erros.join('\n'));
      event.preventDefault();
    }
  });
      </script>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>
