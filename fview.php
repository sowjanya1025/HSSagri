<?php
session_start();
include'account.php';
$account =  new account();
$accountId=$account->getCurrentUserId(); 

if(!isset($_SESSION['user_id']))
{
	header("Location:index.php");
}

$farmerdata = $account->getfarmer_OnBoardingData();
 if(isset($_POST['del_farmer']))
	{
		$del_id = isset($_POST['del_frm_id']) ? $_POST['del_frm_id'] : '';
		if($del_id!="")
		{
			$account->delete_farmer_ById($del_id);
			header("Location:fview.php?act=del");
			exit;
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
  <title>View Page</title>
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
        <h3>Lorem Ipsum</h3>
      </div><?php echo include'side_bar.php'; ?></nav>
    <div id="content">
      <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
          <button type="button" id="sidebarCollapse" class="btn btn-dark">
            <i class="fas fa-bars"></i><span> Toggle Sidebar</span>
          </button>
        </div>
      </nav>
      <br><br>
	  <h3>Farmers List</h3>
      <div id="carbon-block" class="my-3"></div>
    <div class="container">
	<div class="table-responsive">
        <table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Code</th>
	  <th scope="col">Name</th>
      <th scope="col">Mobile</th>
      <th scope="col">Adhaar</th>
	  <th scope="col">Image</th>
	  <th scope="col">Delete</th>
    </tr>
  </thead>
  <tbody>
  <?php
     $inc = 0;
  	foreach($farmerdata as $fdata) 
	{ $inc++; 
	
	?>
	    <tr>
      <th scope="row"><?php echo $inc; ?></th>
	  <td><?php echo $fdata['fcode'] ?></td>
      <td><?php echo $fdata['fname'] ?></td>
      <td><?php echo $fdata['fmobile'] ?></td>
      <td><?php echo $fdata['fadhar'] ?></td>
	   <td><img width="50" height="50" src="images/<?php echo $fdata['fimage'] ?>"></td>
	    <td><input type="button" name="delete" value="Delete" data-target='#delete_farmer' data-toggle='modal' 
		class="deletefarmerdata" id="<?php echo $fdata['id'] ?>">&nbsp;<a href="edit_farmer_onboarding.php?id=<?php echo $fdata['id'] ?>"><input type="button" name="edit" value="Edit"></a></td>
    </tr>

	<?php }
  
  
  ?>
    
  </tbody>
</table></div>
<div class="modal fade" id="delete_farmer" tabindex="-1" role="dialog" aria-labelledby="delete_farmer" aria-hidden="true">
					<div class="modal-dialog" role="document">
						<div class="modal-content" >
							<form action="<?php $_SERVER['PHP_SELF']?>" method="post">
								<div class="modal-body">
									<input autocomplete="off" type="hidden" id="del_farmer" name="del_farmer">
									<input autocomplete="off" type="hidden" id="del_frm_id" name="del_frm_id">
									<h5 class="h5-responsive text-center">Are you sure that you want to delete this??</h5>
								</div>	
								<div class="modal-footer">
									<div class="row">
										<div class="col-md-12">
												<button type="button" class="btn btn-secondary btn-sm clear" data-dismiss="modal">Close</button>
												<button type="submit" class="btn btn-primary btn-sm">Delete</button>
										</div>
									</div>	
								</div>
							</form>
						</div>
					</div>	
				</div>
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
	  
	 $('.deletefarmerdata').click(function() { 
		let ccid = $(this).attr('id');
		$('#del_frm_id').val(ccid);
	 }); 
	  
    });
  </script>
</body>
</html>
