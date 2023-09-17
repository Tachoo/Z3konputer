<?php

$db = mysqli_connect($_ENV['DB_Host'], $_ENV['DB_User'], $_ENV['DB_Pass'], $_ENV['DB_Name']);

$db->set_charset('utf8');


if (!$db) {
    echo "Error: No se pudo conectar a MySQL.";
    echo "errno de depuración: " . mysqli_connect_errno();
    echo "error de depuración: " . mysqli_connect_error();
    exit;
}
