<?php
require 'connection.php';
$pdo = openConnection();
$stmt = $pdo->query("SELECT * FROM student")->fetchAll();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>BeCode Gent Users</title>
</head>

<body class="bg-light">
    <div class="container">
        <table class="table table-striped">
            <tr class="thead-dark">
                <th>First name</th>
                <th>Last name</th>
                <th>Email</th>
                <th>Preferred Language</th>
                <th>Profile page</th>
            </tr>
            <?php
            foreach ($stmt as $row) {
                echo "<tr>";
                echo '<td>' . $row['first_name'] . '</td>';
                echo '<td>' . $row['last_name'] . '</td>';
                echo '<td>' . $row['email'] . '</td>';
                echo '<td>' . $row['preferred_language'] . '</td>';
                echo '<td><a href="profile.php?id=' . $row['id'] . '">Profile</a></td>';

                echo "</tr>";
            }
            ?>
        </table>
        <div class="d-flex justify-content-end">
            <a class="btn btn-dark" href="register.php">Register new user</a>
        </div>
    </div>
</body>

</html>