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

if(isset($_GET['id']))
{
	$id = $_GET['id'];
	$individual_farmer_data = $account->getfarmer_OnBoardingData_ById($id);
}

//print_r($individual_farmer_data);
if(!empty($_POST))
{
	if(isset($_POST['farmerboarding'])=='farmerboarding')
	{
		$fid = isset($_POST['farmerid'])? $_POST['farmerid'] : NULL;
		$fname = isset($_POST['fname'])? $_POST['fname'] : NULL;
		$contact = isset($_POST['contact'])? $_POST['contact'] : NULL;
		//echo $contact;
		//exit;
		$email = isset($_POST['email'])? $_POST['email'] : NULL;
		$pan = isset($_POST['pan'])? $_POST['pan'] : NULL;
		$adhar = isset($_POST['adhar'])? $_POST['adhar'] : NULL;
		//$image=isset($_FILES['image']['name']) ? $_FILES['image']['name'] : NULL;
		$newfilename = $individual_farmer_data['fr_image'];
		$kycFiles = unserialize($individual_farmer_data['fr_kyc']);
		// image upload
		if (!empty($_FILES["image"]["name"]))
		{
			$allowedExts = array("jpg", "jpeg", "png","gif");
			$extension = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);
			if(in_array($extension, $allowedExts))
			{
				$temp = explode(".", $_FILES["image"]["name"]);
				$newfilename = 'fr_'.$accountId.'_'.rand().'.'.end($temp);
				move_uploaded_file($_FILES["image"]["tmp_name"],"images/" . $newfilename);
			}
		}
		  
		// end image upload///

	// Checks if user sent an empty form 
	if(!empty(array_filter($_FILES['kyc']['name'])))
	 {
		// Loop through each file in files[] array
		$kycFiles = [];
		foreach ($_FILES['kyc']['tmp_name'] as $key => $value)
			 {
						$fileName = basename($_FILES['kyc']['name'][$key]);
						$allowedExts = array("jpg", "jpeg", "png","gif","pdf");
						$extension = pathinfo($_FILES["kyc"]["name"][$key], PATHINFO_EXTENSION);
						if(in_array($extension, $allowedExts))
						{
							$temp = explode(".", $_FILES["kyc"]["name"][$key]);
							$kycfilename = 'fr_kyc'.$accountId.'_'.rand().'.'.end($temp);
							move_uploaded_file($_FILES["kyc"]["tmp_name"][$key],"images/" . $kycfilename);
							$kycFiles[] = $kycfilename;
							//$account->setfarmer_Onboarding_kyc($kycfilename,$lastinsert,$accountId);  // insert into db
					   }	 
			}
	  } 
	  // end kyc upload///////////////////
	 $kycFilesSerialized = serialize($kycFiles);
		$updateID  = $account->updatefarmer_Onboarding($fid,$fname,$contact,$email,$pan,$adhar,$newfilename,$kycFilesSerialized);  // update into db
		header("Location:edit_farmer_onboarding.php?id=$id&act=1");
	}
}
?>
<!doctype html>
<html lang="en">
<head>
<?php require_once('header.php'); ?>
  <title>Edit Farmer Onboarding form</title>
  <style>
    body { background-color: #fafafa;   .redtext{ color: red; .greentext{ color: green;} 
 }
  </style>
</head>

