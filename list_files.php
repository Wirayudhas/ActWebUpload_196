<?php
$dir = "uploads/";
$files = [];

if (is_dir($dir)) {
    if ($dh = opendir($dir)) {
        while (($file = readdir($dh)) !== false) {
            if ($file != "." && $file != ".." && !is_dir($dir . $file)) {
                $files[] = $file;
            }
        }
        closedir($dh);
    }
}

header('Content-Type: application/json');
echo json_encode($files);
?>
