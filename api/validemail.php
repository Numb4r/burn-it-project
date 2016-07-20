<?php
/**
 * Created by PhpStorm.
 * User: MVMCJ
 * Date: 04/07/2016
 * Time: 21:51
 */


require_once '../cfg/userfnc.php';
require_once '../objects/users.php';

UserIsLoggedIn();

echo GetCurrentUserInfo()->vBool;