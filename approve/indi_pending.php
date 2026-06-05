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
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Individual Member Certificate</title>
        <link href="css/styles.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>

        
    </head>
    <body>
        
<div class="container-fluid"> 
    <h5 class="pt-4">Individual Member</h5>
     <div class="row">
        <div class="col-md-12">
            <?php
                    // Include config file
                    require_once "config.php";
                    
                    // Attempt select query execution
                    $sql = "SELECT * FROM  individual_member WHERE satus='Pending'";
                    if($result = mysqli_query($link, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            echo "<table class='table table-bordered table-striped'>";
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th>#</th>";
                                        echo "<th>Name</th>";
                                        echo "<th>Organisation</th>";
                                        echo "<th>Email</th>";
                                        echo "<th>Join Date</th>";
                                        echo "<th>Expiry Date</th>";
                                        echo "<th>Status</th>";
                                        echo "<th>View</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                        echo "<td>" . $row['id'] . "</td>";
                                        echo "<td>" . $row['member_name'] . "</td>";
                                        echo "<td>" . $row['organisation'] . "</td>";
                                        echo "<td>" . $row['email'] . "</td>";
                                        echo "<td>" . $row['join_date'] . "</td>";
                                        echo "<td>" . $row['expiry_date'] . "</td>";
                                        echo "<td>" . $row['satus'] . "</td>";
                                        echo "<td>";
                                        
                                            echo "<a  class='text-info' href='pread.php?id=". $row['id'] ."' title='View Record' data-toggle='tooltip'><span class='far fa-eye'></span></a>";
                                            
                                        echo "</td>";
                                    echo "</tr>";
                                }
                                echo "</tbody>";                            
                            echo "</table>";
                            // Free result set
                            mysqli_free_result($result);
                        } else{
                            echo "<p class='lead'><em>No records were found.</em></p>";
                        }
                    } else{
                        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
                    }
 
                    // Close connection
                    mysqli_close($link);
                    ?>
</div>
                    <!-- <div class="col-md-3">
                        <table class="table table-bordered table-striped" style="margin-left: -31px!important;" >
                            <thead>
                                <th>Download Certificate</th>
                            </thead>
                                
                        <tbody>
                        <?php
                        $con = new PDO("mysql:host=localhost;dbname=icfhe_certificate","root","");
                        $query = "SELECT * FROM individual_member WHERE satus='Pending'";
                        $result = $con->prepare($query);
                        $result->execute();
                        if($result->rowCount())
                            
                        {
                            while ($employe = $result->fetch()) {

                                 ?>
                                <tr>
                                   <td>
                                        <a class='text-info' href="member.php?em_id=<?php echo $employe['id'];?>"><span class='fas fa-certificate'></span></a>
                                    </td>
                                    
                                </tr>
                               
                                <?php
                            
                            }
                        }
                        else {
                            echo "<br><br>Data Not Found";
                        }

                    ?>
                     </tbody>
                    </table>
                    </div>
        </div>             -->
 </div> 
 <div class="container-fluid">
     <div class="row">
        <div class="col-md-9"></div>
        <div class="col-md-3">
         <a class="btn btn-info btn-lg " style="float:right;" href="http://localhost/certificate/admin/dashboard.php">Back to Dashboard</a>
        </div>
     </div>
 </div>

 
</body>
</html>