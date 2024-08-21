<?php
session_start();


if (session_status() == PHP_SESSION_ACTIVE) {
    echo "<h1>Aktivni sesijski podaci:</h1>";
    echo "<pre>";
    print_r($_SESSION);
    echo "</pre>";
} else {
    echo "Sesija nije aktivna.";
}
?>
