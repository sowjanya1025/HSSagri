<?php
session_start();
//print_r($_SESSION);
include'account.php';
$account =  new account();

$accountId=$account->getCurrentUserId(); 

if(!isset($_SESSION['user_id']))
{
	header("Location:index.php");
}


if(!empty($_POST))
{
	if(isset($_POST['clientboardingform'])=='clientboardingform')
	{
		$clienttype = isset($_POST['clienttype'])? $_POST['clienttype'] : NULL;
		$clname = isset($_POST['clname'])? $_POST['clname'] : NULL;
		$contact = isset($_POST['contact'])? $_POST['contact'] : NULL;
		$email = isset($_POST['email'])? $_POST['email'] : NULL;
		$Agreementcopy=isset($_FILES['Agreementcopy']['name']) ? $_FILES['Agreementcopy']['name'] : NULL;
		$acctname = isset($_POST['acctname'])? $_POST['acctname'] : NULL;
		$acctnumber = isset($_POST['acctnumber'])? $_POST['acctnumber'] : NULL;
		$ifsccode = isset($_POST['ifsccode'])? $_POST['ifsccode'] : NULL;
		$branchname = isset($_POST['branchname'])? $_POST['branchname'] : NULL;
		$cancelcheq = isset($_FILES['cancelcheq']['name']) ? $_FILES['cancelcheq']['name'] : NULL;
		
		// Agreementcopy upload
		$agreementcopynewfilename="";
		if($Agreementcopy !='')
		{
			$allowedExts = array("jpg", "jpeg", "png","gif");
			$extension = pathinfo($Agreementcopy, PATHINFO_EXTENSION);
			if(in_array($extension, $allowedExts))
			{
				$temp = explode(".", $Agreementcopy);
				$agreementcopynewfilename = 'rt_agrcopy_'.$accountId.'_'.date("dmyhis").'_'.rand().'.'.end($temp);
				move_uploaded_file($_FILES["Agreementcopy"]["tmp_name"],"images/" . $agreementcopynewfilename);
			}
		}
		// end Agreementcopy upload///
		
		//$insertID  = $account->setfarmer_Onboarding($fname,$contact,$email,$pan,$adhar,$newfilename);  // insert into db
		//$lastinsert = $insertID['insert_last_id'];
		
		// kyc multiple upload doc //
	// Checks if user sent an empty form 
	if(!empty(array_filter($_FILES['kyc']['name'])))
	 {
		// Loop through each file in files[] array
		$kycfilename = "";
		$kycFiles = [];
		foreach ($_FILES['kyc']['tmp_name'] as $key => $value)
			 {
						$fileName = basename($_FILES['kyc']['name'][$key]);
						$allowedExts = array("jpg", "jpeg", "png","gif","pdf");
						$extension = pathinfo($_FILES["kyc"]["name"][$key], PATHINFO_EXTENSION);
						if(in_array($extension, $allowedExts))
						{
							$temp = explode(".", $_FILES["kyc"]["name"][$key]);
							$kycfilename = 'rt_kyc_'.$accountId.'_'.date("dmyhis").'_'.rand().'.'.end($temp);
							move_uploaded_file($_FILES["kyc"]["tmp_name"][$key],"images/" . $kycfilename);
							$kycFiles[] = $kycfilename;
							//$account->setfarmer_Onboarding_kyc($kycfilename,$lastinsert,$accountId);  // insert into db
					   }	 
			}
	  } 
	 $kycFilesSerialized = serialize($kycFiles);
	 // end kyc ////////////
	 
	 ////////////////// cancel cheque ////////////
		$cancelcheqnewfilename="";
		if($cancelcheq !='')
		{
			$allowedExts = array("jpg", "jpeg", "png","gif");
			$extension = pathinfo($Agreementcopy, PATHINFO_EXTENSION);
			if(in_array($extension, $allowedExts))
			{
				$temp = explode(".", $cancelcheq);
				$cancelcheqnewfilename = 'rt_calche_'.$accountId.'_'.date("dmyhis").'_'.rand().'.'.end($temp);
				move_uploaded_file($_FILES["cancelcheq"]["tmp_name"],"images/" . $cancelcheqnewfilename);
			}
		}
	 //////////////////end cancel cheque //////////
	 $account->setClient_Onboarding($clienttype,$clname,$contact,$email,$agreementcopynewfilename,$kycFilesSerialized,$acctname,$acctnumber,$ifsccode,$branchname,$cancelcheqnewfilename);  // insert into db
	 header("Location:retailtraders_onboarding.php?act=1");
	 
	 
	}
}



