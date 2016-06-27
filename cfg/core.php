<?php
/**
 * Created by PhpStorm.
 * User: MVMCJ
 * Date: 26/06/2016
 * Time: 23:34
 */

ob_start();

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}