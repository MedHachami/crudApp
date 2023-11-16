<?php

require_once'config.php';
if(isset($_POST["submit"]) ){
    $id = $_POST["id"];

    $sql = "DELETE FROM task WHERE id = ?";
    $stmt = $link->prepare($sql);
    
   $stmt->bind_param("i",$id);

   $res = $stmt->execute();

   if($res){
    header("location:../index.php?task_status=deleted");
    exit();
   }else{
    echo "error  in insert task";
   }




}