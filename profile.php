<?php
require 'connection.php';
$pdo = openConnection();
$stmt = $pdo->prepare("SELECT * FROM student WHERE id=:id");
$stmt->execute(['id' => $_REQUEST['id']]);
$user = $stmt->fetch();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title><?php echo "user " . $user['first_name'] . " " . $user['last_name'] ?></title>
</head>

<body class="container bg-light">
        <div class="d-flex flex-column justify-content-center text-center bg-dark text-light">
            <p>avatar placeholder</p>
            <p><?php echo $user['username'] . " #" . $user['id']; ?></p>
        </div>
        <div class="d-flex justify-content-around" >
            <div id="personalInfo">
                <p><?php echo $user['first_name'] . " " . $user['last_name']; ?> </p>
                <p><?php echo $user['gender'];  ?> </p>
                <p><?php echo $user['created_at'];  ?> </p>
            </div>
            <div id="contact">
                <p><?php echo $user['email'];  ?> </p>
                <p><?php echo $user['github'];  ?> </p>
                <p><?php echo $user['linkedin'];  ?> </p>

            </div>
        </div>
        <div class="d-flex flex-column justify-content-center text-center">
            <div id="quote">
                <p> <?php echo $user['quote']; ?></p>
                <p> <?php echo $user['quote_author']; ?></p>
            </div>
            <div id="youtube">
                <p> <?php echo $user['video']; ?> </p>
            </div> 
            <a href="index.php" class="btn btn-dark">Go Back</a>
        </div>

</body>

</html>