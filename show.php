<?php
$conn=mysqli_connect("localhost", "root", "", "todotask");
$results = mysqli_query($conn, "SELECT * FROM todo_task");
if (isset($_GET['del'])) {
	$id = $_GET['del'];
	$sql = "DELETE FROM `todo_task` WHERE `id`='$id'";
     mysqli_query($conn, $sql);
    if(mysqli_affected_rows($conn) == 1)
	{
		
        echo '<script language="javascript">alert("Information Delete sucessfully..")</script>';
        echo '<script language="javascript">window.location = "show.php"</script>';
	}
   
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
    <h2>Our To Do Mini Project</h2> 
            <!-- <table border="1" align="center"> -->
            <table class="table1" align="center">
           <thead>
            <tr>
            <th>All Task Details</th>
            <th>ACTION</th>
           </thead>
             <?php while ($row = mysqli_fetch_array($results)) { ?>
                <td><?php echo $row['details'] ?></td>
                <td><a class="back1" href="show.php?del=<?php echo $row['id']; ?>">Delete</a></td>
                </tr>  
                <?php    
                }
                ?>
                <tr>
                    <td><a href="todoindex.php" class="back">Back</a></td>
                    <td><button id="add-task" class="add-btn1" ><a href="todoindex.php" class="add-btn1">Add</a></button></td>
            </tr>
            </form>
        </div>
    </div>
    <script src="todoscripts.js"></script>
</body>
</html>