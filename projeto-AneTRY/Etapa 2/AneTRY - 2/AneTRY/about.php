
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>AneTRY - Conheça AneTRY</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <link rel="stylesheet" href="css/style.css"/>
</head>
<body id="about">
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
        <a class="nav-link" href="form.php">Avaliar um Jogo</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="sua_lista.php">Sua Lista</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="about.php">Conheça AneTRY</a>
      </li>
    </ul>
  </div>
  </div>
</nav>

    <div class="conteudo">
      <!-- crio ouma classe para estilizar o nome da pagina -->
      <h1>Conheça AneTRY</h1>
        <p>Bem-vindo ao AneTRY,</p>
        <p>Ele foi pensado para ser um cantinho onde você pode estimular sua mente escrevendo, enquanto se diverte falando dos seus jogos favoritos.</p>
        <p>Fique à vontade para explorar, avaliar e, claro, se divertir!</p>
    </div>
 <!-- accordion para ficar mais bonitinho -->
<div class="accordion" id="accordionExample">

  <div class="card">
    <div class="card-header" id="headingOne">
      <h5 class="mb-0">
        <button class="btn btn-outline-rosa collapsed" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
          Sobre a Criadora
        </button>
      </h5>
    </div>
    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
      <div class="card-body">
      <p>Olá! Meu nome é Ana, tenho 20 anos e estou cursando Análise e Desenvolvimento de Sistemas na PUCPR.</p>
        <p>Sou apaixonada por games, livros e tecnologia, e criei o AneTRY para juntar essas duas paixões: escrever,</p>
        <p>criar e falar dos jogos que amo. Espero que você se divirta aqui tanto quanto eu me diverti fazendo ele.</p>
    </div>
    </div>
  </div>


  <div class="card">
    <div class="card-header" id="headingTwo">
      <h5 class="mb-0">
        <button class="btn btn-outline-rosa collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
        Sobre o Nome
        </button>
      </h5>
    </div>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
      <div class="card-body">
          <p> A ideia do nome AneTRY foi a que mais me conquistou. Tentei juntar meu nome, Ana, com a sensação de "tente novamente" que sentimos depois de</p>
          <p>morrer em um jogo.</p>
    </div>
    </div>
  </div>


  <div class="card">
    <div class="card-header" id="headingThree">
      <h5 class="mb-0">
        <button class="btn btn-outline-rosa collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
        Quer falar comigo?
        </button>
      </h5>
    </div>
    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
      <div class="card-body">
        <p>
        <a href="mailto:analu189266@gmail.com">
            <i class="fa fa-envelope"></i> analu189266@gmail.com
        </a><br></p>

        <p>
        <a href="tel:+5543991496639">
            <i class="fa fa-phone"></i> +55 43 99149-6639
        </a>
        </p>
      </div>
    </div>
  </div>
</div>



<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>
