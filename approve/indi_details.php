<?php
// Check existence of id parameter before processing further
if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
    // Include config file
     require_once "config.php";
                    
    // Prepare a select statement
    $sql = "SELECT * FROM individual_member WHERE id = ?";
    
    if($stmt = mysqli_prepare($link, $sql)){
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "i", $param_id);
        
        // Set parameters
        $param_id = trim($_GET["id"]);
        
        // Attempt to execute the prepared statement
        if(mysqli_stmt_execute($stmt)){
            $result = mysqli_stmt_get_result($stmt);
    
            if(mysqli_num_rows($result) == 1){
                /* Fetch result row as an associative array. Since the result set
                contains only one row, we don't need to use while loop */
                $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                
                // Retrieve individual field value
                $member_name = $row["member_name"];
                $email = $row["email"];
                $dob = $row["dob"];
                $designation = $row["designation"];
                $country = $row["country"];
                $organisation = $row["organisation"];
                $join_date = $row["join_date"];
                $expiry_date = $row["expiry_date"];
                $issue_date = $row["issue_date"];
            } else{
                // URL doesn't contain valid id parameter. Redirect to error page
                header("location: error2.php");
                exit();
            }
            
        } else{
            echo "Oops! Something went wrong. Please try again later.";
        }
    }
     
    // Close statement
    mysqli_stmt_close($stmt);
    
    // Close connection
    mysqli_close($link);
} else{
    // URL doesn't contain id parameter. Redirect to error page
    header("location: error.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Record</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>

    <style type="text/css">
        .wrapper{
            width: 500px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 card">
                    <div class="page-header ">
                        <h1>View Record</h1>
                    </div>
                    <table>
                        <tr>
                    <div class="form-group">
                        <label>Name</label>
                        <p class="form-control-static"><?php echo $row["member_name"]; ?></p>
                    </div>
                   </tr>
                    <div class="form-group">
                        <label>Email</label>
                        <p class="form-control-static"><?php echo $row["email"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Dob</label>
                        <p class="form-control-static"><?php echo $row["dob"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Designation</label>
                        <p class="form-control-static"><?php echo $row["designation"]; ?></p>
                    </div>
                     <div class="form-group">
                        <label>Organisation</label>
                        <p class="form-control-static"><?php echo $row["organisation"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Join Date</label>
                        <p class="form-control-static"><?php echo $row["join_date"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Expiry Date</label>
                        <p class="form-control-static"><?php echo $row["expiry_date"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Issue Date</label>
                        <p class="form-control-static"><?php echo $row["issue_date"]; ?></p>
                    </div>
                    <p><a href="indi_approve.php" class="btn btn-primary">Back</a></p>
                </div>
                </table>
            </div>        
        </div>
    </div>
     
</body>
</html>