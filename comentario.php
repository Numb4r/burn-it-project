<?php
/**
 * Created by PhpStorm.
 * User: MVMCJ
 * Date: 26/06/2016
 * Time: 22:13
 */ ?>

<head>
    <link rel="stylesheet" href="semantic/dist/semantic.css">
    <link rel="stylesheet" href="css/post.css">
</head>


<body>
<div class="ui container">
    <div class="ui comments">
        <h3 class="ui dividing header">Comments</h3>
        <div class="comment">
            <a class="avatar" style="height: 40px;">
                <img src="http://semantic-ui.com/images/avatar/small/matt.jpg">
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
                    <a class="reply">Reply</a>
                </div>
            </div>
        </div>
        <div class="comment">
            <a class="avatar">
                <img src="http://semantic-ui.com/images/avatar/small/matt.jpg">
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
                    <a class="reply">Reply</a>
                </div>
            </div>
            <div class="comments">
                <div class="comment">
                    <a class="avatar">
                        <img src="http://semantic-ui.com/images/avatar/small/jenny.jpg">
                    </a>
                    <div class="content">
                        <a class="author">Jenny Hess</a>
                        <div class="metadata">
                            <span class="date">Just now</span>
                        </div>
                        <div class="text">
                            Elliot you are always so right :)
                        </div>
                        <div class="actions">
                            <a class="reply">Reply</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="comment">
            <a class="avatar">
                <img src="http://semantic-ui.com/images/avatar/small/joe.jpg">
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
                    <a class="reply">Reply</a>
                </div>
            </div>
        </div>
        <form class="ui reply form">
            <div class="field">
                <textarea></textarea>
            </div>
            <div class="ui blue labeled submit icon button">
                <i class="icon edit"></i> Add Reply
            </div>
        </form>
    </div>
</div>
</body>
