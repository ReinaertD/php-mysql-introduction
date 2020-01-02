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

    // Why we do this here
    return $pdo;
}

try {
    $pdo = new PDO('mysql:host=localhost;dbname=becode;charset=utf8mb4', 'becode_user', 'StrongPassword');
} catch (\PDOException $e) {
    throw new \PDOException($e->getMessage(), (int) $e->getCode());
}
// $pdo = openConnection();
//    $sql = "INSERT INTO student (id,first_name, last_name, username, email, gender, preferred_language) VALUES ('2','Peterpanda', 'Parker', 'spiderman', 'peterparker@mail.com', 'spider', 'english')";    
//         $pdo->exec($sql);
//             echo "New record created successfully";
if (!empty($_POST)) {
    try {
        $pdo = openConnection();
        $form = $_POST;
        $sql = "INSERT INTO student ( first_name, last_name, username, gender, linkedin, github, email, preferred_language, video, quote, quote_author, created_at) 
            VALUES ( :first_name, :last_name,  :username, :gender, :linkedin, :github, :email, :preferred_language, :video, :quote, :quote_author, :created_at)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':first_name', $form['first_name']);
        $stmt->bindParam(':last_name', $form['last_name']);
        $stmt->bindParam(':username', $form['username']);
        $stmt->bindParam(':gender', $form['gender']);
        $stmt->bindParam(':linkedin', $form['linkedin']);
        $stmt->bindParam(':github', $form['github']);
        $stmt->bindParam(':email', $form['email']);
        $stmt->bindParam(':preferred_language', $form['pref_language']);
        // $stmt->bindParam(':avatar', "");
        $stmt->bindParam(':video', $form['musicVideo']);
        $stmt->bindParam(':quote', $form['quote']);
        $stmt->bindParam(':quote_author', $form['quoteAuthor']);
        $stmt->bindParam(':created_at', $form['date']);

        $stmt->execute();
        echo "user registered";
    } catch (PDOException $e) {
        die("error: could not execute $sql " . $e->getMessage());
    }
    unset($pdo);
}
