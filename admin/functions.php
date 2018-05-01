<?php
include "config.php";
/**
 * Created by PhpStorm.
 * User: masud
 * Date: 30-Apr-18
 * Time: 09:35 PM
 */

function login($uname, $pass){
    if ($uname == config['ADMIN_USERNAME'] && md5($pass) == config['ADMIN_PASS']){
        if(setcookie("php_session","1", time()+(3600), "/")){
            return true;
        }
    }
    return false;
}

function isCookieSet(){
    return isset($_COOKIE['php_session']);
}

function add_album($album_name, $genre){
    $tmp = false;

    // Create connection
    $conn = new mysqli(config["DB_HOSTNAME"], config["DB_USERNAME"], config["DB_PASS"], config["DB_NAME"]);

    // Check connection
    if ($conn->connect_error) {
        return false;
    }
    $sql = "INSERT INTO album (name, genre) VALUES ('$album_name','$genre')";
    $result = $conn->query($sql);
    if($result == true){
        $tmp = true;
    }
    $conn->close();
    return $tmp;
}

function add_photo($file, $photographerID, $albumID, $location, $caption){
    $tmp = false;
    $check = getimagesize($file["tmp_name"]);
    $file_name = generateRandomString().".".strtolower(pathinfo(basename($file["name"]),PATHINFO_EXTENSION));
    $target_file = "../img/portfolio/" . $file_name;
    if($check !== false) {
        if (move_uploaded_file($file["tmp_name"], $target_file)) {
            $title = basename($file["name"]);

            $exif = exif_read_data($target_file, 'IFD0');
            if($exif)
            {
               $camera = strlen($exif['Model'])>10 ? $exif['Model']:$exif['Make']." ".$exif['Model'];
               $date = str_replace(":","-",explode(" ",$exif['DateTime'])[0]);
               if($date=='')
               {
                   $date = "0000-00-00";
               }
            }
            else
            {
                $camera = "";
                $date = "0000-00-00";
            }
            // Create connection
            $conn = new mysqli(config["DB_HOSTNAME"], config["DB_USERNAME"], config["DB_PASS"], config["DB_NAME"]);

            // Check connection
            if ($conn->connect_error) {
                return false;
            }
            $sql = "INSERT INTO photo (title, caption, camera, date, location, photographerID, albumID, path) VALUES ('$title','$caption','$camera','$date','$location','$photographerID','$albumID','$file_name')";
            $result = $conn->query($sql);
            if($result == true){
                $tmp = true;
            }
            else{
                unlink($target_file);
            }
            $conn->close();
        }
    }
    return $tmp;
}

function add_photographer($photographer_name, $date_of_birth, $gender){
    $tmp = false;

    // Create connection
    $conn = new mysqli(config["DB_HOSTNAME"], config["DB_USERNAME"], config["DB_PASS"], config["DB_NAME"]);

    // Check connection
    if ($conn->connect_error) {
        return false;
    }
    $sql = "INSERT INTO photographer (name, date_of_birth, gender) VALUES ('$photographer_name','$date_of_birth','$gender')";
    $result = $conn->query($sql);
    if($result == true){
        $tmp = true;
    }
    $conn->close();
    return $tmp;
}

function get_all_albums(){
    // Create connection
    $conn = new mysqli(config["DB_HOSTNAME"], config["DB_USERNAME"], config["DB_PASS"], config["DB_NAME"]);

    // Check connection
    if ($conn->connect_error) {
        return false;
    }
    $sql = "SELECT * FROM album";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        return $result->fetch_all();
    }
    $conn->close();
    return false;
}

function get_all_photographers(){
    // Create connection
    $conn = new mysqli(config["DB_HOSTNAME"], config["DB_USERNAME"], config["DB_PASS"], config["DB_NAME"]);

    // Check connection
    if ($conn->connect_error) {
        return false;
    }
    $sql = "SELECT * FROM photographer";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        return $result->fetch_all();
    }
    $conn->close();
    return false;
}


function get_all_photos(){
    // Create connection
    $conn = new mysqli(config["DB_HOSTNAME"], config["DB_USERNAME"], config["DB_PASS"], config["DB_NAME"]);

    // Check connection
    if ($conn->connect_error) {
        return false;
    }
    $sql = "SELECT * FROM photo";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        return $result->fetch_all();
    }
    $conn->close();
    return false;
}


