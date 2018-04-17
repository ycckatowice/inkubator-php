<?php
ob_start();

session_start();

if (!isset($_SESSION['task'])) {
    $_SESSION['task'] = [
        [
            'id' => 1,
            "name" => "Dodaj nowy task",
            "isDone" => false,
            "addedDate" => date('d-m-Y H:i:s'),
            'endDate' => ''
        ],
        'dowolny' => [
            'id' => 1,
            "name" => "Dodaj nowy task",
            "isDone" => false,
            "addedDate" => date('d-m-Y H:i:s'),
            'endDate' => ''
        ],
    ];
    
}


if (isset($_POST['name'])) {

    $_SESSION['task'][] = [
        'id' => end($_SESSION['task'])['id'] + 1,
        'name' => $_POST['name'],
        'isDone' => false,
        'addedDate' => date('d-m-Y H:i:s'),
        'endDate' => ''
    ];
}

if (isset($_GET['deleteId'])) {
    echo "Delete Id: ". $_GET['deleteId'];
    foreach ($_SESSION['task'] as $taskIndex => $task) {
        if ($task['id'] == $_GET['deleteId']) {
            unset($_SESSION['task'][$taskIndex]);
            break;
        }
    }

    echo "<h1>Skasowałęś task o id: {$_GET['deleteId']}</h1>";
    //header('Location: index.php?deletedTaskId='. $_GET['deleteId']);
}

if(isset($_GET['finishId'])){
    foreach ($_SESSION['task'] as $taskIndex => $task) {
        if ($task['id'] == $_GET['finishId']) {
            $_SESSION['task'][$taskIndex]['isDone'] = true;
            $_SESSION['task'][$taskIndex]['endDate'] = date('d-m-Y H:i:s');
            break;
        }
    }
}

?>
<html>
    <head>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" 
    </head>
    <body>
        <div class="container">
            <br>
            <br>
            <form action="index.php" class="form-group" method="POST">
                Add task name:
                <input class="form-control" type="text" name="name" >
                <input class="btn btn-success btn-block" type="submit" value="Add Task">
            </form>
            <h1>Your tasks:</h1>
            <table class='table'>
                <tr>
                    <td>Name</td>
                    <td>Is Done:</td>
                    <td>Task added:</td>
                    <td>Task Finished:</td>
                    <td>Akcja</td>
                    
                </tr>
                <?php
                for($i = 0 ; $i <10; $i++){
                    
                }
                foreach ($_SESSION['task'] as $taskIndex => $task) {
                    $isDone = $task['isDone']? "True": "False";
                    echo "<tr>"
                    . "<td>{$task['name']}</td>"
                    . "<td>$isDone</td>"
                    . "<td>{$task['addedDate']}</td>"
                    . "<td>{$task['endDate']}</td>"
                    . "<td>"
                    . "<a href='?finishId={$task['id']}'>Finish</a> "
                    . "<a href='?deleteId={$task['id']}'>Skasuj</a></td>"
                    . "</tr>";
                }
                ?>
            </table>
        </div>

    </body>

</html>

<?php
ob_flush();
