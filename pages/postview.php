<?php

require_once ('../cfg/userfnc.php');
require_once('../objects/users.php');
require_once('../objects/post.php');

UserIsLoggedIn();

global $Post;
global $PComLimit;

$PComLimit = 5;

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $Post = new Post($_GET['id']);
} else {
    header("Location: 404.php");
}

?>

<head>
    <title>Post - Burnit</title>

    <link rel="stylesheet" href="../semantic/dist/semantic.css">
    <link rel="stylesheet" href="../css/post.css">
</head>


<body style="background-color: #ECE5CE">

<!-- Top Menu -->
<div id="menu"></div>

<div style="height: 60px;"></div>

<div class="ui raised very padded text container segment" style="max-width: 900px; min-height: 85%">
    <div class="ui middle aligned divided list">
        <div class="item">
            <div class="right floated content">
                <div class="ui basic buttons">
                    <button class="ui icon button" data-content="Adicionar aos favoritos"><i
                            class="align heart icon"></i></button>
                    <button class="ui icon button" data-content="Denunciar discussão"><i
                            class="align fire extinguisher icon"></i></button>
                </div>
            </div>
 
            <img class="ui avatar image" id="imageYurio" src=<?php echo $Post->User->Image?> data-html='
            <div class="ui card">
  <div class="image">
    <img src=<?php echo $Post->User->Image?>>
  </div>
  <div class="content">
    <a class="header"><?php echo $Post->User->Name ?></a>
    <div class="meta">
      <span class="date"><?php echo $Post->User->Date ?></span>
    </div>
    <div class="description">
      <?php echo $Post->User->Email; ?>
    </div>
  </div>
  <div class="extra content">
    <a>
      <i class="user icon"></i>
      <?php //Numeros de amigos do criador do postecho query($Pdo)->"Select count(friends) form <?php $post->GetUser()"?>
    </a>
  </div>
</div>'>


            <div class="content">
                <?php echo $Post->User->Name; ?>
            </div>

            <div class="ui icon buttons middle aligned">
                <button class="ui icon button basic" data-content="Adicionar como amigo"><i
                        class="align add user icon"></i></button>
                <button class="ui icon button basic" data-content="Denunciar usuário"><i
                        class="align fire extinguisher icon"></i></button>
                <button class="ui icon button basic" data-content="Bloquear usuário"><i
                        class="align remove icon"></i>
                </button>
            </div>
        </div>
    </div>

    <p><?php echo $Post->Description; ?></p>
</div>


<script src="../scripts/jquery.min.js"></script>
<script src="../semantic/dist/semantic.js"></script>
<script src="../scripts/post.js"></script>
<script src="../scripts/menu.js"></script>
<script src="../scripts/basic.js"></script>
</body>
