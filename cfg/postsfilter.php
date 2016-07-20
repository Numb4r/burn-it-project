<?php
/**
 * Created by PhpStorm.
 * User: MVMCJ
 * Date: 29/06/2016
 * Time: 21:37
 */


require_once '../objects/postQuery.php';
$j = new PostQuery("", "");
echo $j->getDefaultHtml();
