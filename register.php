<?php
include 'Model/connection.php';
// var_dump($_POST);
   
    var_dump($_POST);
    $first_name = $last_name = $username = $linkedin = $github = $email = $video = $quote = $quote_author = "";



if (!empty($_POST)) { 
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $username = $_POST['username'];
    $linkedin = $_POST['linkedin'];
    $github = $_POST['github'];
    $email = $_POST['email'];
    $video = $_POST['musicVideo'];
    $quote = $_POST['quote'];
    $quote_author = $_POST['quoteAuthor'];
    if (comparePassword() === true) {
        storeUser();
        header("Location: login.php");
        exit;
    } else echo '<div class="alert alert-danger"> Passwords are not the same! </div>';
}

function storeUser()
{
    try {
        $pdo = openConnection();
        $form = $_POST;
        $sql = "INSERT INTO student ( first_name, last_name, username, password, gender, linkedin, github, email, preferred_language, video, quote, quote_author, created_at) 
            VALUES ( :first_name, :last_name,  :username, :password, :gender, :linkedin, :github, :email, :preferred_language, :video, :quote, :quote_author, :created_at)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':first_name', $form['first_name']);
        $stmt->bindParam(':last_name', $form['last_name']);
        $stmt->bindParam(':username', $form['username']);
        $encryptPassword = password_hash($form['password'], PASSWORD_DEFAULT);
        $stmt->bindParam(':password', $encryptPassword);
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
        echo '<div class="alert alert-success">User Registered</div>';
    } catch (PDOException $e) {
        die("error: could not execute $sql " . $e->getMessage());
    }
    unset($pdo);
}

