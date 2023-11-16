<?php
function getTasks(){
    require_once("config.php");
    $tasks = [];
    $sql = "SELECT * FROM task  ;";
    $resu = $link->query($sql);

    if(mysqli_num_rows($resu) > 0){
        while($row = $resu->fetch_assoc()){
            $tasks[] = $row;
        }
    }

    return $tasks;
}

