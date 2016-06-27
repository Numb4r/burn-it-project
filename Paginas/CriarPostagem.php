<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Burn it</title>
    <link rel="stylesheet" type="text/css" href="../semantic/dist/semantic.min.css">
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script> -->
    <script src="../jquery.min.js"> </script>
    <script src="../semantic/dist/semantic.min.js"></script>
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
          <a class="item" href="../index.html">
            <i class="home icon"></i>
            Home
          </a>
          <!-- Tratar com PHP -->
          <a href="Login.php" class="item">
            Logar-se/Registrar-se <i class="icon fire"></i>
          </a>

          <!-- Tratar com PHP  -->
          <a href="CriarPostagem.php" class="item">
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
        <form class="ui form" action="index.html" method="post">
          <label>Titulo:</label>
          <input type="text" name="name" value="">
          <label>Corpo:</label>
          <textarea name="name" rows="8" cols="40"></textarea>
          <label>Categoria</label>
          <input type="text" name="name" value="">
          <label>Etiquetas</label>
          <input type="text" name="name" value="">
          <input type="submit" class="ui red button" name="name" value="Enviar">
        </form>
      </div>
    </div>
  </div>
  </body>
</html>
