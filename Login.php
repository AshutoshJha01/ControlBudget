<?php 
include('./DataBase-Activity.php');
$Message='';
if(isset($_POST['signin'])){
	
   $test_obj=new Connections();
   if($_POST['email']==''){
  	$Message='Email input box empty';
  }
   else if($_POST['password']==''){
  	$Message="Password input Box Empty";
  }
  else	if($test_obj->Login($_POST['email'],$_POST['password'])){
  				$Message="Success";
  }
  else{
  			$Message="Reinter Email and Password";
  }
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Login</title>
	<meta name="viewport" content= "width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<script src="scripts/jquery.min.js"></script>
	<script src="scripts/bootstrap.min.js"></script>
	<link rel="stylesheet" href="css/index.css">
</head>
<body>
	<?php include 'Header/Topnav.php'; ?>
	<div class="container">
		<div class="row"><br>
			<div class="col-xs-12 col-lg-6 col-lg-offset-3">
			<div class="panel panel-default">
    			<div class="panel-heading">
    					<h3 style="text-align: center;width: 100%;">Welcome Again in Our Ct&#8377;l Budget world</h3>
  				</div>
  				
  				<div class="panel-body">
					<form method="post" action="">
					<?php if($Message!=''):?>
							
								<div class="alert alert-warning">
								  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
								  <strong>Warning!</strong> <?php echo $Message; ?>!
								</div>
						<?php endif;?>
					  <div class="form-row align-items-center">
					  	<div class="form-group">
						    <div class="col-auto">
						      <input type="text" class="form-control" name="email" placeholder="Email" value="<?php if(isset($_POST['email'])){echo $_POST['email'];} ?>">
						    </div>
						</div>
						<div class="form-group">
						    <div class="col-auto">
						    	<div class="input-group">
						      	<input type="text" class="form-control" name="password" placeholder="Password" id="password" value="<?php if(isset($_POST['password'])){echo $_POST['password'];} ?>">
						      	<span class="input-group-addon"><span id="eye" class="glyphicon glyphicon-eye-close"></span></span>
						    	</div>
						    </div>
						 </div>
					    <div class="col-auto">
					      <button type="submit" class="btn btn-primary mb-2" name="signin">Submit</button>
					    </div>
					  </div>
					</form>
				</div>
				<div class="panel-footer">
					You don't have account?<a href="Signup.php">Click here for signup</a>
				</div>
			</div>
		</div>
	</div>
	</div>
<footer class="footer">
		<h4>Copyright © Control Budget. All Rights Reserved|Contact Us: +91-8448444853.
</h4>
	</footer>
</body>
</html>
<script type="text/javascript" src="scripts/index.js"></script>
<script type="text/javascript">
	if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }

</script>