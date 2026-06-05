<?php include "connection.php";?>
<?php
    if(isset($_GET['del'])){
        $id = $_GET['del'];
        $query =  "DELETE FROM institutional_member WHERE id = $id";
        $fire = mysqli_query($conn,$query);
        if($fire){
            echo "";
        }
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
        <title>Institutional Members</title>
        
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
       <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>

        <script src="http://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
           crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
        <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js" ></script>
    </head>
    <body>
        

<div class="container-fluid">
    <h4 class="pt-4 pb-2">Institutional Members Details</h4>
<table class="table table-bordered  table-striped table-hover table-sm " id='myTable1'>
  <thead class="bg-info text-light">
    
    <th>Name</th>
    <th>Email</th>
    <th>Organisation</th>
    <th>Phone</th>
    <th>Country</th>
    <th>Status</th>
    <th>Delete</td>
    <th>Edit</td>
    
  </thead>
  <tbody>
           
        <?php
            $query2 =  "SELECT * FROM institutional_member";
            $fire2 = mysqli_query($conn,$query2) or die("Data not fetched from database".mysqli_error($conn));
            
            if(mysqli_num_rows($fire2)>0)
            {
                while($result =  mysqli_fetch_assoc($fire2))
                {
                    ?>
                    <tr>
                        
                        <td><?php echo $result['member_name'] ?></td>
                        <td><?php echo $result['email'] ?></td>
                        <td><?php echo $result['organisation_name'] ?></td>
                        <td><?php echo $result['phone'] ?></td>
                        <td><?php echo $result['country'] ?></td>
                        <td><?php echo $result['satus'] ?></td>
                        
                        <td>
                            <a href="<?php $_SERVER['PHP_SELF'] ?>?del=<?php echo $result['id'] ?>"><i class="far fa-trash-alt text-info"></i></a>
                        </td>
                        <td>
                            <a href="institunalmembers_update.php?upd=<?php echo $result['id']; ?>"><i class="far fa-edit text-info"></i></a>
                        </td>
                      
                    </tr>
                    <?php
                }
            }
        ?>
        </tbody>

    </table>
</div>
    <script>
    $(document).ready( function () {
    $('#myTable1').DataTable();
} );
    </script>
    </body>
</html>