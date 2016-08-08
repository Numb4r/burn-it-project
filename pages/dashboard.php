<?php
/**
 * Created by PhpStorm.
 * User: MVMCJ
 * Date: 02/07/2016
 * Time: 16:17
 */

require_once '../cfg/userfnc.php';
require_once '../objects/users.php';
require_once '../objects/postQuery.php';

if (!User::IsLoggedIn()) {
    header("Location: login.php");
}

$CurrentUser = new User(GetCurrentUserID());

if (isset($_GET["verif"]) && !empty($_GET["verif"])) {
    $key = $_GET["verif"];
    $CurrentUser->ValidateEmail($key);
}
?>


<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

    <title>Dashboard - Burnit</title>

    <link rel="stylesheet" type="text/css" href="../semantic/dist/semantic.css">
    <link rel="stylesheet" type="text/css" href="../css/dashboard.css">

    <script src="../scripts/jquery.min.js"></script>
    <script src="../react/browser.min.js"></script>
    <script src="https://fb.me/react-15.2.1.min.js"></script>
    <script src="https://fb.me/react-dom-15.2.1.min.js"></script>

</head>

<body style="background-color: #ECE5CE">

<!-- Body Dimmer -->
<div class="ui dimmer" id="bodyDimmer">
    <div class="content">
        <div class="center">
            <div class="ui text loader">Fazendo upload</div>
        </div>
    </div>
</div>

<!-- Email Modal -->
<div class="ui modal email">

    <div class="header">
        Verificação do e-mail
    </div>
    <div class="image content">
        <div class="ui medium image">
            <img src="../imgs/phoenix.png">
        </div>
        <div class="description">
            <div class="ui header">Olá <?php echo $CurrentUser->Name ?>,</div>
            <p>Verificamos que seu e-mail ainda não foi verificado, e infelizmente você não pode utilizar o site antes
                que isso aconteça, portanto por favor verifique a caixa de entrada de seu e-mail e siga as intruções
                para verificar o seu email.</p>
        </div>
    </div>
    <div class="actions">
        <label style="display: none" id="emailMessageConfirmed">Email reenviado</label>
        <div class="ui right labeled icon button" id="emailResendbutton"
             style="background-color: #556270; color: white;">
            Reenviar e-mail
            <i class="refresh icon"></i>
        </div>
    </div>
</div>

<!-- Top Menu -->
<div id="menu"></div>

