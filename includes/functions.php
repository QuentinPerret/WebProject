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
//----------------------------------------------------
//                      User
//----------------------------------------------------
// Add a new user in the DataBase
function addNewUser(){
    $login = escape($_POST['login']);
    $email = escape($_POST['email']);
    $password = escape($_POST['password']);
    $admin = escape($_POST['admin']);
    // insert user into BD
    $request  ="INSERT INTO user (usr_login,usr_email,usr_password,usr_admin) VALUES (?,?,?,?)";
    $req = getDb()->prepare($request);
    $req -> execute(array($login, $email, $password, $admin));
    // connect the new user created
    $_SESSION['login'] = $login;
}
function getIdfromLogin($writer){
    $request = 'SELECT * FROM user WHERE usr_login = ?';
    $response = getDb() -> prepare($request);
    $response -> execute(array($writer));
    $user = $response -> fetch();
    return $user['usr_id'];
}
function getUser($user){
    $stmt = getDb() -> prepare('SELECT * FROM user WHERE usr_login = :user');
    $stmt -> execute(array(
        'user' => $user
    ));
    return $stmt->fetch();
}
//----------------------------------------------------
//                      Story
//----------------------------------------------------
function getStory($id_story){
    $stmt = getDb() -> prepare('SELECT * FROM story WHERE sto_id = :id');
    $stmt -> execute(array(
        'id' => $id_story
    ));
    $ligne = $stmt->fetch();
    return $ligne;
}
function editStory($id_story){
    $title = escape($_POST['title']);
    $description = escape($_POST['description']);
    $firstCh = escape($_POST['firstCh']);
    //update chapter into BD
    $stmt = getDb()->prepare('UPDATE story SET sto_title = :title , sto_description = :description , sto_first_ch_id = :firstCh WHERE sto_id = :id');
    $stmt -> execute(array(
        'title' => $title,
        'description' => $description,
        'firstCh' => $firstCh,
        'id' => $id_story,
    ));
}
function addBlankSto(){
    $stmt = getDb()->prepare("INSERT INTO story (sto_title,sto_description,sto_writer,sto_first_ch_id,sto_played,sto_finished) 
    VALUE (? ,? ,? ,? ,? ,?)");
    $stmt->execute(array("New Story",null,$_SESSION['login'],null,0,0));
    
}
function lastInsertStory(){
    $req = "SELECT MAX(sto_id) FROM story";
    $res = getDb() -> query($req);
    return $res ->fetch();
}
function getAllStoryForWriter($writer){
    $request = 'SELECT * FROM story WHERE sto_writer = ?';
    $response = getDb() -> prepare($request);
    $response -> execute(array($writer));
    return $response -> fetchAll();
}
function upPlayedStory($idSto){
    $story  = getStory($idSto);
    $played = $story['sto_played'] +1;
    $stmt = getDb()->prepare('UPDATE story SET sto_played = :played WHERE sto_id = :id');
    $stmt -> execute(array(
        'played' => $played,
        'id' => $idSto
    ));
}
function upfinishedStory($idSto){
    $story  = getStory($idSto);
    $played = $story['sto_finished'] + 1;
    $stmt = getDb()->prepare('UPDATE story SET sto_finished = :played WHERE sto_id = :id');
    $stmt -> execute(array(
        'played' => $played,
        'id' => $idSto
    ));
}
function delStory($idSto){
    $requete = 'DELETE FROM story WHERE sto_id=?';
    $response = getDb()->prepare($requete);
    $response->execute(array($idSto));

    $requete = 'DELETE FROM chapter WHERE ch_story_id=?';
    $response = getDb()->prepare($requete);
    $response->execute(array($idSto));

    $requete = 'DELETE FROM game WHERE game_ch=?';
    $response = getDb()->prepare($requete);
    $response->execute(array($idSto));
}
//----------------------------------------------------
//                      Chapter
//----------------------------------------------------
function addBlankCh($stoId) {
    //prepare request 
    $stmt = getDb()->prepare("INSERT INTO chapter (ch_story_id,ch_title,ch_story,end_sto) 
    VALUES (?, ?, ?, ?)");
    //set all values
    $ch_story_id = $stoId;
    $ch_title = "blank chapter";
    $ch_story = NULL;
    $end = false;
    //insert new row in db
    $stmt->execute(array($ch_story_id,$ch_title,$ch_story,$end));
}
function getAllChapter($id_story){
    $request = 'SELECT * FROM chapter WHERE ch_story_id = ?';
    $response = getDb() -> prepare($request);
    $response -> execute(array($id_story));
    return $response -> fetchAll();
}
function getAllChapterPublic(){
    $request = 'SELECT * FROM chapter'; //where sto_public ==1
    $response = getDb() -> query($request);
    return $response -> fetchAll();
}
function delCh($id){
    $requete = 'DELETE FROM chapter WHERE ch_id=?';
    $response = getDb()->prepare($requete);
    $response->execute(array($id));
}
function getCh($id_chapter){
    $stmt = getDb() -> prepare('SELECT * FROM chapter WHERE ch_id = :id');
    $stmt -> execute(array('id' => $id_chapter));
    $ligne = $stmt->fetch();
    return $ligne;
}
function editCh($id_chapter){
    $title = escape($_POST['title']);
    $story = escape($_POST['story']);
    $endSto = escape($_POST['endSto']);
    //update chapter into BD
    $stmt = getDb()->prepare('UPDATE chapter SET ch_title =:title,ch_story =:story, end_sto =:endSto  WHERE ch_id = :id');
    $stmt -> execute(array(
        'title' => $title,
        'story' => $story,
        'endSto' => $endSto,
        'id' => $id_chapter
    ));
    checkIsEndCh($id_chapter);
}
function checkIsEndCh($id_chapter){
    $links = getAllLink($id_chapter);
    if(!isset($links[0])){
        $stmt = getDb()->prepare('UPDATE chapter SET end_sto=1  WHERE ch_id = :id');
        $stmt -> execute(array('id'=> $id_chapter));
    }
    else{
        $stmt = getDb()->prepare('UPDATE chapter SET end_sto=0  WHERE ch_id = :id');
        $stmt -> execute(array('id'=> $id_chapter));
    }
}
//----------------------------------------------------
//                      Link
//----------------------------------------------------
function addNewLink($id_chapter){
    $stmt = getDb()->prepare("INSERT INTO link (link_ch,link_next) 
    VALUES (?, ?)");
    $stmt->execute(array($id_chapter,null));
}
function editAllLink($idCh){
    $chapter = getCh($idCh);
    $links = getAllLink($chapter['ch_id']); 
    foreach($links as $key=>$ligne){
        editLink($ligne['link_id'],$_POST[$ligne['link_id']]);
    }
}
function getLink($id_link){
    $request = 'SELECT * FROM link WHERE link_id = ?';
    $response = getDb() -> prepare($request);
    $response -> execute(array($id_link));
    return $response -> fetch();
}
function delLink($id){
    $requete = 'DELETE FROM link WHERE link_id=?';
    $response = getDb()->prepare($requete);
    $response->execute(array($id));
}
function getAllLink($id_chapter){
    $request = 'SELECT * FROM link WHERE link_ch = ?';
    $response = getDb() -> prepare($request);
    $response -> execute(array($id_chapter));
    return $response -> fetchAll();
}
//----------------------------------------------------
//                      Game
//----------------------------------------------------
function addNewGame($id_chapter,$id_user){
    $stmt = getDb()->prepare("INSERT INTO game (game_ch,game_user) 
    VALUES (?, ?)");
    $stmt->execute(array($id_chapter,$id_user));
    $chapter = getCh($id_chapter);
    upPlayedStory($chapter['ch_story_id']);
}
function editGame($gameId,$id_chapter){
    $stmt = getDb()->prepare("UPDATE game SET game_ch= :chapter WHERE game_id = :id");
    $stmt->execute(array(
        'chapter' => $gameId,
        'id' => $id_chapter
    ));
}
function editLink($id_link,$next_ch){
    $stmt = getDb()->prepare("UPDATE link SET link_next= :next WHERE link_id = :id");
    $stmt->execute(array(
        'next' => $next_ch,
        'id' => $id_link
    ));
}
function delGame($id){
    $game = getGame($id);
    $chapter = getCh($game['game_ch']);
    $requete = 'DELETE FROM game WHERE game_id=?';
    $response = getDb()->prepare($requete);
    $response->execute(array($id));
    upfinishedStory($chapter['ch_story_id']);
}
function lastInsertGame(){
    $req = "SELECT MAX(game_id) FROM game";
    $res = getDb() -> query($req);
    return $res ->fetch();
}
function getAllGameForUser($user){
    $idUser = getIdfromLogin($user);
    $request = 'SELECT * FROM game WHERE game_user = ?';
    $response = getDb() -> prepare($request);
    $response -> execute(array($idUser));
    return $response -> fetchAll();
}
function getGame($idGame){
    $request = 'SELECT * FROM game WHERE game_id = ?';
    $response = getDb() -> prepare($request);
    $response -> execute(array($idGame));
    return $response -> fetch();
}