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
    <div class="ui inverted fixed menu">
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
    <div class="pusher" >
      <br><br><br><br>
      <div class="ui container" >
        <!-- Primeiro grid -->
        <div class="ui grid">
          <!-- Menu do perfil -->
          <div class="four wide column">
            <div class="ui vertical menu">
              <div class="item" align="center">
                <img src="../imgs/1e2378a2c82d2032674ee1f0a860a2cd1e3b902b.png"  class="ui tiny image" alt="" />
                <p class="ui ">NomePerfil</p>
              </div>
              <div class="item">
                <div class="menu">
                  <a class="item">Seguir NomePerfil <i class="icon add user"></i></a>
                  <a class="item">Bloquear NomePerfil <i class="icon remove"></i></a>
                  <a class="item">Denunciar NomePerfil <i class="icon fire extinguisher"></i></a>
                </div>
              </div>
              <a class="item">
                <i class="grid layout icon"></i> Ver outras discussões
              </a>
              <a class="item">
                Messanges <i class="icon mail"></i>
              </a>
            </div>
          </div>
          <!-- Menu perfil -->

          <!-- Texto da discussao -->
            <div class="eight wide column">
              <div class="" align="center"><h1>TituloDiscussão</h1></div>
              <div class="ui disabled header" align="center">
                <h5>CategoriaDiscussao</h5>
              </div>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.

                  <!-- <img src="../imgs/1e2378a2c82d2032674ee1f0a860a2cd1e3b902b.png"  class="ui small image" alt="" /> -->

                  <!-- <img src="../imgs/1e2378a2c82d2032674ee1f0a860a2cd1e3b902b.png"  class="ui small image" alt="" /> -->

            </div>
            <!-- Menu Discussao -->
            <div class="four wide column">
              <div class="ui vertical menu ">
                <div class="item" align="center">
                  <img src="../imgs/1e2378a2c82d2032674ee1f0a860a2cd1e3b902b.png"  class="ui tiny image" alt="" />
                  <p class="ui ">NomeDiscussao</p>
                </div>
                <div class="item">
                  <div class="menu">
                    <!-- <a class="item"> <i class="icon remove"></i></a> -->
                    <a class="item">Adicionar aos favoritos <i class="icon heart"></i></a>
                    <a class="item">Denunciar Discussao <i class="icon fire extinguisher"></i></a>
                  </div>
                </div>
                <a class="item">
                  <i class="grid layout icon"></i>Ver outras discussões do mesmo tema
                </a>

              </div>
            </div>
            </div>
          <!-- Menu Discussao   -->
            <!-- Texto da discusssao -->
          <!-- Primeiro grid -->
          <!-- Grid 2 -->
          <div class="ui grid">
            <!-- Comentarios 1 -->
            <div class="eight wide column">
              <div class="ui comments">
                <h3 class="ui dividing header" >A Favor</h3>
                <div class="ui favor">
                <div class="comment">
                  <a class="avatar">
                    <img src="../imgs/1e2378a2c82d2032674ee1f0a860a2cd1e3b902b.png">
                  </a>
                  <div class="content">
                    <a class="author">Matt</a>
                    <div class="metadata">
                      <span class="date">Today at 5:42PM</span>
                    </div>
                    <div class="text">
                      How artistic!
                    </div>
                    <div class="actions">
                      <a class="reply"><i class="icon  link green smile"></i></a><a class="reply"><i class="icon link red frown"></i></a><a href="Comentario.php" class="reply"><i class="comment icon"></i> Responder</a>
                    </div>
                  </div>
                </div>
                <div class="comment">
                  <a class="avatar">
                    <img src="../imgs/1e2378a2c82d2032674ee1f0a860a2cd1e3b902b.png">
                  </a>
                  <div class="content">
                    <a class="author">Elliot Fu</a>
                    <div class="metadata">
                      <span class="date">Yesterday at 12:30AM</span>
                    </div>
                    <div class="text">
                      <p>This has been very useful for my research. Thanks as well!</p>
                    </div>
                    <div class="actions">
                      <a class="reply"><i class="icon  link green smile"></i></a><a class="reply"><i class="icon link red frown"></i></a><a href="Comentario.php" class="reply"><i class="comment icon"></i> Responder</a>
                    </div>
                  </div>

                </div>
                <div class="comment">
                  <a class="avatar">
                    <img src="../imgs/1e2378a2c82d2032674ee1f0a860a2cd1e3b902b.png">
                  </a>
                  <div class="content">
                    <a class="author">Joe Henderson</a>
                    <div class="metadata">
                      <span class="date">5 days ago</span>
                    </div>
                    <div class="text">
                      Dude, this is awesome. Thanks so much
                    </div>
                    <div class="actions">
                      <a class="reply"><i class="icon  link green smile"></i></a><a class="reply"><i class="icon link red frown"></i></a><a href="Comentario.php" class="reply"><i class="comment icon"></i> Responder</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
                <button type="button" class="ui red button" align="center"  name="button">Ver mais comentarios</button>
                      </div>
                      <!-- Comentarios 1 -->

                          <!-- Comentarios 2 -->
                          <div class="eight wide column">
                            <div class="ui comments">
                <h3 class="ui dividing header" >Contra</h3>
                <div class="ui contra">


                <div class="comment">
                  <a class="avatar">
                    <img src="../imgs/1e2378a2c82d2032674ee1f0a860a2cd1e3b902b.png">
                  </a>
                  <div class="content">
                    <a class="author">Matt</a>
                    <div class="metadata">
                      <span class="date">Today at 5:42PM</span>
                    </div>
                    <div class="text">
                      How artistic!
                    </div>
                    <div class="actions">
                      <a class="reply"><i class="icon  link green smile"></i></a><a class="reply"><i class="icon link red frown"></i></a><a href="Comentario.php" class="reply"><i class="comment icon"></i> Responder</a>
                    </div>
                  </div>
                </div>
                <div class="comment">
                  <a class="avatar">
                    <img src="../imgs/1e2378a2c82d2032674ee1f0a860a2cd1e3b902b.png">
                  </a>
                  <div class="content">
                    <a class="author">Elliot Fu</a>
                    <div class="metadata">
                      <span class="date">Yesterday at 12:30AM</span>
                    </div>
                    <div class="text">
                      <p>This has been very useful for my research. Thanks as well!</p>
                    </div>
                    <div class="actions">
                      <a class="reply"><i class="icon  link green smile"></i></a><a class="reply"><i class="icon link red frown"></i></a><a href="Comentario.php" class="reply"><i class="comment icon"></i> Responder</a>
                    </div>
                  </div>

                </div>
                <div class="comment">
                  <a class="avatar">
                    <img src="../imgs/1e2378a2c82d2032674ee1f0a860a2cd1e3b902b.png">
                  </a>
                  <div class="content">
                    <a class="author">Joe Henderson</a>
                    <div class="metadata">
                      <span class="date">5 days ago</span>
                    </div>
                    <div class="text">
                      Dude, this is awesome. Thanks so much
                    </div>
                    <div class="actions">
                      <a class="reply"><i class="icon  link green smile"></i></a><a class="reply"><i class="icon link red frown"></i></a><a href="Comentario.php" class="reply"><i class="comment icon"></i> Responder</a>
                    </div>
                  </div>
                </div>
              </div>
              <br>
                  <button type="button" class="ui red button" align="center"  name="button">Ver mais comentarios</button>
              </div>
            </div>
            <!-- Comentarios 2 -->
          </div>
          <!-- Grid 2 -->
          <div class="" align="center">
            <button type="button" class="ui primary button"  onclick="$('.ui.modal').modal('show');"name="button">Escrever comentario</button>
            <div class="ui modal">
  <div class="header">Comentario:</div>
  <div class="content">
    <form class="ui form" action="index.html" method="post">
      <textarea name="name" placeholder="Comentario"></textarea>
    </form>
  </div>
  <div class="actions">
    <a href="#" class="ui cancel green button" onclick="$('.favor').dimmer('show');$('.contra').dimmer('hide');">Favor</a>
    <!-- <div class="ui cancel button">Neutral</div> -->

    <a href="#" class="ui cancel red button" onclick="$('.contra').dimmer('show');$('.favor').dimmer('hide');">Contra</a>
    <div class="ui cancel button"> Cancelar</div>
  </div>
</div>
          </div>
</div>
</div>
</div>




  </body>
</html>
