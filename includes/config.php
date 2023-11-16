<?php
define("DB_SERVER","localhost");
define("DB_USERNAME","root");
define("DB_PWD","");
define("DB_NAME","cruddb");

$link = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PWD,DB_NAME);

if($link == false){
    die("Could not connect to db");
}

$sqlCreateTask = "CREATE TABLE IF NOT EXISTS task(id INT PRIMARY KEY AUTO_INCREMENT,  name VARCHAR(255) NOT NULL, status VARCHAR(255) NOT NULL);";
$result = mysqli_query($link, $sqlCreateTask);
if(!$result){
    die("Could not create task");
}