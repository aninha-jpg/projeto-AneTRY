<?php
$msg = isset($_GET['msg']) ? htmlspecialchars($_GET['msg']) : '';
?>

<!DOCTYPE html> 
<html lang="pt-br">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>AneTRY - Login</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <link rel="stylesheet" href="css/style.css"/>
</head>

<body class="d-flex align-items-center justify-content-center" style="height: 75vh";>
  <div style="max-width: 350px; width: 100%";>
<?php if ($msg): ?>
  <div class="alert alert-info alert-dismissible fade show" role="alert" style="max-width: 450px";>
    <?= $msg ?>
    <button type="button" class="close" data-dismiss="alert" aria-label="Fechar">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
<?php endif; ?>

  <form action="autenticar.php" method="POST">

  <div class="form-group">
    <h1>Faça seu login!</h1>
    <label for="nome_usuario">Usuário:</label>
    <input type="text" class="form-control" id="nome_usuario" name="nome_usuario" placeholder="Seu usuário" required>
  </div>

  <div class="form-group">
    <label for="Senha">Senha</label>
    <input type="password" class="form-control" id="Senha" name="Senha" placeholder="Senha" required>
  </div>

  <div class="form-group form-check">
    <input type="checkbox" class="form-check-input" id="lembrar_usuario" name="lembrar_usuario">
    <label class="form-check-label" for="lembrar_usuario">Lembrar Usuário</label>
  </div>
  <button type="submit" class="btn btn-outline-rosa">Enviar</button>
  </div>
</form>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>