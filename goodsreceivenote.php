<?php
session_start();


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;



//print_r($_SESSION);
include'account.php';
$account =  new account();

$accountId=$account->getCurrentUserId(); 

if(!isset($_SESSION['user_id']))
{
	header("Location:index.php");
}

$farmerdata = $account->getfarmer_OnBoardingData();

if(!empty($_POST))
{
	if(isset($_POST['goodsreceivenote'])=='goodsreceivenote')
	{
	
	$farmer_id = isset($_POST['farmers_list'])? $_POST['farmers_list'] : NULL;  
	$farmersname = isset($_POST['farmersname'])? $_POST['farmersname'] : NULL;  
	$code = isset($_POST['itemcode'])? $_POST['itemcode'] : NULL; 
	$itemcodeid = isset($_POST['itemcodeid'])? $_POST['itemcodeid'] : NULL; 
	$price = isset($_POST['price']) ? floatval($_POST['price']) : 0;
    $quantity = isset($_POST['quantity']) ? floatval($_POST['quantity']) : 0;
    $total = $price * $quantity;
	
	
	$f_price = $price;
	$f_quaty =  $quantity;
	$f_totamt = $total;
	
	
/* echo "Price: " . number_format($price, 2) . "<br>";
    echo "Quantity: " . $quantity . "<br>";
    echo "Total Amount: " . number_format($total, 2) . "<br>";
*/	
	
	$lastid = $account->setGoodsReceive_note($farmer_id,$code,$itemcodeid,$f_price,$f_quaty,$f_totamt);
	$insertedid =  $lastid['insert_last_id'];
	///////////////php mail///////////
	

// Include the PHPMailer classes (adjust the path if necessary)
require 'vendor/autoload.php';

$mail = new PHPMailer(true);

try {
    // Server settings
    $mail->SMTPDebug = 0; // Set to 2 for detailed debug output
 //   $mail->isSMTP(); // Use SMTP
    $mail->Host = 'smtp.gmail.com';          // Set the SMTP server to send through
    $mail->SMTPAuth = true; // Enable SMTP authentication
	$mail->Username = 'swjnambati@gmail.com';          
	$mail->Password = '1sridhar25sowjanya'; 
	$mail->SMTPSecure = '';                  
	$mail->Port = 587;                          

    // Recipients
    $mail->setFrom('swjnambati@gmail.com', 'Veggiesbasket');
    $mail->addAddress('swjnambati@gmail.com', 'Veggiesbasket'); // Add a recipient
    // $mail->addReplyTo('info@example.com', 'Information'); // Optional reply-to address
    // $mail->addCC('cc@example.com'); // Optional CC
    // $mail->addBCC('bcc@example.com'); // Optional BCC

    // Attachments (optional)
    // $mail->addAttachment('/path/to/file.pdf'); // Add attachments
    // $mail->addAttachment('/path/to/image.jpg', 'new.jpg'); // Optional name for attachment

    // Content
    $mail->isHTML(true); // Set email format to HTML
    $mail->Subject = 'Notification from Veggiesbasket';
   // $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
   // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
	// Buttons with links to approval/rejection script
    $approveLink = 'https://localhost/greenbasket/handle-approval.php?action=approve&user_id='.$insertedid.'';
    $rejectLink = 'https://localhost/greenbasket/handle-approval.php?action=reject&user_id='.$insertedid.'';
	
					$bodyContent = "<p>Hi,</p>
					<p><b>Warm greetings from Veggiesbasket!</b></p>
					<p><b>Below are the details from Goods Receive Note. </b></p>
					
					Farmer Name : ".$farmersname."<br/>
					Item Code : ".$code."<br/>
					Item Quantity : ".$f_quaty."<br/>
					Item Price : &#8377;".$f_price."<br/>
					Total Amount : &#8377;".$f_totamt."<br/>

					<p>Please approve or reject this request:</p>
					<a href='$approveLink' style='padding:10px;background-color:green;color:white;text-decoration:none;'>Approve</a>
					<a href='$rejectLink' style='padding:10px;background-color:red;color:white;text-decoration:none;'>Reject</a>
   
					<p>Best Regards,<br/>Veggiesbasket Team</p>";

				//	$mail->Subject = 'Password reset link from MySportsArena';
					$mail->Body    = $bodyContent;

    // Send the email
    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
//exit;
	////////////////////end php mail //////////
	
	
	// $account->setClient_Onboarding($clienttype,$clname,$contact,$email,$agreementcopynewfilename,$kycFilesSerialized,$acctname,$acctnumber,$ifsccode,$branchname,$cancelcheqnewfilename);  // insert into db
	 header("Location:goodsreceivenote.php");
	 
	 
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
      <h2>GRN(Goods Receive Note)</h2>
      <div id="carbon-block" class="my-3"></div>
	  <?php if(!empty($_GET['act']))
	   {
	  	 if($_GET['act']==1)
		 {			 ?>
	  		<div class="text-center"><b><span style="color:#009900">Registered Successfully</span></b></div>
	  <?php } } ?>
    <div class="container">
        <form action="" id="goodsreceivenote" method="post" enctype="multipart/form-data">
		<input type="hidden" name="goodsreceivenote" value="goodsreceivenote">
		<input type="hidden" name="clienttype" value="4">
            <div class="form-group">
                <label for="farmers_list">Onboarded Farmers List:</label>
					<select class="browser-default custom-select" name="farmers_list" id="farmers_list" required oninput="setfarmersname()">
						<option>-Select Farmers-</option>
					  	<?php foreach($farmerdata as $fdata) 
						{  ?>
					<option value="<?php echo $fdata['id'] ?>"><?php echo $fdata['fname'] ?></option>
					 <?php } ?>
				</select>
				<input type="hidden" name="farmersname" id="farmersname" value="">
            </div>
			<div class="form-group">
                <label for="itemcode">Enter Item Code:</label>
                <input type="text" class="form-control" id="itemcode"
                    placeholder="Enter Item Code" name="itemcode" maxlength="10" required >
					<p id="item_codeerr"></p>
					<input type="hidden" name="code_check" id="code_check" value="">
					<input type="hidden" name="itemcodeid" id="itemcodeid" value="">
            </div>
            <div class="form-group">
                <label for="quantity">Enter Quantity:</label>
                <input type="number" class="form-control" id="quantity"
                    placeholder="Enter Quantity" name="quantity" step="0.01" required oninput="calculateTotal()" ><i>(in kgs)</i>
            </div>
            <div class="form-group">
                <label for="price">Enter Price:</label>
                <input type="number" class="form-control" id="price"
                    placeholder="Enter Price" name="price"  step="0.01" required oninput="calculateTotal()" ><i>(per kg)</i>
            </div>
			<!--<div class="form-group">
                <label for="itemimage">Upload Image:</label>
                <input type="file" class="form-control" id="itemimage"   name="itemimage" required >
            </div>	-->
			<div class="form-group">
                <label for="itemimage">Total Amount:</label>
                <input type="text" class="form-control" id="totalamt"   name="totalamt" disabled="disabled" >
            </div>
			<input type="submit" value="Submit" id="btnSubmit">
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
        function calculateTotal() {
            let price = parseFloat(document.getElementById('price').value) || 0;
            let quantity = parseFloat(document.getElementById('quantity').value) || 0;
            let total = price * quantity;
            document.getElementById('totalamt').value = total.toFixed(2);
        }
		
		function setfarmersname()
		{
				    var selectElement = document.getElementById("farmers_list");
					var selectedText = selectElement.options[selectElement.selectedIndex].text;
					document.getElementById("farmersname").value = selectedText;
		}
    </script>
  <script>
  
    $(document).ready(function() {
      $("#sidebarCollapse").on('click',function() {
        $("#sidebar").toggleClass('active');
      });
	  
	  $('#itemcode').on('blur',function()
	  {
		let itm_code = $(this).val();
		if(itm_code!=='')
		{
		$.ajax({
			type:"post",
			url:"check_itemAvailability.php",
			data:{id:itm_code},
			dataType: 'json',
			success:function(response)
			{
			//alert(response[0]);
			//alert(response[1]);
				if(response[0] == 1)
				{
					//alert("Code already exists"); 
					$('#item_codeerr').html('<i class="bi bi-check-circle" style="color:green" ></i>');
					$('#code_check').val(parseInt(response[0])); 
					$('#itemcodeid').val(parseInt(response[1])); 
					
				}else if(response[0] == 0)
				{
					$('#item_codeerr').html('<i class="bi bi-x-circle" style="color:red">This item code does not exist..To create new item </i><button type="button" class="btn btn-dark"><a href="http://localhost/greenbasket/create_item.php">click here</a></button> ');
					$('#code_check').val(parseInt(response[1]));
					$('#itemcodeid').val(response[1]);  
				}
			}
		});
		}

	  }); // onblur
	  
	  
	  $('#goodsreceivenote').on('submit',function(e)
	   {
	   // alert("submit");
		e.preventDefault();
			let codevar = parseInt($('#code_check').val());
			//alert(jQuery.type(codevar))
			if(codevar===1)
			{
				$( this ).unbind( 'submit' ).submit(); // Release  prevent default
			}
			
		});
	  
	  /*$('#price,#quantity').on('blur',function(){
	  
	  alert("price");
	  let qty = $('#quantity').val();
	  let prc = $('#price').val();
	  let totalamount = '';
	  
	  if(qty !== '' && prc !== '')
	  {
	  	totalamount = qty*prc;
		$('#totalamt').val(totalamount); 
	  }
	  });*/
	  
	  
    });
	

  </script>
</body>
</html>
