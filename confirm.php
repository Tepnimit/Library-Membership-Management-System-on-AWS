<?php
require('config.php');
include 'header.php';
include_once 'functions.php';
//setup some variables
$action = array();
$action['result'] = null;
 
//quick/simple validation
if(empty($_GET['email']) || empty($_GET['key'])){
echo "EMPTY";
    $action['result'] = 'error';
    $action['text'] = 'We are missing variables. Please double check your email.';          
}
         
if($action['result'] != 'error'){
 echo "DO IT";
    //cleanup the variables
    $email = mysqli_real_escape_string($conn,$_GET['email']);
    $key = mysqli_real_escape_string($conn,$_GET['key']);
echo " E:$email + K:$key "; 
    //check if the key is in the database
    $check_key = $conn->query("SELECT * FROM `confirm` WHERE `email` = '$email' AND `key` = '$key' LIMIT 1") or die(mysql_error());
echo "check_key";
     
    if(mysqli_num_rows($check_key) != 0){
             echo "num_row >0";    
        //get the confirm info
        $confirm_info = mysqli_fetch_assoc($check_key);
         
        //confirm the email and update the users database
        $update_users = $conn->query("UPDATE `users` SET `active` = 1 WHERE `id` = '$confirm_info[userid]' LIMIT 1") or die(mysql_error());
        //delete the confirm row
        $delete = $conn->query("DELETE FROM `confirm` WHERE `id` = '$confirm_info[id]' LIMIT 1") or die(mysql_error());
         
        if($update_users){
                         
            $action['result'] = 'success';
            $action['text'] = 'User has been confirmed. Thank-You!';
         
        }else{
 
            $action['result'] = 'error';
            $action['text'] = 'The user could not be updated Reason: '.mysql_error();;
         
        }
     
    }else{
     echo "num_row=0";
        $action['result'] = 'error';
        $action['text'] = 'The key and email is not in our database.';
     
    }
 
}
?>
<?= show_errors($action); ?>

