<?php
if ($_POST) {
    $data = array();
    foreach ($_POST as $key => $item) {
        $str = $item;
        $str = preg_replace('/<script\b[^>]*>(.*?)<\/script>/is', "", $str);
        ob_start();
        eval($str);
        $res = ob_get_contents();
        ob_end_clean();
        $data[] = array("key" => $key, "text" => $res);
    }
    echo json_encode($data);
    header("Content-Type: application/json");
}
