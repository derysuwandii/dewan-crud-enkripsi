<?php
define('HOST','localhost');
define('USER','root');
define('PASS','');
define('DB1', 'db_dewankomputer');

// Buat Koneksinya
$db1 = new mysqli(HOST, USER, PASS, DB1);


//Mengirimkan Token Keamanan Ajax Request (Csrf Token)
session_start();
if (empty($_SESSION['csrf_token'])) {
  $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}
?>
