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
          <a class="item" href="../index.php">
            <i class="home icon"></i>
            Home
          </a>
          <!-- Tratar com PHP -->
          <a href="#" class="item">
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
        <div class="ui two column middle aligned very relaxed stackable grid">
            <div class="column">
              <div class="ui form">
                <div class="field">
                  <label>Login</label>
                  <div class="ui left icon input">
                    <input type="text" placeholder="Username">
                    <i class="user icon"></i>
                  </div>
                </div>
                <div class="field">
                  <label>Senha</label>
                  <div class="ui left icon input">
                    <input type="password">
                    <i class="lock icon"></i>
                  </div>
                </div>
                <div class="ui blue submit button">Logar-se</div>
              </div>
            </div>
            <div class="ui vertical divider">
              Ou
            </div>
            <div class="center aligned column">
              <a href="Registro.php">
              <div class="ui big green labeled icon button">
                <i class="signup icon"></i>
                Registrar-se
              </div>
            </a>
            </div>
          </div>
      </div>
    </div>

  </body>
</html>
