<?php
    include_once "./includes/config.php";
    $id = $_GET['id'];
    $sql  ="SELECT * FROM task WHERE id = $id ;";
    $result = mysqli_query($link,$sql);
    $row = mysqli_fetch_assoc($result);

    

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
</head>
<body>
    <form action="./includes/editTraitement.php" method="POST" >
        <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
        <input type="text" name="taskName" id="" value="<?php echo $row['name'] ?>" >
        <input type="text" name="taskStatus" id="" value="<?php echo $row['status'] ?>">
        <button type="submit" name="submit" >Edit</button>
    </form>
</body>
</html>