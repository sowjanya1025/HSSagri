<?php
include'account.php';
$account =  new account();

if(isset($_POST['mail'])) 
{
        $mailid =  $_POST['mail'];
        //echo "data is valied";
        $validate_email = $account->checkemail_availability($mailid);
       // echo "data is valied";
        echo $validate_email;
}
//return "all is well";