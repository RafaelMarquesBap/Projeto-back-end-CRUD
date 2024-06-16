
<?php

$host = "127.0.0.1";
$user = "root";
$pass = "";
$dbname = "db_Usuario";

try {
  $conn = new PDO('mysql:host=127.0.0.1;dbname=db_Usuario', $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo 'ERROR: ' . $e->getMessage();
}


?>