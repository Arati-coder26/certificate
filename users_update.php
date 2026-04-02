<?php
    include "connection.php";

    if(isset($_GET['upd'])){
        $id = $_GET['upd'];
        // echo $id;
        $query =  "SELECT * FROM register WHERE id = $id";
        $fire = mysqli_query($conn,$query);

        $user = mysqli_fetch_assoc($fire);
        
    }
?>

<?php
    if(isset($_POST['update']))
    {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $pass = $_POST['pass'];

        $query =  "UPDATE register SET name ='$name', email = '$email',  pass = '$pass' WHERE id = $id";
        $fire = mysqli_query($conn,$query);

        if($fire){
            header("Location:users_view.php");
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <fieldset style="width:300px;">
        <legend>User Details</legend>
        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
            Full Name:<br/>
            <input type="text" name="name" value="<?php echo $user['name']; ?>"><br>
            Email Id: <br>
            <input type="email" name="email" value="<?php echo $user['email']; ?>"><br>
            New Designation: <br>
            <input type="text" name="pass" placeholder="Password" value="<?php echo $user['pass'] ?>"><br><br>
            <!-- <input type="password" name="password" placeholder="Enter New Password" value="<?php echo $user['pass'] ?>"><br><br> -->
            <input type="submit" value="Update" name="update">
        </form>
    </fieldset>
</body>
</html>