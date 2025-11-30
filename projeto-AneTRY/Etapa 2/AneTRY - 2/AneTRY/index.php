<!-- Nome: Ana Luiza de Lima da Rocha. -->
<!-- Curso: Análise e Desenvolvimento de Sistemas. -->
<!-- Data: 15-06-25 -->
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>AneTRY - Home</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <link rel="stylesheet" href="css/style.css" />
</head>
<body id="index">
  <!-- um id para melhor estilização no css -->
      <!-- crio um menu simples para navegação entre páginas -->

<nav class="navbar navbar-expand-lg navbar-dark">
  <div class="container-fluid">
  <a class="navbar-brand active" href="index.php">AneTRY</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Alterna navegação">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="form.php">Avaliar um Jogo</a>
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
    
    <!-- conteúdo da página inicial -->
<div class="conteudo">
    <!-- crio ouma classe para estilizar o nome da pagina -->
    <h1>Seja Bem-Vindo!</h1>
    <br>
    <br>
    <h2>Compartilhe seus jogos favoritos e transforme suas experiências em histórias incríveis!</h2>
    <br>
    <br>
  <div class="jogos">
      <p>Ainda pensando em qual jogo escolher? Aqui vão alguns que a galera curte:</p>
  </div>


  <!--Crio um carousel para a pagina -->
<div class="carousel-container">

<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">

  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
  </ol>

  <div class="carousel-inner">

    <div class="carousel-item active">
      <img class="d-block w-100" src="img/gta.jpg" alt="Grand Theft Auto 5">
      <div class="carousel-caption d-none d-md-block">
    <h5>Grand Theft Auto 5</h5>
    <p>Para experiências e relembranças antes do 6...</p>
      </div>
    </div>


    <div class="carousel-item">
      <img class="d-block w-100" src="img/Resident-Evil-2.jpg" alt="Resident Evil 2 Remake">
      <div class="carousel-caption d-none d-md-block">
    <h5>Resident Evil 2 Remake</h5>
    <p>Muito aclamado como um dos melhores remakes da franquia</p>
      </div>
    </div>


    <div class="carousel-item">
      <img class="d-block w-100" src="img/mine.jpg" alt="Minecraft">
      <div class="carousel-caption d-none d-md-block">
    <h5>Minecraft</h5>
    <p>Para a criança interior</p>
      </div>
    </div>


    <div class="carousel-item">
      <img class="d-block w-100" src="img/stardew.jpg" alt="Stardew Valley">
      <div class="carousel-caption d-none d-md-block">
    <h5>Stardew Valley</h5>
    <p>Paz e conforto, em um só</p>
      </div>
    </div>
  </div>


  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Anterior</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Próximo</span>
  </a>
  </div>
</div>


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>
