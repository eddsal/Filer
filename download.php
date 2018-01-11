<?php
session_start();
$mysqli = new mysqli("localhost", "root", "", "filerproject");


$file = $_POST["name"];
$dir = '';

if(isset($_POST['name'])) {
    $finfo = new finfo(FILEINFO_MIME_TYPE);
    $type = $finfo->file($file); // get MIME-Type
    header("Content-Type: " . $type);
    header("Content-Disposition: attachment; filename=\"" . $file . "\"");
    readfile($dir . $file);
}
