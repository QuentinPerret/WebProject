<?php

// Connect to the database. Returns a PDO object
function getDb() {
    // Local deployment
    /* $server = "localhost";
    $username = "mystory_user";
    $password = "secret";
    $db = "mystory"; */
    
    // Deployment on Heroku with ClearDB for MySQL
    $url = parse_url(getenv("CLEARDB_DATABASE_URL"));
    $server = $url["host"];
    $username = $url["user"];
    $password = $url["pass"];
    $db = substr($url["path"], 1);
    
    return new PDO("mysql:host=$server;dbname=$db;charset=utf8", "$username", "$password",
    array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}

// Check if a user is connected
function isUserConnected() {
    return isset($_SESSION['login']);
}

// Redirect to a URL
function redirect($url) {
    header("Location: $url");
}

// Escape a value to prevent XSS attacks
function escape($value) {
    return htmlspecialchars($value, ENT_QUOTES, 'UTF-8', false);
}

// Add a new user in the DataBase
function addNewUser(){
    $login = escape($_POST['login']);
    $password = escape($_POST['password']);
    // insert user into BD
    $stmt = getDb()->prepare('insert into user
    (usr_login,usr_password)
    values (?, ?, ?)');
    $stmt->execute(array($login, $password));
    // connect the new user created
    $_SESSION['login'] = $login;
    redirect("index.php");
}

// Add a new story in the DataBase
function addNewStory(){
    $title = escape($_POST['title']);
    $description = escape($_POST['description']);
    $writer  = escape($_SESSION ['login']);
    $firstCh = escape($_POST['first_ch']);

    $tmpFile = $_FILES['image']['tmp_name'];
        if (is_uploaded_file($tmpFile)) {
            // upload movie image
            $image = basename($_FILES['image']['name']);
            $uploadedFile = "images/$image";
            move_uploaded_file($_FILES['image']['tmp_name'], $uploadedFile);
        }
        // insert story into BD
        $stmt = getDb()->prepare('insert into user
        (sto_title,sto_description,sto_writer,sto_first_ch_id,sto_image)
        values (?, ?, ?, ?, ?)');
        $stmt->execute(array($title, $description, $writer, $firstCh, $image));
        redirect("editStory.php");
}

// Add a new Chapter in the DataBase
function addnewChapter(){
    $title = escape($_POST['title']);
    $story = escape($_POST['story']);
    $prevCh  = escape($_SESSION ['prevCh']);
    $nextChA = escape($_POST['nextChA']);
    $nextChB = escape($_POST['nextChB']);
    $nextChC = escape($_POST['nextChC']);
    $nextChD = escape($_POST['nextChC']);

    $tmpFile = $_FILES['image']['tmp_name'];
        if (is_uploaded_file($tmpFile)) {
            // upload movie image
            $image = basename($_FILES['image']['name']);
            $uploadedFile = "images/$image";
            move_uploaded_file($_FILES['image']['tmp_name'], $uploadedFile);
        }
        // insert chapter into BD
        $stmt = getDb()->prepare('insert into user
        (ch_title,ch_story,ch_previous_ch_id,ch_next_ch_option_A,ch_next_ch_option_B,ch_next_ch_option_C,ch_next_ch_option_D,ch_image)
        values (?, ?, ?, ?, ?, ?, ?, ?)');
        $stmt->execute(array($title, $story, $prevCh, $nextChA, $nextChB, $nextChC, $nextChD, $image));
        redirect("editStory.php");
}