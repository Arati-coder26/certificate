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
// Check existence of id parameter before processing further
if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
    // Include config file
    require_once "config.php";
    
    // Prepare a select statement
    $sql = "SELECT * FROM institutional_member WHERE id = ?";
    
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
                $organisation_name = $row["organisation_name"];
                $email = $row["email"];
                $satus = $row["satus"];
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
<html>
<head>
    <title>Certificate</title>
    <link href="css/styles.css" rel="stylesheet" />
       <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>

    <style type="text/css">
                .rounded {
                border-radius: 2.5rem!important;
            }
               .ic{
                background-image: url("images/background_img.jpg");
                background-repeat: no-repeat;
                background-size: cover;
                background-size: 1366px 215px;
               }
               .card-body {
                padding: 0.25rem!important;
           }

           #share-buttons img { width: 35px; padding: 5px; border: 0; box-shadow: 0; display: inline; }
 
    </style>
</head>
<body>
<div class="container-fluid ic py-1">
    <div class="text-white py-5 ml-5">
        <h1>InnovatioCuris<br>
        <span class="text-warning">membership's</span> certificate</h1>
    </div>  
</div>
<div class="container-fluid">
    <div class="px-5">
        <h4 class="text-dark"><strong>Title/Heading</strong></h4>
        <p>The IC InnovatorCLUB (IC)2 is a global network of healthcare innovators and aims to have members hailing not only from India but also across the globe. (IC)2 aims to connect some of the top leaders in healthcare for knowledge and skill sharing and create a nurturing environment where members can further enhance their skills.</p>
    </div>  
</div>
<div class="container pt-5">
    <div class="row">
        <div class="col-md-2"></div>
    
        <div class="col-md-8 ">
            <div class="card box-shadow rounded center shadow  ">
                  <img src="images/header.png" class="card-img-top" alt="...">
                  <div class="card-body text-center">
                    <h5 class="card-title py-1">
                        <div class="form-group">
                        <h3 class="form-control-static text-uppercase" style="font-size: 1.7rem;"><?php echo $row["organisation_name"]; ?></h3>
                        <hr class="bg-warning" style="width:50%;">
                        <small class="text-muted" style="font-size:17px;">Member of IC InnovatorClub</small>
                    </div>
                    </h5>
                    
                  </div>
                  
                  <div class="card-body">
                    <div class="row">
                    <div class="col-md-6 mt-5" style="padding-left: 3.5rem!important; padding-top: 2rem;"> Issue Date: 
                       <b>
                        <?php echo $row["issue_date"]; ?>
                       </b>
                    </div>
                    <div class="col-md-6 text-center">
                        <img src="images/signature.jpg" alt="..." class="align-right" style="width:100px;">
                        <hr style="width:70%;">
                        <h5 style="margin-top:-9px;"><b>V K Singh</b></h5>
                        <p class="text-muted" style="margin-top:-8px;font-size:13px;">Managing Director of InnovatioCuris</p>
                    </div>
                  </div>
                </div>
           </div>
        </div>
        <div class="col-md-2"></div>
    </div>    
</div>

<div class="container py-5">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="row">
                <div class="col-md-4">
                 
                 <a class="btn btn-dark btn-lg rounded-pill" href="insti_member.php?em_id=<?php echo $row['id'];?>" download="insti_member.php?em_id=<?php echo $row['id'];?>"><i class="fas fa-download"></i>&nbsp; &nbsp;<small>Download Certificate</small></a>
                  
                </div>
                <div class="col-md-8 border center pt-3">
                    <form action="" method="POST" >
                               <div class="row">
                                <div class="col-md-9 align-middle">
                                <div class="col form-group">
                                     <input type="url" class="form-control" name="url" value='<?php echo getFullURL();?>' id="myInput" placeholder="Url" style="border: 0px solid #ced4da!important; font-size:14px;">

                                
                                </div>
                               </div>
                               <div class="col-md-3 text-align:right">
                                   <input class="btn btn-warning rounded-pill font-weight-bold" type="submit" onclick="myFunction()" value="Copy Link" name="submit" style="font-size:13px;">
                               </div>
                                </div>
                            </form>
                        
                                    <?php include "connection.php";?>
                                    <?php
                                      
                                        if(isset($_POST['submit']))
                                        {
                                            $url = $_POST['url'];
                                           
                                         
                                          if(empty(trim($url))){
                                                echo "Select the Url";
                                            }

                                            
                                           else{   
                                                $query =  "INSERT INTO url(url) VALUES('$url')";
                                                $fire = mysqli_query($conn,$query);
                                                if($fire){
                                                  
                                                    echo "";
                                                   
                                                }
                                            }
                                        }
                                    ?>    
      
                            <?php
                                
                                 function getFullURL(){

                                    $protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443)? "https://" : "http://";
                                    $host = $_SERVER['HTTP_HOST'];
                                    $uri = $_SERVER['REQUEST_URI'];
                                    return $protocol.$host.$uri;
                                 }
                            ?>
                           
                        </div>
       
               
            </div>
        </div>
        <div class="col-md-2"></div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-6"></div>
        <div class="col-md-4" style="margin-top:-32px!important;">
            <div class="row" >
                <div class="col-md-7 text-left" >
                      <p style="margin-left: -132px!important;"><b style="font-size: 13px;">Share this Certificate</b></p>        
                </div>
                <div class="col-md-5">
                    <div id="share-buttons" > <!-- Facebook --> <a href="https://www.facebook.com/sharer.php?u=https://www.icfhe.in" target="_blank"><img src="https://4.bp.blogspot.com/-raFYZvIFUV0/UwNI2ek6i3I/AAAAAAAAGSA/zs-kwq0q58E/s1600/facebook.png" alt="Facebook" /></a> <!-- Twitter --> <a href="https://twitter.com/share?url=https://www.icfhe.in/&text=Simple Share Buttons" target="_blank"><img src="https://4.bp.blogspot.com/--ISQEurz3aE/UwNI4hDaQMI/AAAAAAAAGS4/ZAgmPiM9Xpk/s1600/twitter.png" alt="Twitter" /></a> <!-- LinkedIn --> <a href="https://www.linkedin.com/shareArticle?mini=true&url=https://www.icfhe.in" target="_blank"><img src="https://2.bp.blogspot.com/-3_cATk7Wlho/UwNI3eoTTLI/AAAAAAAAGSQ/Y8cpq6S-SeQ/s1600/linkedin.png" alt="LinkedIn" /></a> </div>
               
            </div>
        </div>
        <div class="col-md-2 py-5"></div>
    </div>
   <!--  <div class="container-fluid py-4">
     <div class="row">
        <div class="col-md-9"></div>
        <div class="col-md-3">
         <a class="btn btn-info btn-lg " style="float:right;" href="../admin/dashboard.php">Back to Dashboard</a>
        </div>
     </div>
 </div> -->
</body>
<script type="text/javascript">
    function myFunction() {
  /* Get the text field */
  var copyText = document.getElementById("myInput");

  /* Select the text field */
  copyText.select();
  copyText.setSelectionRange(0, 99999); /*For mobile devices*/

  /* Copy the text inside the text field */
  document.execCommand("copy");

  /* Alert the copied text */
  alert("Copied the Url: " + copyText.value);
}
</script>
</html>