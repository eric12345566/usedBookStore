<?php

require __DIR__ . '/../vendor/autoload.php';
$db = Database::get();

$password = $_POST["password"];
$check = $_POST["checkpass"];
if (!strcmp($password, $check)) {
    $result = $db->execute("SELECT * FROM USERNAME WHERE username = ? AND password = ?;", array($username, $password));

    echo "密碼已重設";
} else {
    echo "密碼不一致";
}
