<?php
/**
 * Created by PhpStorm.
 * User: MVMCJ
 * Date: 02/07/2016
 * Time: 16:17
 */

require_once '../cfg/core.php';
require_once '../cfg/userfnc.php';
require_once '../objects/users.php';
require_once '../objects/postQuery.php';


$GetUser = new User($_GET["id"]);
$CurrentUser = GetCurrentUserInfo();

?>


<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

    <title>Dashboard - Burnit</title>

    <link rel="stylesheet" href="../semantic/dist/semantic.css">
    <link rel="stylesheet" type="text/css" href="../css/dashboard.css">
</head>

<body style="background-color: #ECE5CE">

<!-- Top Menu -->

<div id="menu"></div>
<div style="height: 50px;"></div>
<!--TODO: Bloqueio de pagina sem confirmação do usuario-->
<!-- Header -->
<div class="ui raised card  <?php $GetUser->Theme ?> " style="min-width: 100%; padding: 10px;">
    <div class="ui very relaxed  horizontal list">
        <div class="item">
            <img class="ui massive avatar image" src="<?php echo $GetUser->Image ?>">
            <div class="content">
                <div class="header"><?php echo $GetUser->Name ?>
<!--                    TODO:Mostrador de status online-->
                    <?php
//                    if($GetUser->IsLoggedIn()==true){
//                        echo "<div class=\"ui green empty circular label\"></div>";
//                    }else{
//                        echo "<div class='label red empty circular'></div>tchau";
                  //  } ?></div>

                <div class="meta">
                    <?php echo $GetUser->Email ?>
                </div>
                <div class="description">
                    <?php echo $GetUser->Description ?>
                </div>

            </div>
        </div>
        <div class="item ">
            <div class="">
<!--                TODO: Bloco com o badge em destaque,botao em js para um modal com os badges da pessoa-->

                <?php
                //print_r($GetUser->Badges);
                foreach($GetUser->Badges as &$key){
                    echo "<i class='ui circular inverted icon $key->Class $key->Color big '></i> $key->Description";
                }
                ?>
            </div>
            <a class="meta" onclick="$('.ui.modal')
        .modal('show');">
<!--                ajeitar aqui,sei mexer com js nao,bugo tudo-->
                Ver mais badges
            </a>
            <div class="ui modal">
                <div class="header">Badges</div>
                <div class="list">
                    <?php foreach ($GetUser->Badges as $key){
                        echo "<div class='item'><i class='ui circular inverted icon $key->Class $key->Color'></i> </div>" ;
                    } ?>
                </div>
            </div>
        </div>
        <div class="item right floated">
            <div class="ui blue massive circular basic label">
                <?php echo $GetUser->Level ?>
            </div>
        </div>

        <div class="item right floated">
            <div class="ui two buttons" style="padding-top: 7px;">
                <?php if($GetUser->ID != $CurrentUser->ID){ ?>
                <button class="ui green labeled icon button">
                    <i class="add user icon"></i>
                    Adicionar
                </button>
                <button class="ui red right labeled icon button">
                    <i class="ban icon"></i>
                    Bloquear
                </button>
                <?php ;}else{ ?>
                <a class="ui blue labeled icon button" href="settings.php">
                    <i class="pencil icon"></i>
                    Editar
                </a>
                <button class="ui teal right labeled icon button">
<!--                    TODO:Retira o icone de mensagens e colocar numero de mensagens não lidas-->
                    <i class="mail icon"></i>
                    Mensagens
                </button>
                <?php ;} ?>
            </div>
        </div>
    </div>
</div>

<div class="ui text container  ">
    <div class="ui basic segment" style="padding: 5px">
        <div class="ui one cards" id="posts">

        </div>
    </div>
</div>
<div class="ui text container ">
    <div class="ui basic segment " style="padding: 5px">
        <div class="ui one cards " id="posts">
<!-- wake me up
wake me up inside
cant wake up
wake me up inside
SAVVVVVVVVVVEEEEE MEEEEEE-->
        </div>

    </div>
</div>




<script src="../scripts/jquery.min.js"></script>
<script src="../semantic/dist/semantic.js"></script>
<script src="../scripts/profile/profile.js"></script>

<script type="text/javascript">
    function Update() {
        $("#posts").html("");

        $.ajax({
            url: "../cfg/postsfilter.php?u=<?php echo $GetUser->ID ?>",
            success: function (result) {
                $("#posts").html(result);
            }
        });
    }
</script>

<script>
    $(document).ready(function () {
        Update();
    });
</script>
<script>

</script>
<script src="../scripts/basic.js"></script>


</body>