<body>
  <!-- start wrapper -->
  <div class="wrapper">
    <?php require_once('side_bar.php'); ?>
    <div id="content">
      <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
          <button type="button" id="sidebarCollapse" class="btn btn-dark">
            <i class="fas fa-bars"></i><span> Toggle Sidebar</span>
          </button>
        </div>
      </nav>
      <br><br>
      <h2>Edit Farmer details</h2>
	 <button class="btn btn-dark"><a href="fview.php">Back</a></button>
      <div id="carbon-block" class="my-3"></div>
	  <?php if(!empty($_GET['act']))
	   {
	  	 if($_GET['act']==1)
		 {			 ?>
	  		<div class="text-center"><b><span style="color:#009900">Saved changes Successfully</span></b></div>
	  <?php } } ?>
    <div class="container">
        <form action="#" id="farmerboardingform" method="post" enctype="multipart/form-data">
		<input type="hidden" name="farmerboarding" value="farmerboarding">
		<input type="hidden" name="farmerid" value="<?php echo $individual_farmer_data['id']; ?>">
            <div class="form-group">
                <label for="fname" class="control-label required">Name:</label>
                <input type="text" class="form-control" id="fname"
                    placeholder="Enter Name" name="fname" value="<?php echo $individual_farmer_data['fr_name']; ?>" >
					<p id="name_err"></p>
            </div>
			<div class="form-group">
                <label for="contact" class="control-label required">Mobile No:</label>
                <input type="text" class="form-control" id="contact"
                    placeholder="Enter Contact Number" name="contact" maxlength="10" value="<?php echo $individual_farmer_data['fr_contact']; ?>" >
					<p id="contact_err"></p>
            </div>
            <div class="form-group">
                <label for="email">Email Id:</label>
                <input type="email" class="form-control" id="email"
                    placeholder="Enter Email Id" name="email" value="<?php echo $individual_farmer_data['fr_email']; ?>"  >
					<p id="email_err"></p>
            </div>
			<div class="form-group">
                <label for="pan">PAN details:</label>
                <input type="text" class="form-control" id="pan"
                    placeholder="Enter PAN Id" name="pan" value="<?php echo $individual_farmer_data['fr_pan']; ?>" >
					<p id="pan_err"></p>
            </div>
			<div class="form-group">
                <label for="adhar" class="control-label required">Adhar details:</label>
                <input type="text" class="form-control" id="adhar"
                    placeholder="Enter Adhar Id" name="adhar" value="<?php echo $individual_farmer_data['fr_adhar']; ?>" >
					<p id="adhar_err"></p>
            </div>  
			<div class="form-group">
                <label for="image">Image Upload:</label>
						<?php if(!empty($individual_farmer_data['fr_image'])) {  ?>
				<img src="images/<?php echo $individual_farmer_data['fr_image']; ?>" style="border:1px solid black" alt="" height="42" width="42" ><a href="images/<?php echo $individual_farmer_data['fr_image']; ?>" target='_blank' id='fileLink'>Open Image</a>
					<?php } ?>
		<input type="hidden" id="" name="image1" value="<?php if(isset($individual_farmer_data['fr_image'])) { echo $individual_farmer_data['fr_image'];  }  ?>" />
                <input type="file" class="form-control" id="image"
                    placeholder="Enter Adhar Id" name="image" >
					<p id="image_err"></p>
            </div>          
			<div class="form-group">
                <label for="kyc">KYC documents:</label>
				<?php
					// $kyc_doc = $individual_farmer_data['fr_kyc'];
					 // $kyc_explode = explode(',', $kyc_doc);
					  $kycFiles = unserialize($individual_farmer_data['fr_kyc']);
					  if(!empty($kycFiles))
					  {
					  foreach($kycFiles as $kyc)
					  { 
							$extension = pathinfo($kyc, PATHINFO_EXTENSION);
						if (in_array($extension, ['jpg', 'jpeg', 'png', 'gif'])) {
							echo "<a href='images/".htmlspecialchars($kyc)."' target='_blank' id='fileLink'><img src='images/".htmlspecialchars($kyc)."' alt='' onclick='window.open(this.src, '_blank');' width='50' height='50' style='border:1px solid black'>Open Image</a>";
						} elseif ($extension == 'pdf') {
							echo "<embed src='images/".htmlspecialchars($kyc)."' width='150' height='150' type='application/pdf'><a href='images/".htmlspecialchars($kyc)."' target='_blank' id='fileLink'>click to open</a>";
						} else {
							echo "Unsupported file type.";
						}
						//echo "<br>";
						echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
					} } ?>
					  
	                <input type="file" class="form-control" id="kyc"
                    placeholder="Enter Adhar Id" name="kyc[]" multiple>
					<p id="kyc_err"></p>
					<ul id="fileNames"></ul>
            </div>          
		<input type="button" id="submitbtn" value="Submit">
        </form>
    </div>
    </div>

  </div>
<?php require_once('footer.php'); ?>
<!--https://www.geeksforgeeks.org/form-validation-using-jquery/--> <!--// jquery validation code download-->
  <script>
  
    $(document).ready(function() {
      $("#sidebarCollapse").on('click',function() {
        $("#sidebar").toggleClass('active');
      });
    });
	
	$(document).ready(function() {
	$('#submitbtn').click(function(e)
	{
	
		let f_name = $('#fname').val();
		let contact = $('#contact').val();
		let email = $('#email').val();
		let pan = $('#pan').val();
		let adhar = $('#adhar').val();
		let image = $('#image').val();
		let kyc = $('#kyc').val();
		//alert(f_name);
		let usernameError = true; 
		let contactError = true; 
		let adharError = true; 
		
		if(f_name.length == "")
		{
			$('#name_err').html('<span class="redtext">Name is required</span>');
			usernameError = false; 
			//return false;
		}
		if(contact.length == "")
		{
			$('#contact_err').html('<span class="redtext">Contact number is required</span>');
			contactError = false; 
			//return false;
		}
//		if(email.length == "")
//		{
//			$('#email_err').html('<span class="redtext">Email is required</span>');
//			EmailError = false; 
//			//return false;
//		}
//		if(pan.length == "")
//		{
//			$('#pan_err').html('<span class="redtext">PAN number is required</span>');
//			PanError = false; 
//			//return false;
//		}
		if(adhar.length == "")
		{
			$('#adhar_err').html('<span class="redtext">Adhar number is required</span>');
			adharError = false; 
			//return false;
		}
//		if(image.length == "")
//		{
//			$('#image_err').html('<span class="redtext">Image is required</span>');
//			imageError = false; 
//			//return false;
//		}
//		if(kyc.length == "")
//		{
//			$('#kyc_err').html('<span class="redtext">KYC is required</span>');
//			kycError = false; 
//			//return false;
//		}




		//validateUsername();
		if( usernameError == true && contactError == true && adharError == true  )
		{
			$('#farmerboardingform').submit();
		}
		else
		{
			return false;
		}
	
	});
	
		$('#kyc').on('change',function()
	 {
		const fileNamesList = document.getElementById('fileNames');
        fileNamesList.innerHTML = ''; // Clear the list before adding new items
        const files = event.target.files;

        // Loop through the selected files and display their names
        for (let i = 0; i < files.length; i++) {
            const li = document.createElement('li');
            li.textContent = files[i].name;
            fileNamesList.appendChild(li);
        }
	
	   });


});

  </script>
</body>
</html>
