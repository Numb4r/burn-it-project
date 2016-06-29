<?php
/**
 * Created by PhpStorm.
 * User: MVMCJ
 * Date: 27/06/2016
 * Time: 22:29
 */

require_once '../cfg/core.php';
session_destroy();
header ("Location: ../index.php");

