<?php
include 'Model/connection.php';
if (isset($_POST['logout'])) {
    logOut();
}

if (isset($_POST['create'])) {
    header("Location: register.php");
    exit;
}
if (isset($_POST['login'])) {
    $pdo = openConnection();
    $stmt = $pdo->prepare("SELECT * FROM student WHERE username=:username");
    $stmt->execute(['username' => $_POST['username']]);
    $user = $stmt->fetch();

    if (password_verify($_POST['password'], $user['password'])) {
        echo "correct password";
        setcookie("loggeduser", $_POST['username']);
        header("Location: index.php");
        exit;
    } else echo '<div class="alert alert-danger">incorrect password or username</div>';
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="login.css" type="text/css">
    <title>Login</title>
</head>

<body class="bg-light">
    <div class="d-flex text-center justify-content-center bg-dark">
        <h1>Please login</h1>
    </div>
    <form id="login" method="post" class="d-flex justify-content-center">
        <div class="form-group d-flex flex-column justify-content-between">
            <input name="username" placeholder="username" <?php loggedIn("disable"); ?>>
            <input type="password" name="password" placeholder="password" <?php loggedIn("disable"); ?>>
            <div class="d-flex justify-content-around ">
                <button name="login" class="btn btn-dark" <?php loggedIn("disable"); ?>>Login</button>
                <button name="create" class="btn btn-dark" <?php loggedIn("disable"); ?>>Register</button>
                <button name="logout" class="btn btn-dark"<?php loggedIn("enable"); ?>>Logout</button>
            </div>
        </div>
    </form>
</body>

</html>