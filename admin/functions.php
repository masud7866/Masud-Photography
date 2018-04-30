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

function get_all_photographer(){
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
