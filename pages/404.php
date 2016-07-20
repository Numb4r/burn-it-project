<html>
<head>
    <!-- Standard Meta -->
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

    <!-- Site Properties -->
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="../semantic/dist/semantic.css">

    <script src="../scripts/jquery.min.js"></script>
    <script src="../semantic/dist/components/form.js"></script>
    <script src="../semantic/dist/components/transition.js"></script>

    <style type="text/css">
        body {
            background-image: url('http://semantic-ui.com/images/backgrounds/3.jpg');
            background-position-x: 100%;
            background-position-y: 90%;
            overflow-y: hidden;
        }

        body > .grid {
            height: 100%;
        }

        .image {
            margin-top: -100px;
        }

        .column {
            max-width: 450px;
        }
    </style>

</head>
<?php $errors = array('1' => "Macacos roubaram a página",
    '2' => "Você não deveria esta aqui",
    '3' => "ERROR:FATAL ERROR",
    '4' => "NÃO",
    '5' => "Você foi o visitante N° 9999",
    '6' => "NEINEINEINEINEIN",
    '7' => "Página não encontrada com sucesso",
    '8' => "Está morto,JIM",
    '9' => "Visite também <a class=\"ui \" href=\" http://www.pudim.com.br/\"> http://www.pudim.com.br</a>",
    '10' => "OVNIS APPERS",
    '11' => "Talvez você tenha sorte"
);
$varnd = rand(1, 11);

?>
<body>

<div class="ui middle aligned center aligned grid">
    <div class="column">

        <h1 class="header huge" style="text-shadow: 0 1px 3px rgba(0,0,0,.5); color: #fff4e4">ERRO 404</h1>

        <div style="text-shadow: 0 1px 3px rgba(0,0,0,.5); color: #fff4e4">
            <?php echo $errors[$varnd]; ?>
        </div>
    </div>
</div>

</body>

</html>