?>
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500&display=swap" rel="stylesheet">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">

  <!-- cdnjs.com / libraries / fontawesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
  <!-- Option 1: Include in HTML -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
  <!-- js validation scripts -->
	<!-- end js validation scripts --> 
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" charset="utf-8"></script>

  <!-- css ekternal -->
  <link rel="stylesheet" href="css/style.css">
  <title>RetailTraders Onboarding form</title>
  <style>
    body { background-color: #fafafa;   .redtext{ color: red; .greentext{ color: green;} 
 }
  </style>
</head>

<body>
  <!-- start wrapper -->
  <div class="wrapper">
   <nav id="sidebar">
      <div class="sidebar-header">
        <h3>Veggies Basket</h3>
      </div>
	  <?php require_once('side_bar.php'); ?></nav>
    <div id="content">
      <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
          <button type="button" id="sidebarCollapse" class="btn btn-dark">
            <i class="fas fa-bars"></i><span> Toggle Sidebar</span>
          </button>
        </div>
      </nav>
      <br><br>
      <h2>RetailTraders Onboarding Form</h2>
      <div id="carbon-block" class="my-3"></div>
	  <?php if(!empty($_GET['act']))
	   {
	  	 if($_GET['act']==1)
		 {			 ?>
	  		<div class="text-center"><b><span style="color:#009900">Registered Successfully</span></b></div>
	  <?php } } ?>
    <div class="container">
        <form action="" id="clientboardingform" method="post" enctype="multipart/form-data">
		<input type="hidden" name="clientboardingform" value="clientboardingform">
		<input type="hidden" name="clienttype" value="4">
            <div class="form-group">
                <label for="fname">Client name:</label>
                <input type="text" class="form-control" id="clname"
                    placeholder="Enter Name" name="clname" required >
					<p id="name_err"></p>
            </div>
			<div class="form-group">
                <label for="contact">Mobile No:</label>
                <input type="text" class="form-control" id="contact"
                    placeholder="Enter Contact Number" name="contact" maxlength="10" required >
					<p id="contact_err"></p>
            </div>
            <div class="form-group">
                <label for="email">Email Id:</label>
                <input type="email" class="form-control" id="email"
                    placeholder="Enter Email Id" name="email" required >
					<p id="email_err"></p>
            </div>
			<div class="form-group">
                <label for="kyc">KYC documents:<i>(Adhar,Pan and Company details)</i></label>
                <input type="file" class="form-control" id="kyc"
                    placeholder="Enter KYC" name="kyc[]" multiple required>
					<p id="kyc_err"></p>
            </div>  
			<div class="form-group">
                <label for="Agreementcopy">Agreement Copy:</label>
                <input type="file" class="form-control" id="Agreementcopy"   name="Agreementcopy" required >
					<p id="image_err"></p>
            </div>	
			<div class="form-group" style="border:0px solid #999999;">
			  <div><h6><strong>Bank Details:</strong></h6></div>
  <div class="form-group row" >
    <label for="acctname" class="col-sm-3 col-form-label">Account Holder Name:</label>
    <div class="col-sm-9">
      <input type="text" class="form-control" id="acctname" name="acctname">
    </div>
  </div>
  <div class="form-group row">
    <label for="acctnumber" class="col-sm-3 col-form-label">Account Number:</label>
    <div class="col-sm-9">
      <input type="text" class="form-control" id="acctnumber" name="acctnumber">
    </div>
  </div>
<div class="form-group row">
    <label for="ifsccode" class="col-sm-3 col-form-label">IFSC Code:</label>
    <div class="col-sm-9">
      <input type="text" class="form-control" id="ifsccode" name="ifsccode">
    </div>
  </div>
<div class="form-group row">
    <label for="branchname" class="col-sm-3 col-form-label">Branch Name:</label>
    <div class="col-sm-9">
      <input type="text" class="form-control" id="branchname" name="branchname">
    </div>
  </div>  <div class="form-group row">
    <label for="cancelcheq" class="col-sm-3 col-form-label">Cancel Cheque:</label>
    <div class="col-sm-9">
      <input type="file" class="form-control" id="cancelcheq" name="cancelcheq">
    </div>
  </div>
			</div>
			<input type="submit" id="submitbtn" value="Submit">
        </form>
    </div>
    </div>

  </div>
  <!-- wrapper and -->


  <!-- Option 2: jQuery, Popper.js, and Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script> 
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
<!--https://www.geeksforgeeks.org/form-validation-using-jquery/--> <!--// jquery validation code download-->
  <script>
  
    $(document).ready(function() {
      $("#sidebarCollapse").on('click',function() {
        $("#sidebar").toggleClass('active');
      });
    });
	

  </script>
</body>
</html>
