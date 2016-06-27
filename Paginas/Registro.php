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
        <center><div class="ui header">Cadastro:</div></center> <br>

        <!-- Formulario -->
        <div class="ui form">
          <!-- Dados Cadastrais -->
          <h4 class="ui dividing header">Dados Cadastrais</h4>

          <div class="inline fields">
            <div class="eight wide field">
              <label>Nome:</label>
              <input type="text" placeholder="Primeiro nome">
            </div>
            <div class="eight wide field">
              <input type="text" placeholder="Ultimo nome">
            </div>
          </div>

          <div class="inline fields">
            <label>Login:</label>
            <div class="eight wide field">
              <input type="text" placeholder="Login" name="name" value="">
            </div>
            <label>Email: </label>
            <div class="eight wide field">
              <input type="email" placeholder="login@email.com" name="name" value="">
            </div>
          </div>

          <div class="inline fields">
              <label>Senha:</label>
              <input type="password" name="name" placeholder="Senha" value="">

          </div>

          <div class="inline fields">
            <div class="ui checkbox">
              <input type="checkbox" tabindex="0" class="">
              <label>Eu aceito os termos de uso </label>
            </div>
          </div>

          <!-- Dados Pessoais -->
          <h4 class="ui dividing header">Dados Pessoais</h4>
          <div class="inline fields">
            <label> Posição politica:</label>

            <div class="ui compact menu">
              <div class="ui simple dropdown item">
                Selecionar
                <i class="dropdown icon"></i>
                <div class="menu">
                  <div class="item">Direita</div>
                  <div class="item">Esquerda</div>
                  <div class="item">Centro</div>
                  <!-- <div class="item">Neutro</div> -->
                </div>
              </div>
            </div>
          </div>

          <div class="inline fields">
            <label>Autores Favoritos:</label>
            <input type="text" placeholder="Separe por virgula" name="name" value="">
          </div>



          <div class="inline fields ">
            <label>Descrição sobre você:</label>
          </div>
          <textarea name="name" ></textarea>



          <a href="Registro.php">
          <div class="ui  red labeled icon button">
            <i class="fire icon"></i>
            Registrar
          </div>
          </a>

          <a href="../index.html">
          <div class="ui  gray labeled icon button">
            <i class="fire extinguisher icon"></i>
            Cancelar
          </div>
        </a>

          </div>
          <!-- Formulario -->
      </div>
    </div>
  </body>
</html>
