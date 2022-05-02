<?php

// Connect to the database. Returns a PDO object
function getDb() {
    // Local deployment
    $server = "localhost";
    $username = "mystory_user";
    $password = "secret";
    $db = "mystory"; 
    return new PDO("mysql:host=$server;dbname=$db;charset=utf8", "$username", "$password");
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

function checkUser(){
    if(isset($_POST['login']) or isset($_POST['email']) or isset($_POST['password'])){
        $requete = 'SELECT * FROM user WHERE usr_login=:login';
        $req = getDb()->prepare($requete);
        $req -> execute(array( login =>$_POST['login']));
        $tab = $req -> fetchAll();
        if($tab == null){
            return true;
        }else {
            return false;
        }
    }else {
        return false ;
    }
    
}

function logout() {
    
}

// Add a new user in the DataBase
function addNewUser(){
    $login = escape($_POST['login']);
    $email = escape($_POST['email']);
    $password = escape($_POST['password']);
    // insert user into BD
    $request  ="INSERT INTO user (usr_login,usr_email,usr_password) VALUES (?,?,?)";
    $req = getDb()->prepare($request);
    $req -> execute(array($login, $email, $password));
    // connect the new user created
    $_SESSION['login'] = $login;
}

function getAllChapter($id_story){
    $request = 'SELECT * FROM chapter WHERE ch_story_id = $id_story';
    $res  = getDb() -> query($request);
    return $res -> fetchAll();
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