<?php
$insert = false;
if(isset($_POST['name'])){
$server = "localhost";
$username = "root";
$password = "";

$con = mysqli_connect($server,$username,$password);

if(!$con){
    die("Database connection failed due to :".mysqli_connect_error());
}

//echo "Success in connecting with DB";

$name=$_POST['name'];
$age=$_POST['age'];
$gender=$_POST['gender'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$other=$_POST['desc'];
$sql = "INSERT INTO `srp`.`trip` (`name`, `age`, `gender`, `email`, `phone`, `other`) 
VALUES ('$name', '$age', '$gender', '$email', '$phone', '$other');";
//echo $sql;

if($con->query($sql) == true){
    //echo "Successfully Inserted..."
    $insert = true;
}
else echo "error : $sql <br> $con->error";

$con->close();
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to travel form</title>
    <link rel="stylesheet" href="style.css">
</head>
<!-- <style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    .container {
        max-width: 80%;
        background-color: grey;
        margin: auto;
    }
</style> -->

<body>
    <img class="bg" src="bg.jpg" alt="backgndimg">
    <div class="container">
        <h1>Welcome to travel form</h1>
        <p>Enter you details to participate</p>
        
        <?php
        if($insert==true){
        echo "<p class='submitmsg'>Thanks for submitting form</p>";
        }
        ?>

        <form action="index.php" method="post">
            <input type="text" name="name" id="name" placeholder="name">
            <input type="text" name="age" id="age" placeholder="age">
            <input type="text" name="gender" id="gender" placeholder="gender">
            <input type="email" name="email" id="email" placeholder="email">
            <input type="phone" name="phone" id="phone" placeholder="phone">
            <textarea name="desc" id="desc" cols="30" rows="10"
                placeholder="Enter any other information here"></textarea>
            <button class="btn">Submit</button>
        </form>
    </div>
    <script src="index.js"></script>
</body>

</html>