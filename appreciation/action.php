<?php include "../admin/connection.php";?>
<?php
    //include '..connection.php';
    if(isset($_POST['submit']))
    {
        $member_name = $_POST['member_name'];
        $team_number = $_POST['team_number'];
        $organisation = $_POST['organisation'];
        $satus = $_POST['satus'];

   
       
        
        if(empty(trim($member_name))){
            echo "Please Fill th Name";
        }
        else if(empty(trim($team_number))){
            echo "Please Fill the Team Number";
        }
        else if(empty(trim($organisation))){
            echo "Please Fill the Organisation";
        }
        else if(empty(trim($satus))){
            echo "Choose the Satus";
        }
         else{   
        $uniqueUserId = random_generator(10,'numeric');
            $query =  "INSERT INTO appreciation(u_id, 
            member_name,team_number, organisation,satus) VALUES('$uniqueUserId','$member_name','$team_number','$organisation','$satus')";
            $fire = mysqli_query($conn,$query);
            if($fire){
                echo "Data Inserted Successfully!";
                header("location: ../admin/dashboard.php");

                
            }
        }
        

        
    }

function make_seed()
{
  list($usec, $sec) = explode(' ', microtime());
  return $sec + $usec * 1000000;
}

function random_generator($digits,$alphanumeric='alphanumeric'){
    mt_srand(make_seed());
    srand(make_seed());
//Array of alphabets
if($alphanumeric=='numeric') $input=range(0,9);
else if($alphanumeric=='alphabets') $input=range('A','Z');
else $input=array_merge(range('A', 'Z'), range(1, 10)); 

$random_generator="";// Initialize the string to store random numbers
for($i=1;$i<($digits+1);$i++){ // Loop the number of times of required digits

if(rand(1,2) == 1){// to decide the digit should be numeric or alphabet
// Add one random alphabet 
$rand_index = array_rand($input);
$random_generator .=$input[$rand_index]; // One char is added

}else{

// Add one numeric digit between 1 and 10
$random_generator .=rand(1,10); // one number is added
} // end of if else

} // end of for loop 
$random_generator=substr($random_generator,0,$digits);
return $random_generator;
} // end of function

?>
