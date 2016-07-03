<?php
/**
 * Created by PhpStorm.
 * User: MVMCJ
 * Date: 30/06/2016
 * Time: 23:24
 */

require_once '../cfg/databasefnc.php'

?>

<head></head>
<body>

<?php


$test = GetPostInfo("1af14575-4141-11e6-b29e-42010a800002");
echo $test->Title;

?>

</body>

