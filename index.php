<?php
require 'Calculator.php';
$answer = null;

$root = null;

if(isset($_POST['numbers'])){   
    $adder_obj = new Calculator();
    $answer = $adder_obj->add($_POST['numbers']);
    
}

?>
<?php 
$servername= 'xdbs5.dailyrazor.com:3306';
$username='todolist';
$password = 'Tyf9$8n8';
$errors ="";
$db= mysqli_connect($servername, $username,"",$password);

if(isset($_POST['submit'])){
    if($empty($_POST['task'])){
        $errors ="You must fill in the task ";
    }else{
        $task= $_POST['task'];
        $sql= "INSERT into task (task) VALUE ('$task')";
        mysqli_query($db,$sql);
        header('location:index.php');
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>PHP Tutorial</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div>
<h1>Simple Addition</h1>
    <form action="/" method="post">
        <input type="number" name="numbers[]" placeholder="Enter number 1" />
        <input type="number" name="numbers[]" placeholder="Enter number 2" />
        <input type="number" name="numbers[]" placeholder="Enter number 3" />
        <input type="number" name="numbers[]" placeholder="Enter number 4" />
        <input type="number" name="numbers[]" placeholder="Enter number 5" />

        <button type="submit">Submit</button>

    </form>

    <?php if($answer){?>
    <h1>The Total is <?php echo $answer?></h1>
   <?php }?>
</div>

<div>

<h1>QUADRATIC EQUATION CALCULATOR</h1>
<form action="quad.php" method="POST"> 
<input type="number" name ="a" placeholder="Enter the vale of a" />
<input type="number" name ="b"  placeholder="Enter the vale of b" />
<input type="number" name ="c"  placeholder="Enter the vale of c" />
<button type="submit" value="Find X!">Equate</button>
</form>

</div>
<div>
<h1 style="font-style:helvetica;">TODO LIST</h1>
        <form action="index.php" method = "post" class="todo_form">
         
        <input type="text" class="todo_input">
        <button type="submit" class="add_btn">Add Task</button>
        </form>  
         <?php if (isset($error)){?> 
                <p><?php echo $errors ?></p>
            <?php }         
            ?>
</div>
</body>
</html>