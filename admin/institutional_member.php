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
        <title>Institutional Member</title>
        <link href="css/styles.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href="dashboard.php">Dashboard</a><button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button
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
                      <a class="dropdown-item text-danger" href="dashboard.php?logout='1'" >logout</a> 
                     <?php endif ?>
                    </div>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link" href="dashboard.php"
                                ><div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Admin</a
                            >
                            
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav"><a class="nav-link" href="layout-static.html">Static Navigation</a><a class="nav-link" href="layout-sidenav-light.html">Light Sidenav</a></nav>
                            </div>
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages"
                                ><div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                Pages
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div
                            ></a>
                            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth"
                                        >Authentication
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div
                                    ></a>
                                    <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav"><a class="nav-link" href="login.php">Login</a><a class="nav-link" href="register.php">Register</a><!-- <a class="nav-link" href="password.php">Forgot Password</a> --></nav>
                                    </div>
                                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError"
                                        >Individual Certificates
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div
                                    ></a>
                                    <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav"><!-- <a class="nav-link" href="approve.php">All Certificate</a> --><a class="nav-link" href="../approve/indi_approve.php">Approved Certificates</a><a class="nav-link" href="../approve/indi_pending.php">Pending Certificates</a>
                                        </nav>
                                    </div>
                                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError"
                                        >Institutional Certificates
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div
                                    ></a>
                                    <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav"><!-- <a class="nav-link" href="approve.php">All Certificate</a> --><a class="nav-link" href="../approve/instititunal_approv.php">Approved Certificate</a><a class="nav-link" href="../approve/instititunal_pending.php">Pending Certificate</a>
                                        
                                    </div>
                                </nav>
                            </div>
                            
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        ICFHE
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        
                        
                            <div class=" my-4 dropdown ">
                                    <button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown"  aria-hospopop ="true"aria-expanded="flase">
                                        Add Member
                                    </button>
                                    <div class="dropdown-menu" aria-labeledby="dropdowmMenuButton">
                                        <a class="dropdown-item" href="individual_member.php">Individual Member</a>
                                        <a class="dropdown-item" href="institutional_member.php">Institutional Member</a>
                                    </div>
                            </div>
                       
                        <div class="card ">
                            <div class="card-header"><i class="fas fa-table mr-1"></i>Fill Institutional Member Details</div>
                            <div class="card-body">
                                <div class="container py-4 ">
  
  <div class="bg-white text-dark ">
    <form action="institu_action.php" method="POST">
        <div class="row">
          <div class="col form-group">
              <label for="exampleInputName"><small>Full Name</small></label>  
              <input type="text" class="form-control" name="member_name" placeholder="First name">
            </div>
            <div class="col form-group">
              <label for="exampleInputOrganisation"><small>Organisation</small></label>  
              <input type="text" class="form-control" name="organisation_name" placeholder="Organisation Name">
            </div>
            <div class="col form-group">
              <label for="exampleInputEmail1"><small>Email address</small></label>  
              <input type="text" class="form-control" name="email" placeholder="Email address">
            </div>
            
          </div>
        
          <div class="row">
            <div class="col form-group">
              <label for="exampleInputPhone"><small>Phone</small></label>  
              <input type="text" class="form-control" name="phone" placeholder="9999567900" pattern="{9999765600}" >
            </div>
            <div class="col form-group">
              <label for="exampleInputCountry"><small>Country</small></label>  
              <input type="text" class="form-control" name="country" placeholder="Country">
            </div>
            <div class="col form-group">
              <label for="exampleInputState"><small>State</small></label>  
              <input type="text" class="form-control" name="state" placeholder="State">
            </div>
            
          </div>

          <div class="row">
            <div class="col form-group">
              <label for="exampleInputCity"><small>City</small></label>  
              <input type="text" class="form-control" name="city" placeholder="City">
            </div>
            <div class="col form-group">
              <label for="exampleInputStreet"><small>Street</small></label>  
              <input type="text" class="form-control" name="street" placeholder="street">
            </div>
            <div class="col form-group">
              <label for="exampleInputPincode"><small>Pincode</small></label>  
              <input type="text" class="form-control" name="pincode" placeholder="Pincode">
            </div>
           
          </div>

          <div class="row">
             <div class="col form-group">
              <label for="exampleInputJoinDate"><small>Join Date</small></label>  
              <input type="date" class="form-control" name="join_date" placeholder="Join Date" value="2017-08-01"
               min="2017-08-01" max="2038-12-31">
            </div>
            <div class="col form-group">
              <label for="exampleInputExpiryDate"><small>Expiry Date</small></label>  
              <input type="date" class="form-control" name="expiry_date" placeholder="Expiry Date" value="2020-01-01"
              min="2020-01-01" max="2038-12-31">
            </div>
            <div class="col form-group">
                    <label  for="inputGroupSelect01"><small>Payment Mode</small></label>
                     <select class="custom-select" name="payment_mode" id="inputGroupSelect01">
                        <option selected>Choose...</option>
                        <option value="online">Online</option>
                        <option value="offline">Offline</option>
                     </select>
                   
            </div>
            
          </div>
           
           <div class="row">
              <div class="col form-group">
              <label for="exampleInputReference"><small>Reference</small></label>  
              <input type="text" class="form-control" name="reference" placeholder="Reference">
            </div>

               <div class="col form-group">
                  <label for="exampleInputIssueDate"><small>Issue Date</small></label>
                  <input type="date" class="form-control" name="issue_date" placeholder="Issue Date" value="2020-04-01"
              min="2020-04-01">
              </div>
              <div class="col form-group">
                    <label  for="inputGroupSelect01"><small>Status</small></label>
                     <select class="custom-select" name="satus" id="inputGroupSelect02">
                        <option selected>Select...</option>
                        <option value="Approve">Approve</option>
                        <option value="Pending">Pending</option>
                     </select>
                   
            </div>
            
          </div>
         
           <div class="row">
            <div class="col form-group"></div>
            <div class="col form-group"></div>
            <div class="col form-group">
               <label for="exampleFormControlFile1"><small>Submit Now</small></label>
               <input class="btn btn-info btn-block" type="submit" value="Submit" name="submit">    
            </div>
          </div> 
          
   </form>
 </div>
</div>
 </div>
                            
                        </div>
                    </div>
                </div>
            </div>
                </main>
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
