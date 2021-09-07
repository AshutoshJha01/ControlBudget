<?php 
	include('./DataBase-Activity.php');
	$test_obj=new Connections();
	$name_array=array();	
if(isset($_SESSION['user_id'])){
	$Expense_Distribution=$test_obj->Expense_Distribution($_SESSION['s_no']);
	$fetch_expanse=$test_obj->fetch_expense($_SESSION['s_no']);
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
				<?php while($row = $fetch_expanse->fetch_assoc()):?>
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
										<div><b>Initial Budget</b></div>
										<div><b>&#8377;</b> <?php echo $row['initial_budget'];?></div>
									</div>	
									<?php $i=0;$total_amount=0;?>
									<?php while($rows=$Expense_Distribution->fetch_assoc()):?>
												
													<?php $total_amount=$total_amount+$rows['amount'];?>
													<?php $name_array[$rows['name']]=$rows['amount'];?>
												
									<?php endwhile;?>
									<?php foreach (explode(',', $name) as $key=>$word): ?>	
										<?php foreach($name_array as $key=>$value):?>	
											<?php if($key==$word):?>
												<?php $i++;?>			
													<div id="plan_show_text">
														<div><b><?php echo $word;?></b></div>
														<div><b>&#8377;</b> <?php echo $value; ?></div>
													</div>
											<?php endif;?>
										<?php endforeach ?>
											<?php if($i==0):?>		
													<div id="plan_show_text">
														<div><b><?php echo $word;?></b></div>
														<div><b>&#8377; </b>0</div>
													</div>
											<?php else: ?>
												<?php $i=0;?>
											<?php endif;?>
									<?php endforeach;?> 
									<div id="plan_show_text">
										<div><b>Total Amount Spent</b></div>
										<div><b>&#8377;</b> <?php echo $total_amount;?></div>
									</div>	
									<div id="plan_show_text">
										<div><b>Remaining Amount</b></div>
										<div> <b><?php if($row['rem_amount']>=0):?>
											<span style="color:green;"><b>&#8377;</b> <?php echo $row['rem_amount'];?></span>
										<?php else: ?>
											<span style="color:red;"><b>&#8377;</b> <?php echo $row['rem_amount'];?></span>
										<?php endif;?></b></div>
									</div>
									<div id="plan_show_text">
										<div><b>Indivisual Shares</b></div>
										<?php $individual=0;$individual=round($row['initial_budget']/$row['no_of_people']);?>
										<div><b>&#8377;</b> <?php echo $individual;?></div>
									</div>
									<?php $i=0; ?>	
									<?php foreach (explode(',', $name) as $word): ?>	
										<?php foreach($name_array as $key=>$value):?>	
											<?php if($key==$word):?>	
												<?php $i++;?>			
												<div id="plan_show_text">
														<div><b><?php echo $word;?></b></div>
														<div>  <b><?php if($individual-$value>=0):?>
															<span style="color:green;"><b>&#8377;</b> <?php echo $individual-$value;?></span>
														<?php else: ?>
															<span style="color:red;"><b>&#8377;</b> <?php echo $individual-$value;?></span>
														<?php endif;?></b></div>
													</div>
											<?php endif;?>
										<?php endforeach;?>
										<?php if($i==0): ?>
													<div id="plan_show_text">
														<div><b><?php echo $word;?></b></div>
														<div><b>
															<span style="color:green;"><b>&#8377;</b> <?php echo $individual;?></span></b>
														</div>
													</div>
										<?php else :?>
											<?php $i=0;?>
										<?php endif; ?>
									<?php endforeach;?> 	
								</div>
								<div class="panel-footer text-center">
									<a onclick="history.back();" class="btn btn-primary">Back</a>
								</div>
							</div>
				<?php endwhile; ?>
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