function comparePassword()
{
    $password = $_POST['password'];
    $password_validate = $_POST['password_validator'];

    if ($password === $password_validate) {
        return true;
    } else
        return false;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add user</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body class="bg-light">
    <div class="container">
        <div class="bg-dark text-white text-center">
            <h1> Register User </h1>
        </div>
        <form method="POST">
            <div class="d-flex justify-content-between">
                <div class="form-group d-flex flex-column">
                    <label>Username</label>
                    <input id="username" name="username" placeholder="Username" value="<?php echo $username ?>" required>
                    <label>Password</label>
                    <input type="password" id="password" name="password" placeholder="Password" value="" required>
                    <label>Re-enter password</label>
                    <input type="password" id="password_validator" name="password_validator" placeholder="Password" value="" required>


                </div>
                <div class="form-group d-flex flex-column">
                    <label>First name</label>
                    <input id="firstName" name="first_name" placeholder="First name" value="<?php echo $first_name ?>" required>
                    <label>Last name</label>
                    <input id="lastName" name="last_name" placeholder="Last name" value="<?php echo $last_name ?>" required>

                    <!-- GENDER HERE -->
                    <label>Gender</label>
                    <select name="gender" required>
                        <option value="" disabled selected hidden>Select your gender</option>
                        <option value="Female">Female</option>
                        <option value="Male">Male</option>
                        <option value="Non-Binary">Non-binary</option>
                    </select>
                </div>

                <div class="form-group d-flex flex-column">
                    <label>Linkedin account</label>
                    <input id="linkedin" name="linkedin" placeholder="Full link Linkedin" value="<?php echo $linkedin ?>" required>
                    <label>GitHub account</label>
                    <input id="github" name="github" placeholder="Full link Github" value="<?php echo $github ?>" required>
                    <label>Email</label>
                    <input id="email" name="email" placeholder="Email" value="<?php echo $email ?>" required>
                    <label>Date of registration</label>
                    <input id="date" name="date" type="date" value="<?php echo date('Y-m-d'); ?>" readonly required />
                </div>
                <div class="form-group d-flex flex-column">
                    <!-- PREFERRED LANGUAGE HERE -->
                    <label>Preferred language</label>
                    <select name="pref_language" required>
                        <option value="" disabled selected hidden>Select your language</option>
                        <option value="AF">Afrikanns</option>
                        <option value="SQ">Albanian</option>
                        <option value="AR">Arabic</option>
                        <option value="HY">Armenian</option>
                        <option value="EU">Basque</option>
                        <option value="BN">Bengali</option>
                        <option value="BG">Bulgarian</option>
                        <option value="CA">Catalan</option>
                        <option value="KM">Cambodian</option>
                        <option value="ZH">Chinese (Mandarin)</option>
                        <option value="HR">Croation</option>
                        <option value="CS">Czech</option>
                        <option value="DA">Danish</option>
                        <option value="NL">Dutch</option>
                        <option value="EN">English</option>
                        <option value="ET">Estonian</option>
                        <option value="FJ">Fiji</option>
                        <option value="FI">Finnish</option>
                        <option value="FR">French</option>
                        <option value="KA">Georgian</option>
                        <option value="DE">German</option>
                        <option value="EL">Greek</option>
                        <option value="GU">Gujarati</option>
                        <option value="HE">Hebrew</option>
                        <option value="HI">Hindi</option>
                        <option value="HU">Hungarian</option>
                        <option value="IS">Icelandic</option>
                        <option value="ID">Indonesian</option>
                        <option value="GA">Irish</option>
                        <option value="IT">Italian</option>
                        <option value="JA">Japanese</option>
                        <option value="JW">Javanese</option>
                        <option value="KO">Korean</option>
                        <option value="LA">Latin</option>
                        <option value="LV">Latvian</option>
                        <option value="LT">Lithuanian</option>
                        <option value="MK">Macedonian</option>
                        <option value="MS">Malay</option>
                        <option value="ML">Malayalam</option>
                        <option value="MT">Maltese</option>
                        <option value="MI">Maori</option>
                        <option value="MR">Marathi</option>
                        <option value="MN">Mongolian</option>
                        <option value="NE">Nepali</option>
                        <option value="NO">Norwegian</option>
                        <option value="FA">Persian</option>
                        <option value="PL">Polish</option>
                        <option value="PT">Portuguese</option>
                        <option value="PA">Punjabi</option>
                        <option value="QU">Quechua</option>
                        <option value="RO">Romanian</option>
                        <option value="RU">Russian</option>
                        <option value="SM">Samoan</option>
                        <option value="SR">Serbian</option>
                        <option value="SK">Slovak</option>
                        <option value="SL">Slovenian</option>
                        <option value="ES">Spanish</option>
                        <option value="SW">Swahili</option>
                        <option value="SV">Swedish </option>
                        <option value="TA">Tamil</option>
                        <option value="TT">Tatar</option>
                        <option value="TE">Telugu</option>
                        <option value="TH">Thai</option>
                        <option value="BO">Tibetan</option>
                        <option value="TO">Tonga</option>
                        <option value="TR">Turkish</option>
                        <option value="UK">Ukranian</option>
                        <option value="UR">Urdu</option>
                        <option value="UZ">Uzbek</option>
                        <option value="VI">Vietnamese</option>
                        <option value="CY">Welsh</option>
                        <option value="XH">Xhosa</option>
                    </select>
                    <!-- AVATAR HERE -->
                    <!-- MUSIC VIDEO LINK HERE -->
                    <label>Favorite music video(youtube)</label>
                    <input id="musicVideo" name="musicVideo" placeholder="Youtube link" value="<?php echo $video ?>" required>
                    <!-- QUOTE HERE -->
                    <label>Favorite Quote</label>
                    <input id="quote" name="quote" placeholder="quote" value="<?php echo $quote ?>" required>
                    <input id="quoteAuthor" name="quoteAuthor" placeholder="author" value="<?php echo $quote_author ?>" required>
                    <!-- QUOTE AUTHOR HERE -->
                </div>
            </div>
            <div class="d-flex  justify-content-center">
                <a href="index.php" id="return" class="m-1 btn btn-dark" name="return">Go back</a>
                <button id="register" class="btn btn-dark m-1" name="register">Register</button>
            </div>
        </form>
    </div>
</body>

</html>