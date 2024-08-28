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
	if(isset($_POST['createitem'])=='createitem')
	{
		$itm_name = isset($_POST['item_name'])? $_POST['item_name'] : NULL;
		$item_category= isset($_POST['item_category'])? $_POST['item_category'] : NULL;
		$itm_code = isset($_POST['item_code'])? $_POST['item_code'] : NULL;
		$itm_qty = isset($_POST['item_qty'])? $_POST['item_qty'] : NULL;
		$itm_image=isset($_FILES['item_image']['name']) ? $_FILES['item_image']['name'] : NULL;
		//$kyc = isset($_POST['kyc'])? $_POST['kyc'] : NULL;
		print_r($_POST);
		
		// image upload
/*		$newfilename="";
		if($itm_image !='')
		{
			$allowedExts = array("jpg", "jpeg", "png","gif","webp");
			$extension = pathinfo($itm_image, PATHINFO_EXTENSION);
			if(in_array($extension, $allowedExts))
			{
				$temp = explode(".", $itm_image);
				$newfilename = 'item'.$accountId.'_'.rand().'.'.end($temp);
				move_uploaded_file($_FILES["item_image"]["tmp_name"],"images/items/" . $newfilename);
			}
		}
*/		
		// end image upload///
		
		// kyc multiple upload doc //
	// Checks if user sent an empty form 
	if(!empty(array_filter($_FILES['item_image']['name'])))
	 {
		// Loop through each file in files[] array
		$itemfilename = "";
		$itemFiles = [];
		foreach ($_FILES['item_image']['tmp_name'] as $key => $value)
			 {
						$fileName = basename($_FILES['item_image']['name'][$key]);
						$allowedExts = array("jpg", "jpeg", "png","gif","webp");
						$extension = pathinfo($_FILES["item_image"]["name"][$key], PATHINFO_EXTENSION);
						if(in_array($extension, $allowedExts))
						{
							$temp = explode(".", $_FILES["item_image"]["name"][$key]);
							$itemfilename = 'item_'.$accountId.'_'.date("dmyhis").'_'.rand().'.'.end($temp);
							move_uploaded_file($_FILES["item_image"]["tmp_name"][$key],"images/items/" . $itemfilename);
							$itemFiles[] = $itemfilename;
							//$account->setfarmer_Onboarding_kyc($kycfilename,$lastinsert,$accountId);  // insert into db
					   }	 
			}
	  } 
	// $itemFilesSerialized = serialize($itemFiles); 
	 $itemFilesSerialized = json_encode($itemFiles); 
		
		if($itemFilesSerialized == '')
		{
				 //$account->create_Item($itm_name,$itm_code,$itm_qty,$newfilename);  // insert into db
				 header("Location:create_item.php?act=2");
		}
		else
		{
				 $account->create_Item($itm_name,$item_category,$itm_code,$itm_qty,$itemFilesSerialized);  // insert into db
				 header("Location:create_item.php?act=1");
		}
	}
	
}

$categories_list = $account->getCategories();
//print_r($categories_list);
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
  <!--https://www.w3schools.com/howto/tryit.asp?filename=tryhow_css_image_gallery //  code downloade -->
  <title>Create item codes</title>
  <style>
    body 
	{ 
	background-color: #fafafa;
 }
 	.redtext{ color: red;} 
	.greentext{ color: green;} 

  </style>
  <style>
div.gallery {
  border: 0px solid #ccc;
}

div.gallery:hover {
  border: 0px solid #777;
}

div.gallery img {
  width: 100%;
  height: auto;
}

div.desc {
  padding: 14px;
  text-align: center;
   overflow: auto;
   height:110px;
}

* {
  box-sizing: border-box;
}

.responsive {
  padding: 0 6px;
  float: left;
  width: 12.99999%;
}

@media only screen and (max-width: 700px) {
  .responsive {
    width: 24.99999%;
    margin: 6px 0;
  }
}

@media only screen and (max-width: 500px) {
  .responsive {
    width: 24.99999%;
  }
}

.clearfix:after {
  content: "";
  display: table;
  clear: both;
}
</style>
</head>

