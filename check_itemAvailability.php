<?php
include'account.php';
$account =  new account();

if(isset($_POST['id'])) 
{
	  // echo "saketh";
	   $code = $_POST['id'];
	   $res = $account->check_itemAvailability($code);
	  // return $res;
	   echo $res;
}
