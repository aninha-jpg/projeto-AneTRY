<?php
$msg = isset($_GET['msg']) ? htmlspecialchars($_GET['msg']) : '';
?>

<!DOCTYPE html> 
<html lang="pt-br">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>AneTRY - Cadastro</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <link rel="stylesheet" href="css/style.css" />
</head>
<!-- parte do cadastro do usuario, mostrando alertas-->
<body class="d-flex align-items-center justify-content-center" style="height: 75vh";>
  <div style="max-width: 350px; width: 100%";>
  <?php if ($msg): ?>
  <div class="alert alert-danger" role="alert">
    <?= $msg ?>
  </div>
<?php endif; ?>
    <form action="cadastrar_usuario.php" method="POST">
    <h1>Faça seu cadastro</h1>
    <label for="nome_usuario">Nome de Usuário:</label>
    <input type="text" class="form-control" id="nome_usuario" name="nome_usuario" placeholder="Seu usuário" required><br><br>

    <label for="Senha">Senha:</label>
    <input type="password" class="form-control" id="Senha" name="Senha" placeholder="Senha" required autocomplete="new-password"><br><br>

    <button type="submit" class="btn btn-outline-rosa">Cadastrar</button>
    </div>
    </form>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>

