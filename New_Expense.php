<?php
include('./DataBase-Activity.php');
$test_obj=new Connections();
if(isset($_SESSION['user_id'])){
$Message='';
$name='';
$url = basename($_SERVER['PHP_SELF']);
$query = $_SERVER['QUERY_STRING'];
if($query)
	{
		$url .= "?".$query;
	}
$_SESSION['current_page'] = $url;

if(isset($_GET['new_exp'])){
	$_SESSION['s_no']=$_GET['Page'];
	$fetch_expanse=$test_obj->fetch_expense($_GET['Page']);
	$fetch_each_expense=$test_obj->fetch_each_expense($_GET['Page']);
}
if(isset($_POST['Expense_Add'])){
	if($_POST['title']==''){
			$Message='Title Box Empty';
		}
		else if($_POST['date']==''){

			$Message='Please Check date';
		}
		else if($_POST['amount']==''){
			$Message='Enter Amount For Expense';
		}
		else if($test_obj->Add_Expense($_POST)){
			$Message="Record Added ";

		}else{
			$Message="Record Not Add ";
		}
}
?>
<html>
<head>
	<meta charset="utf-8">
	<title>New Expense</title>
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
			<div class="col-md-8 col-sm-6">
					<?php while($row = $fetch_expanse->fetch_assoc()):?>
						<?php $_SESSION['rem_amount']=$row['rem_amount'];?>
						<?php $name=$row['Person_Name'];?>
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
										<div><b>&#8377; <?php echo $row['initial_budget'];?></b></div>
									</div>
									<div id="plan_show_text">
										<div><b>Remaining Amount</b></div>
										<div><b><?php if($row['rem_amount']>=0):?>
											<span style="color:green;"><b>&#8377;</b> <?php echo $row['rem_amount'];?></span>
										<?php else: ?>
											<span style="color:red;"><b>&#8377;</b> <?php echo $row['rem_amount'];?></span>
										<?php endif;?></b></div>
									</div>
									<div id="plan_show_text">
										<div><b>Date</b></div>
										<?php $date=date_create($row['from_date']); $date1=date_create($row['to_date']);?>
										<div><b><?php echo date_format($date,"dS M");?>-<?php echo date_format($date1,"dS M Y");?></b></div>
									</div><br>
								</div>
							</div>
				<?php endwhile; ?>
			</div>
			<div class="col-md-4 col-sm-6 expense_dis_btn">
				<a href="Expense_Distribution.php"><button class="btn btn-default btn-lg">Expense Distribution</button></a>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="row"><br>
			<div class="col-md-8 col-sm-6">
				<?php if($fetch_each_expense !== false && $fetch_each_expense->num_rows > 0):?>
					<?php while($row = $fetch_each_expense->fetch_assoc()):?>
						<div class="col-md-4 col-sm-6">
							<div class="panel panel-primary">
								<div class="panel-heading text-center">
										<div><h4 style="text-transform: capitalize;"><?php echo $row['title'];?></h4></div>
								</div>
								<div class="panel-body">
									<div id="plan_show_text">
										<div><b>Paid By</b></div>
										<div><?php echo $row['name'];?></div>
									</div>
									<div id="plan_show_text">
										<div><b>Paid On</b></div>
										<?php $date=date_create($row['date']);?>
										<div><?php echo date_format($date,"dS M Y");?></div>
									</div><hr>
									<div class="plan_show_text">
										<?php if($row['bill']==''):?>
											<a href="#">You don't have bill</a>
										<?php else: ?>
											<a href="img/<?php echo $row['bill']; ?>">Show Bill</a>
										<?php endif;?>
									</div>
								</div>
							</div>
						</div>
				<?php endwhile; ?>
			<?php endif;?>
			</div>

			<div class="col-md-4 col-sm-6">
				<div class="panel panel-primary">
					<div class="panel-heading text-center">
						Add New Expense
					</div>
					<div class="panel-body">
						<form class="form" method="post" enctype="multipart/form-data">
								<?php if($Message!=''):?>
									<div class="alert alert-warning">
										  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
										  <strong>Warning!</strong> <?php echo $Message; ?>!
										</div>
								<?php endif;?>
								  <div class="form-row align-items-center">
								  	<div class="form-group">
									    <span>Title</span>
									     <input type="text" class="form-control" name="title" placeholder="Expense Name">
									    
									</div>
									<div class="form-group">
									    <span>Date</span>
									     <input type="date" class="form-control" name="date">
									</div>
									<div class="form-group">
									    <span>Amount Spent</span>
									     <input type="number" class="form-control" name="amount" placeholder="Amount Spent">
									</div>
									<div class="form-group">
									     <select class="form-control" name="name">
									     	<option>Choose</option>
									     	<?php foreach (explode(',', $name) as $word){ ?>
									     		<option value="<?php echo $word;?>"><?php echo $word;?></option>
									     	<?php }?> 
									     </select>
									</div>
									<div class="form-group">
										<span>Upload Bill</span>
									    <input type="file" name="file_upload" class="form-control">
									</div>
								    <div class="form-group">
								      <button type="submit" class="form-control btn btn-block btn-primary" name="Expense_Add">Add</button>
								    </div>
								  </div>
								</form>
					</div>
				</div><br>
			</div>
		</div>
	</div><br>
	<footer class="footer">
		<h4>Copyright © Control Budget. All Rights Reserved|Contact Us: +91-8448444853.
</h4>
	</footer>
</body>
</html>
<script type="text/javascript" src="scripts/index.js"></script>
<?php } else{ echo "<h2 style='color:red;'>You Can't Acess This Page Directly</h2>";}?>
