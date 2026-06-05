<?php include "../admin/connection.php";?>


<?php
   
    if(isset($_GET['upd'])){
        $id = $_GET['upd'];
        // echo $id;
        $query =  "SELECT * FROM institutional_member WHERE id = $id";
        $fire = mysqli_query($conn,$query);

        $user = mysqli_fetch_assoc($fire);
        
    }
?>

<?php
    if(isset($_POST['update']))
    {
        $member_name = $_POST['member_name'];
        $organisation_name = $_POST['organisation_name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $country = $_POST['country'];
        $state = $_POST['state'];
        $city = $_POST['city'];
        $street = $_POST['street'];
        $pincode = $_POST['pincode'];
        $satus = $_POST['satus'];



        $query =  "UPDATE institutional_member SET  member_name = '$member_name', organisation_name = '$organisation_name',  email = '$email', phone = '$phone', country = '$country', state = '$state', city = '$city', street = '$street', satus = '$satus', pincode = '$pincode'  WHERE  id = $id";
        $fire = mysqli_query($conn,$query);

        if($fire){
            header("Location:allinstitutional_member.php");
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Institutional Member Update</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-3"> </div>
            <div class="col-md-6"> 
               <h3 class="text-info pt-4">Institutional Member Update</h3></br>
                <div class="card px-4 py-3">
                <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
                    <div class="form-group">
                    <label for="exampleInputName"><small>Full Name:</small></label>
                    <input type="text" class="form-control" name="member_name" value="<?php echo $user['member_name']; ?>">
                    </div>
                    <div class="form-group">
                    <label for="exampleInputEmail"><small>Enter Email:</small></label>
                    <input type="email" class="form-control" name="email" value="<?php echo $user['email']; ?>">
                    </div>
                    <div class="form-group">
                    <label for="exampleInputOrganisation"><small>Enter Organisation:</small></label>
                    <input type="text" class="form-control" name="organisation_name" placeholder="Organisation" value="<?php echo $user['organisation_name'] ?>">
                    </div> 
                    <div class="form-group">
                    <label for="exampleInputPhone"><small>Enter Phone:</small></label> 
                    <input type="text" class="form-control" name="phone" placeholder="Phone" value="<?php echo $user['phone'] ?>">
                    </div>
                    <div class="form-group">
                    <label for="exampleInputCountry"><small>Enter Country:</small></label> 
                    <input type="text" class="form-control" name="country" placeholder="Country" value="<?php echo $user['country'] ?>">
                    </div>
                    <div class="form-group">
                    <label for="exampleInputState"><small>Enter State:</small></label> 
                    <input type="text" class="form-control" name="state" placeholder="State" value="<?php echo $user['state'] ?>">
                    </div>
                    <div class="form-group">
                    <label for="exampleInputCity"><small>Enter City:</small></label> 
                    <input type="text" class="form-control" name="city" placeholder="City" value="<?php echo $user['city'] ?>">
                    </div>
                    <div class="form-group">
                    <label for="exampleInputStreet"><small>Enter Street:</small></label> 
                    <input type="text" class="form-control" name="street" placeholder="Street" value="<?php echo $user['street'] ?>">
                    </div>
                    <div class="form-group">
                    <label for="exampleInputPincode"><small>Enter Pincode:</small></label> 
                    <input type="text" class="form-control" name="pincode" placeholder="Pincode" value="<?php echo $user['pincode'] ?>">
                    </div>
                    <div class="form-group">
                    <label for="exampleInputPincode"><small>Enter Status:</small></label>
                        <select class="custom-select" name="satus" id="inputGroupSelect01" value="<?php echo $user['satus'] ?>">
                        <option selected>Select...</option>
                        <option value="Approve">Approve</option>
                        <option value="Pending">Pending</option>
                     </select>
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