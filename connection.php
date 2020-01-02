<?php

function openConnection()
{
    // Try to figure out what these should be for you
    $dbhost    = "localhost";
    $dbuser    = "becode_user";
    $dbpass    = "StrongPassword";
    $db        = "becode";

    // Try to understand what happens here 
    $pdo = new PDO('mysql:host=' . $dbhost . ';dbname=' . $db, $dbuser, $dbpass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

    // echo('<div class="alert alert-success">Satellite uplink established. Getting target coördinates.</div>');
    // Why we do this here
    return $pdo;
}

// try {
//     $pdo = new PDO('mysql:host=localhost;dbname=becode;charset=utf8mb4', 'becode_user', 'StrongPassword');
// } catch (\PDOException $e) {
//     throw new \PDOException($e->getMessage(), (int) $e->getCode());
// }

