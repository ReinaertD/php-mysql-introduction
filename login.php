<?php
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
    <form id="login" class="d-flex justify-content-center">
        <div class="form-group d-flex flex-column justify-content-between">
            <input name="username" placeholder="username">
            <input name="password" placeholder="password">
            <button name="login" class="btn btn-dark">Login</button>

        </div>
    </form>    
</body>
</html>