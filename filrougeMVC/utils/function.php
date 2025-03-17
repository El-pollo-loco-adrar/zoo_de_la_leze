<?php
function sanitize($data){
    return htmlentities(strip_tags(stripslashes(trim($data))));
};

function DBconnect(){
    $pdo = new PDO('mysql:host=localhost;dbname=zoo','root','',array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
    $pdo->exec('SET NAMES "utf8mb4"');
    return $pdo;
}