<?php
require_once 'class_db.php'; 

$db       = new db;
$server   = $db->get_server();
$db_name  = $db->get_db_name();
$user     = $db->get_user();
$password = $db->get_password();

try {
    $conn = new PDO("mysql:host=$server;dbname=$db_name", $user, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
catch(PDOException $e)
    {
	echo "Gagal Koneksi";
	die();
    }
?>