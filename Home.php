<?php 
	include('./DataBase-Activity.php');
	$test_obj=new Connections();	
if(isset($_SESSION['user_id'])){
	$check_plan=$test_obj->plan_check($_SESSION['user_id']);
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
<?php if($check_plan==FALSE):?>
	<div class="container">
		<div class="row new_plan_main"><br>
				<button class="btn add_plan" id="new_plan" style="color: #6f6cde;"><span class="glyphicon glyphicon-plus-sign"></span> Create A New Plan</button>
		</div>
	</div>
<?php else: ?>
<div class="container">
	<div class="row"><br>
	<?php while($row = $check_plan->fetch_assoc()):?>
		<div class="col-md-3 col-sm-6">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<div id="plan_show_text">
						<div><h4 style="text-transform: capitalize;"><?php echo $row['Plan_title'];?></h4></div>
						<div><h4><span class="glyphicon glyphicon-user"></span>&nbsp;&nbsp;<?php echo $row['no_of_people'];?></h4></div>
					</div>
				</div>
				<div class="panel-body">
					<div id="plan_show_text">
						<div><b>Budget</b></div>
						<div><b>&#8377;</b><?php echo $row['initial_budget'];?></div>
					</div><hr>
					<div id="plan_show_text">
						<div><b>Date</b></div>
						<?php $date=date_create($row['from_date']); $date1=date_create($row['to_date']);?>
						<div><?php echo date_format($date,"dS M");?>-<?php echo date_format($date1,"dS M Y");?></div>
					</div><br>
						<form method="get" action="New_Expense.php">
							<input type="hidden" name="Page" value="<?php echo $row['s_no'];?>">
							<input type="submit" name="new_exp" class="btn btn-block btn-primary" value="View Plan">
						</form>
				</div>
			</div>
		</div>
	<?php endwhile; ?>
	</div>
</div>
<?php endif; ?>
	<footer class="footer">
		<?php if($check_plan!=FALSE):?>
			<div class="footer_icon"><a href="Create_Plan.php"><span class="glyphicon glyphicon-plus-sign"></span></a></div>
		<?php endif;?>
		<h4>Copyright © Control Budget. All Rights Reserved|Contact Us: +91-8448444853.
</h4>
	</footer>
</body>
</html>
<script type="text/javascript" src="scripts/index.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$("#new_plan").click(function(){
			document.location.href='http://localhost/Final_project/Create_Plan';
		});
	});
</script>
<?php } else{ echo "<h2 style='color:red;'>You Can't Acess This Page Directly</h2>";}?>
