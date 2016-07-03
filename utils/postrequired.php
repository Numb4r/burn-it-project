<?php
/**
 * Created by PhpStorm.
 * User: MVMCJ
 * Date: 01/07/2016
 * Time: 17:46
 */


function POSTRequired($List){
    foreach ($List as &$value) {
        if(!isset($_POST[$value]) || empty($_POST[$value])){
            return false;
        }
    }

    return true;
}