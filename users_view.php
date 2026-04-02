<?php
    include "connection.php";

    if(isset($_GET['del'])){
        $id = $_GET['del'];
        $query =  "DELETE FROM users WHERE id = $id";
        $fire = mysqli_query($conn,$query);
        if($fire){
            echo "Data Deleted Successfully !";
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Admin</title>
        <link href="css/styles.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
   
</head>
<body>
   
 <div class="container-fluid">
 <h4 class="pt-4">Admin Details</h4>   
 <table class="table table-bordered  table-striped table-hover table-sm">
      <thead class="bg-info text-white">
        <th>Username</th>
        <th>Email</th>
        <th>Password</th>
        
      </thead>
  <tbody class="table-bordered">
           
        <?php
            $query2 =  "SELECT * FROM users WHERE status='Admin'";
            $fire2 = mysqli_query($conn,$query2) or die("Data not fetched from database".mysqli_error($conn));
            
            if(mysqli_num_rows($fire2)>0)
            {
                while($result =  mysqli_fetch_assoc($fire2))
                {
                    ?>
                    <tr>
                        <td><?php echo $result['username'] ?></td>
                        <td><?php echo $result['email'] ?></td>
                        <td><?php echo $result['password'] ?></td>
                        
                       
                       
                        
                    </tr>
                    <?php
                }
            }
        ?>
        </tbody>
    </table>
   </div> 
   <div class="container-fluid">
 <h4 class="pt-4">Editor Details</h4>   
 <table class="table table-bordered  table-striped table-hover table-sm">
      <thead class="bg-info text-white">
        <th>Username</th>
        <th>Email</th>
        <th>Password</th>
        <th>Delete admin</th>
      </thead>
  <tbody class="table-bordered">
           
        <?php
            $query2 =  "SELECT * FROM users WHERE status='Editor'";
            $fire2 = mysqli_query($conn,$query2) or die("Data not fetched from database".mysqli_error($conn));
            
            if(mysqli_num_rows($fire2)>0)
            {
                while($result =  mysqli_fetch_assoc($fire2))
                {
                    ?>
                    <tr>
                        <td><?php echo $result['username'] ?></td>
                        <td><?php echo $result['email'] ?></td>
                        <td><?php echo $result['password'] ?></td>
                        
                       
                        <td>
                            <a href="<?php $_SERVER['PHP_SELF'] ?>?del=<?php echo $result['id'] ?>"><i class="far fa-trash-alt text-info"></i></a>
                        </td>
                        
                    </tr>
                    <?php
                }
            }
        ?>
        </tbody>
    </table>
   </div> 
<script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/datatables-demo.js"></script>
</body>
<div class="container-fluid">
     <div class="row">
        <div class="col-md-9"></div>
        <div class="col-md-3">
         <a class="btn btn-info btn-lg " style="float:right;" href="http://localhost/certificate/admin/dashboard.php">Back to Dashboard</a>
        </div>
     </div>
 </div>
</html>