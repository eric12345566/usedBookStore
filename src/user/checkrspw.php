<?php

require __DIR__ . '/../vendor/autoload.php';
$db = Database::get();

$password = $_POST["password"];
$check = $_POST["checkpass"];
if (!strcmp($password, $check)) {
    echo "密碼已重設";
} else {
    echo "密碼不一致";
}
