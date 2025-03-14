<?php
function nettoyage($data){
    return htmlentities(strip_tags(stripslashes(trim($data))));
};

function connect(){
    return new PDO('mysql:host=localhost;dbname=zoo','root','',array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
}