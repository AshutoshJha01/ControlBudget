<?php 
	include('./DataBase-Activity.php');
	 $test_obj=new Connections();
if(isset($_SESSION['user_id'])){
	$Message='';
	if(isset($_POST['Add_plan'])){
		//print_r($_POST);
		if($_POST['title']==''){
			$Message='Title Box Empty';
		}
		else if($_POST['from_date']=='' || $_POST['to_date']==''){

			$Message='Please Check dates';
		}
		else if($test_obj->Add_Plan($_POST)){
			$Message="Record Added ";

		}else{
			$Message="Record Not Add ";
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
			<div class="col-md-6 col-sm-6 col-md-offset-3">
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
									    <span>Title</span>
									     <input type="text" class="form-control" name="title" placeholder="Enter Title (Ex : Trip to goa)">
									    
									</div>
									<div class="form-group row">
										<div class="col-xs-6">
									    	<span>From</span>
									    	<input type="date" class="form-control" name="from_date">
										</div>
										<div class="col-xs-6">
									    	<span>To</span>
									    	<input type="date" class="form-control" name="to_date">
										</div>
									 </div>
									 <div class="form-group row">
										<div class="col-xs-6">
									    	<span>Initial Budget</span>
									    	<input type="text" class="form-control" name="init_budget" value="<?php if(isset($_SESSION['initial_budget'])){ echo $_SESSION['initial_budget'];} ?>" disabled>
										</div>
										<div class="col-xs-6">
									    	<span>No of People</span>
									    	<input type="number" class="form-control" name="no_of_people" value="<?php if(isset($_SESSION['no_of_people'])){ echo $_SESSION['no_of_people'];} ?>" disabled>
										</div>
									 </div>
									 <?php for($i=1;$i<=$_SESSION['no_of_people'];$i++){?>
									 	<div class="form-group">
									 		<span>Person <?php echo $i; ?></span>
									 		<input type="text" class="form-control" name="Person<?php echo $i; ?>" placeholder="Person <?php echo $i; ?> Name" required>
									 	</div>
									 <?php }?><br>
								    <div class="form-group">
								      <button type="submit" class="form-control btn btn-block btn-primary" name="Add_plan">Next</button>
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