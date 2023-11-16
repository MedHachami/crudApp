<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .nav {
            display: flex;
            justify-content: space-around;
            align-items: center;
        }
    </style>
</head>

<body>
    <div class="nav">
        <h1>TASKS</h1>
        <a href="./addTask.php">Add new task</a>
    </div>
    <?php if (isset($_GET["task_status"]) && $_GET["task_status"] === 'added') { ?>
        <div class="alert alert-primary" role="alert">
            Task added successfully
        </div>
    <?php } else if (isset($_GET["task_status"]) && $_GET["task_status"] === 'edited') { ?>
            <div class="alert alert-primary" role="alert">
                Task edited successfully
            </div>
    <?php } ?>
    <table class="table">

        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name </th>
                <th scope="col">Status</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include_once "./includes/getTasks.php";
            $tasks = getTasks();
            if(!empty($tasks)) {
            foreach ($tasks as $task) {
                ?>
                <tr>
                    <th scope="row">
                        <?php echo $task['id'] ?>
                    </th>
                    <td>
                        <?php echo $task['name'] ?>
                    </td>
                    <td>
                        <?php echo $task['status'] ?>
                    </td>
                    <td>
                        <a href="./editTask.php?id=<?php echo $task['id'] ?>">Edit </a>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="handleDelete(<?php echo $task['id']; ?>)" >
                            Delete
                        </button>
                    </td>
                </tr>
            <?php }}else{ ?>
                <div class="alert alert-danger" role="alert">
                No data available
                </div>
            <?php } ?>
        </tbody>
    </table>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form action="./includes/deleteTraiement.php" method="POST" >
            <div class="modal-content">
                <div class="modal-header">
                    <input type="hidden" name="id" id="taskId">
                    <h5 class="modal-title" id="exampleModalLabel">Are you sure you want to delete this ?</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                    <button type="submit" name="submit" class="btn btn-primary">Yes</button>
                </div>
            </div>
            </form>
            
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        var myModal = document.getElementById('myModal')
        var myInput = document.getElementById('myInput')

        myModal.addEventListener('shown.bs.modal', function () {
            myInput.focus()
        })

    function handleDelete(id){
        
        document.getElementById("taskId").value = id;

    }
    </script>
</body>

</html>