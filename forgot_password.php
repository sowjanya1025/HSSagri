<?php
session_start();
include'account.php';
$account =  new account();


if(!empty($_POST))
{
            $femail = isset($_POST['email'])? $_POST['email'] : '';
			$check = $account->checkemail_availability($femail);
			//echo $check;
			//exit;
			if($check == 1)
			{
				// Generate a unique reset token
				$token = bin2hex(random_bytes(50));
		
				// Set token expiration time (e.g., 1 hour)
				$expires = time() + 3600;
		
				// Insert token into the database
				$account->update_resetToken($token,$expires,$femail);
			 // Create reset URL
					$resetUrl = "http://localhost/greenbasket/reset_password.php?token=" . $token;
			
					// Send email to user
					$subject = "Password Reset Request";
					$message = "Click the following link to reset your password: " . $resetUrl;
					$headers = "From: no-reply@yourwebsite.com\r\n";
					mail($femail, $subject, $message, $headers);
			
					echo "A password reset link has been sent to your email address.";
					exit;

			}elseif(($check == 0))
			{
				echo "No account found with that email address.";
			}else
			{
				echo "Invalid email";
			}

}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LogIn and Register page</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<style>  body {
    padding-top: 15px;
    font-size: 12px
    margin-bottom: 15px;
    background-color: grey;
  }
  .main {
    max-width: 320px;
    margin: 0 auto;
  }
  .login-or {
    position: relative;
    font-size: 18px;
    color: #aaa;
    margin-top: 10px;
            margin-bottom: 10px;
    padding-top: 10px;
    padding-bottom: 10px;
  }
  .span-or {
    display: block;
    position: absolute;
    left: 50%;
    top: -2px;
    margin-left: -25px;
    background-color: #fff;
    width: 50px;
    text-align: center;
  }
  .hr-or {
    background-color: #cdcdcd;
    height: 1px;
    margin-top: 0px !important;
    margin-bottom: 0px !important;
  }
  h3 {
    text-align: center;
    line-height: 300%;
  }
  footer{
      margin: 15px;
  }
  .redtext{ color: red;} 
  .greentext{ color: green;} 
  </style>
</head>
<body>

<div class="container">
	<div class="col-md-12">
	    <div class="card">
	        <div class="card-body">
			
	              <div class="row">
		<div class="col-md-4">
		     <h3>Forgot Password!!</h3>
      <form id="login-form" action="" role="form" method="post">
      <input type="hidden" name="formtype" value="loginform">
        <div class="form-group">
          <label for="email">Please enter you Registered Email Address</label>
          <input type="text" class="form-control" id="email" name="email" required>
		  <p id="loginmail_err"></p>
        </div>
        <button type="submit" class="btn btn btn-primary" id="loginsubmitbtn">
          Submit
        </button>
		<button type="button" class="btn btn btn-primary" id="loginsubmitbtn" onclick="window.location.href='http://localhost/greenbasket/index.php';">
          Back
        </button>
      </form>
		</div>
		<div class="col-md-8">
		    <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="fruitsimg.jpg" alt="First slide">
    </div>
  </div>
</div>
		</div>
	</div>
	        </div>
	    </div>
	</div>
</div>

<footer></footer>

    
</body>
</html>