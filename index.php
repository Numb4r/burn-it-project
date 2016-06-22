<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Burn it</title>
    <link rel="stylesheet" type="text/css" href="semantic/dist/semantic.min.css">
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script> -->
    <script src="jquery.min.js"> </script>
    <script src="semantic/dist/semantic.min.js"></script>
  </head>
  <body>
    <!-- Inicio menu -->
    <div class="ui inverted menu">
      <div class="item">
        <a href="#" onclick="$('.ui.sidebar').sidebar('toggle');"><i class="icon large sidebar"></i>Menu</a>
      </div>
      <div class="item">
        Atualizações  <i class="icon warning"></i>
      </div>
    </div>
      <div class="ui bottom attached pushable">
        <div style="" class="ui inverted labeled left inline vertical sidebar menu uncover ">
          <a class="item" href="index.php">
            <i class="home icon"></i>
            Home
          </a>
          <!-- Tratar com PHP -->
          <a href="Paginas/Login.php" class="item">
            Logar-se/Registrar-se <i class="icon fire"></i>
          </a>

          <!-- Tratar com PHP  -->
          <a href="Paginas/CriarPostagem.php" class="item">
          Criar uma discussão
          <i class="icon pencil"></i>
        </a>
          <a href="#" class="item">
            Discussões em alta
            <i class="icon fire"></i>
          </a>
          <a href="#" class="item">
            Procurar uma discussão
            <i class="icon search"></i>
          </a>
          <a href="#" class="item">
            Configurações
            <i class="icon settings"></i>
          </a>
        </div>
    <!--Fim menu  -->
    <div class="pusher">
      <div class="ui container">
        <!-- Container -->
        <h3>Categoria</h3>
        <div class="ui vertical menu ">
          <a href="Paginas/Postagem.php">
          <div class="item" align="center">
            <img src="imgs/1e2378a2c82d2032674ee1f0a860a2cd1e3b902b.png"  class="ui tiny image" alt="" />
            <p class="ui ">NomeDiscussao</p>
          </div>
        </a>
        </div>
        <h3>Categoria</h3>
        <div class="ui vertical menu ">
          <a href="Paginas/Postagem.php">
          <div class="item" align="center">
            <img src="imgs/1e2378a2c82d2032674ee1f0a860a2cd1e3b902b.png"  class="ui tiny image" alt="" />
            <p class="ui ">NomeDiscussao</p>
          </div>
        </a>
        </div>
    <!-- Container -->
      </div>
    </div>

  </body>
</html>
