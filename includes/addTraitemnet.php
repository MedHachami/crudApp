<?php

if(isset($_POST['submit'])){
    require_once'config.php';

    $taskname = $_POST['task_name'];
    $taskstatus = $_POST['task_status'];

   $sql = "INSERT INTO task (name,status) VALUES (?,?);";
   $stmt = $link->prepare($sql);
    
   $stmt->bind_param("ss", $taskname,$taskstatus);

   $res = $stmt->execute();
   if($res){
    header("location:../index.php?task_status=added");
    exit();
   }else{
    echo "error  in insert task";
   }
   
}
else{
    echo "error in submit form";
}