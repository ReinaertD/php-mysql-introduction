<?php

include 'connection.php';
generateUsers();

function generateUsers()
{
    $first_name = array("Geert", "Reinaert", "Sander", "Stijn", "Cath", "Claas", "David", "Jan", "Kristel", "Moumita", "Naoyuki", "Tibo", "Welid", "Adel", "Aline", "Crisse", "Danny", "Thijs", "Kevin", "Erin", "Jasper", "Jeroen", "Kasra", "Lisa", "Myle", "Nathalie", "Rico", "Shadia", "Steven", "Tabitha");
    $last_name = array("Uyttendael", "Geeraerts", "Seeuws", "Depourcq", "Coleman", "Mulemaster", "Steigschmetterling", "The Clerk", "Von Mile Gem", "Basak", "Arakawa", "Labidi", "Lallaloui", "Longnose", "Sotto", "Joosen Louise-Hartley", "Springer", "De Schoenveter", "Tabrizionales", "Cant", "Truong", "Pillpopper", "Hangkok", "Nasman", "Notens", "Bidee");
    $username = array("Gerald", "Riri", "Hackerman", "Nicet", "Catwoman", "Claazinator", "Dayvid", "Wizardio Janus", "Crystal", "Moun", "NaoTheNoa", "Tibalt", "Welder", "Van Blauw Bloed", "Alien", "CriCri", "Danners", "Thijs Off My Laptop", "KayKay", "Fucking Kiwi", "Jpop Ping", "JRoen", "GangKastra", "Shmisa", "Milli", "Funky Nathalie", "Surfboi", "Shady Ia", "Steven Jordan", "Tabi");
    $gender = array("Male", "Female");
    $password = array("test", "azerty", "qwerty", "qwerrrr", "zxc", "tret", "yiuytre", "zxcn", "erwt");
    $linkedin = array("https://www.linkedin.com/in/thijs-lambert/");
    $github = array("https://github.com/sanderdms");
    $email = array("@gangstamail.com", "@fmail.com", "@jbidy.com", "@tlam.com", "@msn.be", "@jollywolly.com");
    $pref_language = array("BE", "NL", "DE", "GB", "US", "NZ");
    $music_video = array("https://www.youtube.com/watch?v=3Xl0Qr0uXuY", "https://www.youtube.com/watch?v=7_e0CA_nhaE", "https://www.youtube.com/watch?v=JyECrGp-Sw8", "https://www.youtube.com/watch?v=2svOtXaD3gg", "https://www.youtube.com/watch?v=oq2_VHmw6DM");
    $quote = array("Ijsbergsla met kipcurry!", "Iemand heeft poepsporen achtergelaten", "Get your ass out of your poophole", "Ik ben superpopulair", "Is this a dog and pony show?", "I AM the gerbalking", "Keep on being hardcore", "Arise, communist regime!", " is de sossen ulder schuld weh", "Pioew pioew", "You're a wizard harry!");
    $quote_author = array("Socrates", "Harry Potter", "Captain Jean-Luc Picard", "Nietzsche", "Chris Pratt", "Alex Snoeper", "The Wrangler", "The impotent", "The Omnipotent", "Sunzi", "Plato", "Aristoteles", "Frankstein's Einstein");
    $created_at = date('Y-m-d');

// The for loop will make 50 users
    for ($i = 0; $i < 50; $i++) {
        $pdo = openConnection();
        $fname = randomGen($first_name);
        $lname = randomGen($last_name);
        $uname = randomGen($username);
        $gndr = randomGen($gender);
        $pwd = randomGen($password);
        $linked = randomGen($linkedin);
        $git = randomGen($github);
        $mail = randomGen($email);
        $lang = randomGen($pref_language);
        $vid = randomGen($music_video);
        $quo = randomGen($quote);
        $quoA = randomGen($quote_author);
        $sql = "INSERT INTO student ( first_name, last_name, username, password, gender, linkedin, github, email, preferred_language, video, quote, quote_author, created_at) 
            VALUES ( :first_name, :last_name,  :username, :password, :gender, :linkedin, :github, :email, :preferred_language, :video, :quote, :quote_author, :created_at)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':first_name', $fname);
        $stmt->bindParam(':last_name', $lname);
        $stmt->bindParam(':username', $uname);
        $encryptPassword = password_hash($pwd, PASSWORD_DEFAULT);
        $stmt->bindParam(':password', $encryptPassword);
        $stmt->bindParam(':gender', $gndr);
        $stmt->bindParam(':linkedin', $linked);
        $stmt->bindParam(':github', $git);
        $stmt->bindParam(':email', $mail);
        $stmt->bindParam(':preferred_language', $lang);
        // $stmt->bindParam(':avatar', "");
        $stmt->bindParam(':video', $vid);
        $stmt->bindParam(':quote', $quo);
        $stmt->bindParam(':quote_author', $quoA);
        $stmt->bindParam(':created_at', $created_at);

        $stmt->execute();
        unset($pdo);
    }
}

function randomGen($array)
{
    $random = rand(0, count($array)-1);
    $random = $array[$random];
    return $random;
}
