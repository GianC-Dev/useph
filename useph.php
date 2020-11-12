<?php
if ($_POST) {
    $data = array();
    foreach ($_POST as $key => $item) {
        $str = $item;
        $str = preg_replace('/<script\b[^>]*>(.*?)<\/script>/is', "", $str);
        ob_start();
        $file_name = "useph_" . md5(random_int(100, 500)) . ".php";
        $file = fopen($file_name, "a+");
        if (strpos($str, "<?php") == false) {
            $str = "
<?php
try {
    {$str}
} catch (Throwable \$e) {
    echo \"<div style='color: red'>{\$e->getMessage()}</div>\";
}
";
        }
        fwrite($file, $str);
        $res = `php {$file_name} `;
        unlink($file_name);
        $data[] = array("key" => $key, "text" => $res);
    }
    echo json_encode($data);
    header("Content-Type: application/json");
}