<body>

  <!-- start wrapper -->
  <div class="wrapper">
   <nav id="sidebar">
      <div class="sidebar-header">
         <h3>Veggies Basket</h3>
      </div><?php include'side_bar.php'; ?></nav>
    <div id="content">
      <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
          <button type="button" id="sidebarCollapse" class="btn btn-dark">
            <i class="fas fa-bars"></i><span> Toggle Sidebar</span>
          </button>
        </div>
      </nav>
      <br><br>
	  
      <div id="carbon-block" class="my-3"></div>

    <div class="container" style="border:0px solid blue">
	 <!-- Fruits and veg grid-->
	<?php include'header_itemslist.php'; ?>
	<!-- Fruits and veg grid-->
      <br><br>
	  	  <?php if(!empty($_GET['act']))
	   {
	  	 if($_GET['act']==1)
		 {			 ?>
	  		<div class="text-center"><b><span style="color:#009900">Item created Successfully</span></b></div>
	  <?php }  } ?>
	  
	  	
	  	<?php   if(!empty($_GET['act']))
	   {
	  	 if($_GET['act']==2)
		 {			 ?>
	  		<div class="text-center"><b><span style="color:#FF0000">Error in Uploading the Item..</span></b></div>
	  <?php } 
	  } ?>

      <h2>Create Item</h2>

        <form action="" method="post" enctype="multipart/form-data" id="itemform" >
		<input type="hidden" name="createitem" value="createitem">
            <div class="form-group">
                <label for="item_name">Item:</label>
                <input type="text" class="form-control" id="item_name"
                    placeholder="Enter item name" name="item_name" required ><i>(eg:Apple,Onions..)</i>
					<p id="item_nameerr"></p>
            </div>
			  <div class="form-group">
                <label for="item_category">Category:</label>
				<select class="browser-default custom-select" name="item_category" id="item_category" required>
					<option>Select Category</option>
				<?php foreach($categories_list as $key=>$val){ ?>
					<option value="<?php echo $val['id']; ?>"><?php echo ucfirst($val['categoryname']); ?></option>
				<?php } ?>
				</select>
		<p id="item_nameerr"></p>
            </div>
			<div class="form-group">
                <label for="item_code">Item code:</label>
                <input type="text" class="form-control" id="item_code"
                    placeholder="Enter Item Code" name="item_code" required><i>(eg:APP001,ONI001)</i>
					<p id="item_codeerr"></p>
            </div>
			<div class="form-group">
                <label for="item_image">Item Image:</label>
                <input type="file" class="form-control" id="item_image"
                     name="item_image[]" multiple  required >
					<p id="item_imageerr"></p>
            </div>          
		<input type="button" id="submitbtn" value="Submit">
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
	 
	 $('#submitbtn').click(function(e){
	 	let t_name = $("#item_name").val();
		let t_code = $("#item_code").val();
	//	let t_qty  = $("#item_qty").val();
		let t_image = $("#item_image").val();
		let namevalidator;
		let codevalidator;
	//	let qtyvalidator;
		let imagevalidator;
		
	 
                if(t_name=="")
                {
                  $('#item_nameerr').html('<span class="redtext">Name is required</span>');
                  namevalidator = 1;
                }else
				{
					$('#item_nameerr').html('');
					 namevalidator = 0;
				}
                if(t_code=="")
                {
				  $('#item_codeerr').html('<span class="redtext">Code is required</span>');
                  codevalidator = 1;
                }else
				{
				  $('#item_codeerr').html('');
                  codevalidator = 0;
				}
/*                if(t_qty=="")
                {
                  $('#item_qtyerr').html('<span class="redtext">Quantity is required</span>');
                  qtyvalidator = 1;
                }else
				{
                  $('#item_qtyerr').html('');
                  qtyvalidator = 0;
				}
*/                if(t_image=="")
                {
                  $('#item_imageerr').html('<span class="redtext">Image is required</span>');
                  imagevalidator = 1;
                }else
				{
                  $('#item_imageerr').html('');
                  imagevalidator = 0;
				}
				
		//let itm_code = $(this).val();
		if(t_code!=='')
		{
		$.ajax({
			type:"post",
			url:"check_itemAvailability.php",
			data:{id:t_code},
			//dataType: 'json',
			success:function(response)
			{
				if(response == 1)
				{
					$('#item_codeerr').html('<span class="redtext">Code already exists</span>');
					codevalidator = 1;
				}else if(response == 0)
				{
					$('#item_codeerr').html('<span class="greentext">Success!!</span>');
					codevalidator = 0;
					//alert("namevalidator="+namevalidator+"codevalidator="+codevalidator+"imagevalidator="+imagevalidator);
					if(namevalidator === 0 && codevalidator === 0 && imagevalidator === 0 )
					 {
						$('#itemform').submit();
					 }
					
				}
			}
		});
		} // if
		
		
		
		
				
				
	 
	 });
	 


	 
/*	$('#item_code').blur(function(e)
	{
		let itm_code = $(this).val();
		if(itm_code!=='')
		{
		$.ajax({
			type:"post",
			url:"check_itemAvailability.php",
			data:{id:itm_code},
			//dataType: 'json',
			success:function(response)
			{
				if(response == 1)
				{
					//alert("Code already exists"); 
					$('#item_codeerr').html('<span class="redtext">Code already exists</span>');
				}else if(response == 0)
				{
					$('#item_codeerr').html('<span class="greentext">Success!!</span>');
				}
			}
		});
		}
	});
*/
});

  </script>
</body>
</html>
