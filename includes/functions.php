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

    if(isset($_POST['login']) and isset($_POST['email']) and isset($_POST['password'])){
        $requete = 'SELECT * FROM user WHERE usr_login=:login';
        $req = getDb()->prepare($requete);
        $req -> execute(array('login' => $_POST['login']));
        $tab = $req -> fetchAll();
        if($tab == null){
            return true;
        }else {
            return false;
        }
    }else {
        return false ;
    }
    return (isset($_POST['login']) or isset($_POST['email']) or isset($_POST['password']));
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
    $request = 'SELECT * FROM chapter WHERE ch_story_id = ?';
    $response = getDb() -> prepare($request);
    $response -> execute(array($id_story));
    return $response -> fetchAll();
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
//Create a new chapter with nothing in 
function addBlankCh() {
    //prepare request 
    $stmt = getDb()->prepare("INSERT INTO chapter (ch_story_id,ch_title,ch_story,ch_next_ch_option_A,ch_next_ch_option_B,ch_next_ch_option_C,ch_next_ch_option_D,ch_image) 
    VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    //set all values
    $ch_story_id = 1;
    $ch_title = "blank chapter";
    $ch_story = NULL;
    $ch_next_ch_option_A = NULL;
    $ch_next_ch_option_B = NULL;
    $ch_next_ch_option_C = NULL;
    $ch_next_ch_option_D = NULL;
    $ch_image = NULL;
    //insert new row in db
    $stmt->execute(array($ch_story_id,$ch_title,$ch_story,$ch_next_ch_option_A,$ch_next_ch_option_B,$ch_next_ch_option_C,$ch_next_ch_option_D,$ch_image));
}
function delCh($id){
    $requete = 'DELETE FROM chapter WHERE ch_id=?';
    $response = getDb()->prepare($requete);
    $response->execute(array($id));
}

// Add a new Chapter in the DataBase
function editStory($id_story){
    $title = escape($_POST['title']);
    $description = escape($_POST['description']);
    //update chapter into BD
    $stmt = getDb()->prepare('UPDATE story SET sto_title = :title , sto_description = :description WHERE sto_id = :id');
    $stmt -> execute(array(
        'title' => $title,
        'description' => $description,
        'id' => $id_story
    ));
}

function getStory($id_story){
    $stmt = getDb() -> prepare('SELECT * FROM story WHERE sto_id = ?');
    $res =  $stmt -> execute(array($id_story));
    return $res;
}

function isUserInDb(){
    if (!empty($_POST['login']) and !empty($_POST['password'])) {
        $login = $_POST['login'];
        $password = $_POST['password'];
        $stmt = getDb()->prepare('SELECT * FROM user WHERE usr_login=? AND usr_password=?');
        $stmt->execute(array($login, $password));
        if ($stmt->rowCount() == 1) {
            // Authentication successful
            $_SESSION['login'] = $login;
            redirect("index.php");
        }
        else {
            $error = "Utilisateur non reconnu";
        }
    }
}