<?php
$conn=mysqli_connect("localhost", "root", "", "todotask");
if(isset($_POST['submit']))
{
    $details=$_POST['submit'];
    
    for($i=0;$i<count($_POST['inn']);$i++)
    {
        $arr= $_POST['inn'][$i];
        $sql ="INSERT INTO `todo_task`(`details`) VALUES ('$arr')";
        mysqli_query($conn, $sql);
    }
    echo "<script>alert('record inserted sucessfully..');</script>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to To Do</title>
    <link rel="stylesheet" href="todostyles.css">
</head>
<body>
    <div class="container">
        <div class="todo-app">
            <h2>Our To Do Mini Project</h2>
            
            <div class="input-container">
                <input type="text" id="new-task" name="name" placeholder="Add your new task" required>
                <button id="add-task" class="add-btn">+</button>
            </div>
            <form method="POST" action="">
            <ul id="task-list"></ul>
            <div class="footer">
                <span id="pending-tasks">You have 0 pending tasks</span>
                <button id="clear-all" class="clear-btn">Clear All</button>
            </div>
            
            <div class="footer">
                <input type="submit" name="submit" value="Save Details" class="submit">
                <a href="show.php" class="show">Show Detail</a>
            </div>
            </form>
        </div>
    </div>
    <script src="todoscripts.js"></script>
</body>
</html>