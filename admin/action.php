<?php include "../admin/connection.php";?>
<?php
    //include '..connection.php';
    if(isset($_POST['submit']))
    {
        $member_name = $_POST['member_name'];
        $email = $_POST['email'];
        $dob = $_POST['dob'];
        $designation = $_POST['designation'];
        $organisation = $_POST['organisation'];
        $phone = $_POST['phone'];
        $country = $_POST['country'];
        $state = $_POST['state'];
        $city = $_POST['city'];
        $street = $_POST['street'];
        $pincode = $_POST['pincode'];
        $join_date = $_POST['join_date'];
        $expiry_date = $_POST['expiry_date'];
        $payment_mode = $_POST['payment_mode'];
        $reference = $_POST['reference'];
        $issue_date = $_POST['issue_date'];
        $satus = $_POST['satus'];

   
       
        
        if(empty(trim($member_name))){
            echo "Please Fill th Name";
        }
        
        else if(empty(trim($email))){
            echo "Please Fill the Email ID";
        }
         
         else if(empty(trim($dob))){
            echo "Please Fill the DOB";
        }
         else if(empty(trim($designation))){
            echo "Please Fill the Designation";
        }
         else if(empty(trim($organisation))){
            echo "Please Fill the Organisation";
        }
         else if(empty(trim($phone))){
            echo "Please Fill the Phone";
        }
        else if(empty(trim($country))){
            echo "Please Fill the Country";
        }
        else if(empty(trim($state))){
            echo "Please Fill the State";
        }
        else if(empty(trim($city))){
            echo "Please Fill the City";
        }
        else if(empty(trim($street))){
            echo "Please Fill the Street";
        }
        else if(empty(trim($pincode))){
            echo "Please Fill the Pincode";
        }
         else if(empty(trim($join_date))){
            echo "Please Fill the Join Date";
        }
         else if(empty(trim($expiry_date))){
            echo "Please Fill the Expiry Date";
        }
         else if(empty(trim($payment_mode))){
            echo "Please Fill the Payment Mode";
        }
         else if(empty(trim($reference))){
            echo "Please Fill the Rreference";
        }
        else if(empty(trim($issue_date))){
            echo "Please Fill the Issue Date";
        }
         
        else if(empty(trim($satus))){
            echo "Choose the Satus";
        }
         else{   
        $uniqueUserId = random_generator(10,'numeric');
            $query =  "INSERT INTO individual_member(u_id, member_name,email,dob,designation,organisation,phone,country,state,city,street, pincode,join_date,expiry_date,payment_mode,reference,issue_date,satus) VALUES('$uniqueUserId','$member_name','$email', '$dob', '$designation','$organisation','$phone','$country','$state','$city','street','$pincode','$join_date','$expiry_date','$payment_mode','$reference','$issue_date','$satus')";
            $fire = mysqli_query($conn,$query);
            if($fire){
                echo "Data Inserted Successfully!";
                header("location: dashboard.php");

                
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
