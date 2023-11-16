<?php
require_once'config.php';
if(isset($_POST["submit"]) ){
    
    $id = $_POST["id"];
    $taskname = $_POST["taskName"];
    $taskstatus = $_POST["taskStatus"];


    $sql = "UPDATE task SET name = ?, status = ? WHERE id = ?;";
    $stmt = $link->prepare($sql);
    
   $stmt->bind_param("ssi", $taskname,$taskstatus,$id);

   $res = $stmt->execute();

   if($res){
    header("location:../index.php?task_status=edited");
    exit();
   }else{
    echo "error  in insert task";
   }
}
