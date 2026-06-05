<?php 
  session_start(); 

  if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
  }
  if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header("location: login.php");
  }
?> 
<?php include "../admin/connection.php";?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Certificate of Appreciation</title>
        <link href="admin/css/styles.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href="../admin/dashboard.php">Dashboard</a><button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button
            >

            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
                <!-- <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" />
                    <div class="input-group-append">
                        <button class="btn btn-info" type="button"><i class="fas fa-search"></i></button>
                    </div>
                </div> -->
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ml-auto ml-md-0 align-right">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                         <?php  if (isset($_SESSION['username'])) : ?>
                            
                       <a class="dropdown-item"><p class="text-info">Welcome <strong><?php echo $_SESSION['username']; ?></strong></p></a>
                       <div class="dropdown-divider"></div> 
                      <a class="dropdown-item text-danger" href="../admin/dashboard.php?logout='1'" >logout</a> 
                     <?php endif ?>
                    </div>
                </li>
            </ul>
        </nav>
       
            <div id="layoutSidenav_content">
                <main>
                    <div class="container my-4 ">
                        
                     
                       
                        <div class="card ">
                            <div class="card-header"><i class="fas fa-table mr-1"></i>Certificate of Appreciation</div>
                            <div class="card-body">
                                <div class="container py-4 ">
  

  <div class="bg-white text-dark">
    <form action="action.php" method="POST" >
        <div class="row">
            <div class="col form-group">
              <label for="exampleInputName"><small>Full Name</small></label>  
              <input type="text" class="form-control" name="member_name" placeholder="First name">
            </div>
            <div class="col form-group">
              <label for="exampleInputEmail1"><small>Team Number</small></label>  
              <input type="text" class="form-control" name="team_number" placeholder="Team Number">
            </div>
             <div class="col form-group">
              <label for="exampleInputOrganisation"><small>Institute/Organisation Affiliation</small></label>  
              <input type="text" class="form-control" name="organisation" placeholder="Institute/Organisation Affiliation">
            </div>
            
          </div>
          <div class="row">
           <div class="col form-group">
                    <label  for="inputGroupSelect01"><small>Status</small></label>
                     <select class="custom-select" name="satus" id="inputGroupSelect01">
                        <option selected>Select...</option>
                        <option value="Approve">Approve</option>
                        <option value="Pending">Pending</option>
                     </select>
                   
            </div>

             <div class="col form-group">
                   <label for="exampleFormControlFile1"><small>Submit Now</small></label>
                   <input class="btn btn-info btn-block" type="submit" value="Submit" name="submit">
            </div>
             <div class="col form-group"></div>
          </div>
         
    </form>
  
 </div>
</div> </div>
                            
                        </div>
                    </div>
                </div>
            </div>
                </main>

  <div class="container-fluid">
     <div class="row">
        <div class="col-md-9"></div>
        <div class="col-md-3">
         <a class="btn btn-info btn-lg " style="float:right;" href="../admin/dashboard.php">Back to Dashboard</a>
        </div>
     </div>
 </div>
   <div class="py-4" style="padding-top:4%!important; padding-bottom:4%!important;"></div>
                  <footer class="py-4 bg-light mt-auto">
                          <div class="container-fluid">
                              <div class="d-flex align-items-center justify-content-between small">
                                  <div class="text-muted">Copyright &copy; ICFHE</div>
                                  <div>
                                      <a href="#">Privacy Policy</a>
                                      &middot;
                                      <a href="#">Terms &amp; Conditions</a>
                                  </div>
                              </div>
                          </div>
                      </footer> 
            </div>
        </div>
            <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
           <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
          <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/datatables-demo.js"></script>
    </body>
</html>