<!-- Main Content -->
<div class="ui text container" style="padding-top: 80px;">
    <div class="ui segment basic">

        <!-- Side user menu-->
        <div class="ui left attached very close rail">
            <div class="ui sticky">

                <div class="ui raised card">
                    <div align="center">
                        <div class="ui medium image" id="profileImage" style="padding: 0px; ">
                            <div class="ui dimmer">
                                <div class="content">
                                    <div class="center">
                                        <div>
                                            <label for="file" class="ui basic inverted button"
                                                   id="profileimagebtn">
                                                Alterar imagem</label>
                                            <input type="file" id="file" style="display:none">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <img class="centered" src="<?php echo $CurrentUser->Image ?>"
                                 style="border-top-left-radius: 2px; border-top-right-radius: 2px;">
                        </div>
                    </div>
                    <div class="content">
                        <a href='/pages/profile.php?id=<?php echo $CurrentUser->ID ?>'
                           class="header"><?php echo $CurrentUser->Name ?></a>
                        <div class="meta">
                            <span class="date">Inscreveu-se em <?php

                                $datetime = new DateTime($CurrentUser->Date);

                                echo $datetime->format('Y') ?></span>
                        </div>
                        <div class="description" id="userDesc">
                            <script type="text/babel">
                                var UserDescription = React.createClass({
                                    getInitialState: function () {
                                        var result = this.props.children;
                                        if(result != null) {
                                            return {
                                                editing: false,
                                                hover: false,
                                                desc: result
                                            }
                                        }else{
                                            return {
                                                editing: false,
                                                hover: false,
                                                desc: "Adicione uma descrição"
                                            }
                                        }
                                    },

                                    onClick: function () {
                                        this.setState({editing: true})
                                    },

                                    onCancel: function () {
                                        this.setState({editing: false})
                                    },

                                    onSave: function () {
                                        var reactObj = this;

                                        $.ajax({
                                            type: 'POST',
                                            url: "../api/userdesc.php",
                                            data: {Desc: reactObj.refs.newdesc.value},
                                            success: function () {
                                                reactObj.setState({
                                                    editing: false,
                                                    desc: reactObj.refs.newdesc.value,
                                                    hover: false
                                                })
                                            },
                                            error: function (data) {
                                                console.log(data);
                                            }
                                        });
                                    },

                                    onMouseEnter: function () {
                                        this.setState({hover: true})
                                    },

                                    onMouseLeave: function () {
                                        this.setState({hover: false})
                                    },

                                    renderNormal: function () {
                                        return <div onMouseEnter={this.onMouseEnter}>{this.state.desc}</div>;
                                    },

                                    renderNormalToEdit: function () {
                                        return (
                                            <div onMouseLeave={this.onMouseLeave}>
                                                {this.state.desc}
                                                <i className="edit link right floated icon" onClick={this.onClick}></i>
                                            </div>);
                                    },

                                    renderEditing: function () {
                                        return (<div className="ui form">
                                            <div className="field">
                                                <textarea ref="newdesc" defaultValue={this.state.desc}></textarea>
                                            </div>
                                            <div className="two ui buttons">
                                                <button className="ui icon button" onClick={this.onCancel}>
                                                    Cancelar
                                                </button>
                                                <button className="ui right labeled icon positive button"
                                                        onClick={this.onSave}>
                                                    <i className="right checkmark icon"></i>
                                                    Salvar
                                                </button>
                                            </div>
                                        </div>);
                                    },

                                    mouseOver: function () {
                                        this.setState({hover: true});
                                    },

                                    mouseOut: function () {
                                        this.setState({hover: false});
                                    },

                                    render: function () {
                                        if (!this.state.editing) {
                                            if (this.state.hover) {
                                                return this.renderNormalToEdit();
                                            }
                                            else {
                                                return this.renderNormal();
                                            }
                                        } else {
                                            return this.renderEditing();
                                        }
                                    }
                                });

                                ReactDOM.render(
                                    <UserDescription><?php echo $CurrentUser->Description ?></UserDescription>, document.getElementById('userDesc'));
                            </script>
                        </div>
                    </div>
                    <div class="extra content">
                        <a>
                            <i class="user icon"></i>
                            22 Amigos
                        </a>
                    </div>

                    <div class="extra content">
                        <button class="ui button fluid primary labeled icon" onclick="$('#postmodal').modal('show')">
                            <i class="write icon"></i>
                            Escrever
                        </button>
                        <div style="height: 10px;"></div>
                        <a href="settings.php"
                        <button class="ui button fluid basic secondary labeled icon">
                            <i class="configure icon"></i>
                            Configurações
                        </button>
                        </a>
                    </div>

                </div>

            </div>
        </div>

        <!-- Side friends menu-->
        <div class="ui right attached very close rail" style="height: 100%">
            <div class="ui sticky">

                <div class="ui raised card">
                    <div style="margin: 10px;" align="center">
                        <h1>Amigos</h1>
                    </div>
                    <div class="content">
                        <div id="friends"></div>
                    </div>
                    <div class="extra content">
                        <a>
                            <i class="user icon"></i>
                            Ficar offline
                        </a>
                    </div>
                </div>

            </div>
        </div>

        <!-- Upload loading indicator -->
        <div id="loader" class="ui basic segment hiddenloader">
            <div class="ui active loader"></div>
        </div>

        <div class="ui one cards" id="newposts">

        </div>

    </div>
</div>

<!-- Add post modal -->
<div class="ui small modal" id="postmodal">
    <i class="close icon"></i>
    <div class="header" style="background-color: #556270; color: white;">
        Adicionar discussão
    </div>
    <form class="ui form basic segment" id="postform">
        <div class="field">
            <label> <i class="icon tag"></i>Título</label>
            <div class="ui right icon input" id="Posttitleinput">
                <input type="text" placeholder="Título" name="title" id="Posttitle">
                <i class="icon"></i>
            </div>
        </div>
        <div class="field">
            <label><i class="icon file text"></i>Descrição</label>
            <textarea name="desc" placeholder="Descrição" id="Postdesc"></textarea>
        </div>
        <div class="field">
            <label><i class="icon tags"></i>Tags</label>
            <input type="text" placeholder="Tags" id="Posttags" name="tags">
        </div>
        <div class="ui error message"></div>
        <div class="ui blue button" id="postbtn">Postar</div>
    </form>
</div>


<!-- Jquery scripts -->

<script src="../semantic/dist/semantic.js"></script>
<script src="../scripts/basic.js"></script>

