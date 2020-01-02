<?php
include 'connection.php';
var_dump($_POST);
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

<body>
    <div class="container">
        <form method="POST">
            <div class="d-flex justify-content-between">
                <div class="form-group d-flex flex-column">
                    <label>First name</label>
                    <input id="firstName" name="first_name" placeholder="First name" value="" required>
                    <label>Last name</label>
                    <input id="lastName" name="last_name" placeholder="Last name" value="" required>
                    <label>Username</label>
                    <input id="username" name="username" placeholder="Username" value="" required>
                    <!-- GENDER HERE -->
                    <label>Gender</label>
                    <select name="gender" required>
                        <option value="" disabled selected hidden>Select your gender</option>
                        <option value="female">Female</option>
                        <option value="male">Male</option>
                        <option value="non-Binary">Non-binary</option>
                    </select>
                </div>
                <div class="form-group d-flex flex-column">
                    <label>Linkedin account</label>
                    <input id="linkedin" name="linkedin" placeholder="Linkedin" value="">
                    <label>GitHub account</label>
                    <input id="github" name="github" placeholder="Github" value="">
                    <label>Email</label>
                    <input id="email" name="email" placeholder="Email" value="" required>
                    <label>Date of registration</label>
                    <input id="date" name="date" type="date" value="<?php echo date('Y-m-d'); ?>" readonly required/>
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
                    <input id="musicVideo" name="musicVideo" placeholder="Youtube link">
                    <!-- QUOTE HERE -->
                    <label>Favorite Quote</label>
                    <input id="quote" name="quote" placeholder="quote">
                    <input id="quoteAuthor" name="quoteAuthor" placeholder="author">
                    <!-- QUOTE AUTHOR HERE -->
                </div>
            </div>
            <button id="register" name="register">Register</button>
        </form>
    </div>
    </div>
</body>

</html>