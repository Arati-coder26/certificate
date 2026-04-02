<!DOCTYPE html>
<html>
<head>
	<title>Members</title>
</head>
<body>
 	<div class="container-fluid" >
	 	<?php
	          include "allindividual_members.php";
	          
	    ?>
 	</div>
    <div class="container-fluid" >
        <?php
              
              include "allinstitutional_member.php";
        ?>
    </div>
  <div class="container-fluid py-4">
     <div class="row">
        <div class="col-md-9"></div>
        <div class="col-md-3">
         <a class="btn btn-info btn-lg " style="float:right;" href="dashboard.php">Back to Dashboard</a>
        </div>
     </div>
 </div>
</body>
</html>