<!-- Functions -->
<script type="text/javascript">
    function SubmitPostform() {
        postForm.form('validate form');
        if (postForm.form('is valid')) {
            postFormButton.addClass("loading");

            $.post("../api/post.php",
                {
                    Title: $("#Posttitle").val(),
                    Description: $("#Postdesc").val(),
                    Tags: $("#Posttags").val()
                },
                function (data, status) {
                    if (data != "3") {
                        $('.modal').modal('hide');
                        $('#postmodal').form('clear');
                        Update();
                    } else {
                        postForm.form('add errors', {
                            title: "O título inserido já está cadastrado."
                        });
                    }

                    postFormButton.removeClass("loading");
                });

        }
    }
    function SendVerificationEmail() {
        $.ajax({url: "../api/v2/api.php/user/sendemail/"});
    }
    function SubmitPhoto() {

        if ((profileImageSelector[0].files[0]) !== null) {
            var formData = new FormData();
            formData.append('arquivo', profileImageSelector[0].files[0]);

            $('#bodyDimmer').dimmer('show');

            $.ajax({
                type: 'POST',
                url: "../api/fileUpload.php",
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success: function (data) {
                    $('#bodyDimmer').dimmer('hide');
                    window.location.reload(true);
                },
                error: function (data) {
                    console.log(data);
                }
            });
        }

    }
    function Update() {

        $("#newposts").html("");
        $("#loader").removeClass("hiddenloader");
        $("#loader").addClass("loaderactive");

        $.ajax({
            url: "../cfg/postsfilter.php",
            success: function (result) {
                $("#newposts").html(result);
                $("#loader").removeClass("loaderactive");
                $("#loader").addClass("hiddenloader");
            }
        });
    }
</script>

<!-- Vars -->
<script type="text/javascript">
    var postForm = $("#postform");
    var postFormButton = $("#postbtn");
    var profileImage = $("#profileImage");
    var profileImageSelector = $('#file');
</script>

<!-- Misc -->
<script type="text/javascript">
    profileImageSelector.on('change', function (e) {
        e.preventDefault();
        SubmitPhoto();
    });
    postFormButton.click(function () {
        SubmitPostform();
    });
    postForm.form({
        fields: {
            title: {
                identifier: 'title',
                rules: [
                    {
                        type: 'empty',
                        prompt: 'Por favor coloque um título.'
                    }
                ]
            },
            desc: {
                identifier: 'desc',
                rules: [
                    {
                        type: 'minLength[10]',
                        prompt: 'Por favor escreva uma descrição de no minimo 10 caracteres.'
                    }
                ]
            },
            tags: {
                identifier: 'tags',
                rules: [
                    {
                        type: 'empty',
                        prompt: 'Por favor escreva uma tag.'
                    }
                ]
            }
        },
        keyboardShortcuts: false
    });

    $(document).on("keypress", "form", function (event) {
        if (event.keyCode == 13) {
            SubmitPostform();
        }
        return event.keyCode;
    });

    $('.ui.dropdown').dropdown({transition: 'fade down'});
    $('.main.menu').visibility({type: 'fixed'});

    $.ajax({
        url: "../api/v2/api.php/user/<?php echo $CurrentUser->ID ?>",
        success: function (data) {
            var User = data;
            if (User["vBool"] != "1") {
                $('.ui.modal.email')
                    .modal({closable: false}).modal('show')
                ;

                var emailCansend = true;
                var emailMessage = $("#emailMessageConfirmed");
                var emailSendButton = $("#emailResendbutton");

                emailSendButton.click(function () {
                    if (emailCansend) {
                        emailMessage.html("Email reenviado");
                        SendVerificationEmail();
                        emailMessage.transition('fade up');
                        emailCansend = false;

                        setTimeout(function () {
                            emailMessage.transition('fade up');
                            emailSendButton.addClass("disabled");
                        }, 1000);

                        setTimeout(function () {
                            emailCansend = true;
                            emailSendButton.removeClass("disabled");
                        }, 30000);
                    }
                });
            }
        }
    });

    var timeoutId;
    profileImage.hover(function () {
        if (!timeoutId) {
            timeoutId = window.setTimeout(function () {
                timeoutId = null;
                profileImage.dimmer("show");
            }, 1500);
        }
    }, function () {
        if (timeoutId) {
            window.clearTimeout(timeoutId);
            timeoutId = null;
        }
        else {
            profileImage.dimmer("hide");
        }
    });
    Update();
</script>


</body>