function count_photographers(){
    // Create connection
    $conn = new mysqli(config["DB_HOSTNAME"], config["DB_USERNAME"], config["DB_PASS"], config["DB_NAME"]);

    // Check connection
    if ($conn->connect_error) {
        return false;
    }
    $sql = "SELECT COUNT(id) FROM photographer";
    $result = $conn->query($sql);
    $conn->close();
    return $result->fetch_all();
}
function count_albums(){
    // Create connection
    $conn = new mysqli(config["DB_HOSTNAME"], config["DB_USERNAME"], config["DB_PASS"], config["DB_NAME"]);

    // Check connection
    if ($conn->connect_error) {
        return false;
    }
    $sql = "SELECT COUNT(id) FROM album";
    $result = $conn->query($sql);
    $conn->close();
    return $result->fetch_all();
}

function count_photos(){
    // Create connection
    $conn = new mysqli(config["DB_HOSTNAME"], config["DB_USERNAME"], config["DB_PASS"], config["DB_NAME"]);

    // Check connection
    if ($conn->connect_error) {
        return false;
    }
    $sql = "SELECT COUNT(id) FROM photo";
    $result = $conn->query($sql);
    $conn->close();
    return $result->fetch_all();
}

function delete_album($id){
    $tmp = false;

    // Create connection
    $conn = new mysqli(config["DB_HOSTNAME"], config["DB_USERNAME"], config["DB_PASS"], config["DB_NAME"]);

    // Check connection
    if ($conn->connect_error) {
        return false;
    }
    $sql = "DELETE FROM album WHERE id = '$id'";
    $result = $conn->query($sql);
    if($result == true){
        $tmp = true;
    }
    $conn->close();
    return $tmp;
}

function delete_photographer($id){
    $tmp = false;

    // Create connection
    $conn = new mysqli(config["DB_HOSTNAME"], config["DB_USERNAME"], config["DB_PASS"], config["DB_NAME"]);

    // Check connection
    if ($conn->connect_error) {
        return false;
    }
    $sql = "DELETE FROM photographer WHERE id = '$id'";
    $result = $conn->query($sql);
    if($result == true){
        $tmp = true;
    }
    $conn->close();
    return $tmp;
}

function delete_photo($path){
    $tmp = false;
    $path = urldecode($path);
    // Create connection
    $conn = new mysqli(config["DB_HOSTNAME"], config["DB_USERNAME"], config["DB_PASS"], config["DB_NAME"]);

    // Check connection
    if ($conn->connect_error) {
        return false;
    }
    $sql = "DELETE FROM photo WHERE path = '$path'";
    $result = $conn->query($sql);
    if($result == true){
        $tmp = true;
    }
    $conn->close();
    unlink('../img/portfolio/'.$path);
    return $tmp;
}


function getPhotographerNameByID($id){
    // Create connection
    $conn = new mysqli(config["DB_HOSTNAME"], config["DB_USERNAME"], config["DB_PASS"], config["DB_NAME"]);

    // Check connection
    if ($conn->connect_error) {
        return false;
    }
    $sql = "SELECT name FROM photographer WHERE id='$id'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        return $result->fetch_all();
    }
    $conn->close();
    return false;
}

function getAlbumNameByID($id){
    // Create connection
    $conn = new mysqli(config["DB_HOSTNAME"], config["DB_USERNAME"], config["DB_PASS"], config["DB_NAME"]);

    // Check connection
    if ($conn->connect_error) {
        return false;
    }
    $sql = "SELECT name FROM album WHERE id='$id'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        return $result->fetch_all();
    }
    $conn->close();
    return false;
}


function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

function countPhotosByAlbum($id){
    // Create connection
    $conn = new mysqli(config["DB_HOSTNAME"], config["DB_USERNAME"], config["DB_PASS"], config["DB_NAME"]);

    // Check connection
    if ($conn->connect_error) {
        return false;
    }
    $sql = "SELECT COUNT(id) FROM photo WHERE albumID='$id'";
    $result = $conn->query($sql);
    $conn->close();
    return $result->fetch_all();
}

function countPhotosByPhotographer($id){
    // Create connection
    $conn = new mysqli(config["DB_HOSTNAME"], config["DB_USERNAME"], config["DB_PASS"], config["DB_NAME"]);

    // Check connection
    if ($conn->connect_error) {
        return false;
    }
    $sql = "SELECT COUNT(id) FROM photo WHERE photographerID='$id'";
    $result = $conn->query($sql);
    $conn->close();
    return $result->fetch_all();
}
