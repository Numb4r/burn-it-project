/**
 * Created by MVMCJ on 01/07/2016.
 * API DOCUMENTATION
 */


// function post($Title, $Desc, $Tag) {
//     $.post("post.php",
//         {
//             Title: $Title,
//             Description: $Desc,
//             Tags: $Tag
//         },
//         function (data, status) {
//             return array(data, status);
//         });
// }
//
// function login($user, $pass) {
//     $.post("login.php",
//         {
//             User: $user,
//             Pass: $pass
//         },
//         function (data, status) {
//             return data;
//         });
// }
//
// function register($user, $pass, $realname) {
//     $.post("register.php",
//         {
//             User: $user,
//             Pass: $pass,
//             Realname: $realname
//         },
//         function (data, status) {
//             return array(data, status);
//         });
// }

$("#hello").click(function () {

    $.post("login.php",
        {
            User: "juninhowblu@gmail.com",
            Pass: "88134165"
        },
        function (data, status) {
            alert(data);
        });

});