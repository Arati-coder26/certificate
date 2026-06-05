<?php include "../admin/connection.php";?>
<?php 
  session_start(); 

  if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: ../admin/login.php');
  }
  if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header("location: ../admin/login.php");
  }
?>


<?php
   
    if(isset($_GET['upd'])){
        $id = $_GET['upd'];
        // echo $id;
        $query =  "SELECT * FROM appreciation WHERE id = $id";
        $fire = mysqli_query($conn,$query);

        $user = mysqli_fetch_assoc($fire);
        
    }
?>
<?php
    if(isset($_POST['update']))
    {
        $member_name = $_POST['member_name'];
        $team_number = $_POST['team_number'];
        $organisation = $_POST['organisation'];
        /*$satus = $_POST['satus'];
*/


        $query =  "UPDATE appreciation SET member_name ='$member_name', team_number = '$team_number', organisation = '$organisation' WHERE id = $id";
        $fire = mysqli_query($conn,$query);

        if($fire){
            header("Location:../admin/members.php");
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Certificate of Appreciation</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-3"> </div>
            <div class="col-md-6"> 
                <h3 class="text-info pt-4">Certificate of Appreciation</h3><br>
                <div class="card px-4 py-3">
                <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
                    <div class="form-group">
                    <label for="exampleInputName"><small>Full Name:</small></label>
                    <input type="text" class="form-control" name="member_name" value="<?php echo $user['member_name']; ?>">
                    </div>
                    <div class="form-group">
                    <label for="exampleInputEmail"><small>Team Number:</small></label>
                    <input type="text" class="form-control" name="team_number" value="<?php echo $user['team_number']; ?>">
                    </div>
                    <div class="form-group">
                    <label for="exampleInputOrganisation"><small>Enter Organisation:</small></label>
                    <input type="text" class="form-control" name="organisation" placeholder="Organisation" value="<?php echo $user['organisation'] ?>">
                    </div>
                    
                    
                   
                    <input type="submit" class="btn btn-info" value="Update" name="update">
                </form>
                </div>
            </div>
            <div class="col-md-3"> </div>
        </div>    
    </div>
    <div class="container-fluid">
     <div class="row">
        <div class="col-md-9"></div>
        <div class="col-md-3">
         <a class="btn btn-info btn-lg " style="float:right;" href="dashboard.php">Back to Dashboard</a>
        </div>
     </div>
 </div>
</body>
</html>