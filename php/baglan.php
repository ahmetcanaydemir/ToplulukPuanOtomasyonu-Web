<?php
$servername = "localhost";
$username = "root";
$password = "root";
$database = "topluluk";

$bag = new mysqli($servername, $username, $password, $database);

if ($bag->connect_errno) {
    die("Bağlantı sorunu var lütfen daha sonra tekrar deneyin." . $bag->connect_error);
}
mysqli_set_charset($bag, "utf8");
