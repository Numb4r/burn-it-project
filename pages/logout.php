<?php
/**
 * Created by PhpStorm.
 * User: MVMCJ
 * Date: 27/06/2016
 * Time: 22:29
 */

setcookie("BUID", "", time() - 3600, "/");

header("Location: index.php");

