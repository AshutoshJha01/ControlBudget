<?php 
	include('./DataBase-Activity.php');
	session_start();
if(isset($_SESSION['user_id'])){
	$Message='';
	if(isset($_POST['create_plan'])){
		   if($_POST['init_budget']==''){
		  		$Message='Please choose Any Initial Budget';
		  	}
		   else if($_POST['no_of_people']==''){
		  		$Message="Please Enter No of People";
		  	}
		  	else{
		  		$_SESSION['initial_budget']=$_POST['init_budget'];
		  		$_SESSION['no_of_people']=$_POST['no_of_people'];
		  		header('location:Add_Plan.php');
		  	}

	}
?>
<html>
<head>
	<meta charset="utf-8">
	<title>Welcome</title>
	<meta name="viewport" content= "width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<script src="scripts/jquery.min.js"></script>
	<script src="scripts/bootstrap.min.js"></script>
	<style type="text/css">
		<?php include 'css/index.css';?>
	</style>
</head>
<body>
	<?php include 'Header/Topnav.php'; ?>
	<div class="container">
		<div class="row"><br>
			<div class="col-md-4 col-sm-6 col-md-offset-4">
				<div class="panel panel-primary">
					<div class="panel-heading text-center">
						Create New Plan
					</div>
					<div class="panel-body">
							<form class="form" method="post">
								<?php if($Message!=''):?>
							
										<div class="alert alert-warning">
										  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
										  <strong>Warning!</strong> <?php echo $Message; ?>!
										</div>
								<?php endif;?>
								  <div class="form-row align-items-center">
								  	<div class="form-group">
									    <span>Initial Budget</span>
									     <input type="text" class="form-control" name="init_budget" placeholder="Initial Budget (Ex 4000)">
									    
									</div>
									<div class="form-group">
									    <span>How Many people you want to add in your group ?</span>
									    <input type="text" class="form-control" name="no_of_people" placeholder="No of People">
									 </div>
								    <div class="col-auto">
								      <button type="submit" class="btn btn-block btn-primary" name="create_plan">Next</button>
								    </div>
								  </div>
								</form>
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
<?php } else{ echo "<h2 style='color:red;'>You Can't Acess This Page Directly</h2>";}?>