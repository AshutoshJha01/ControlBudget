	<nav class="navbar navbar-default">
	  <div class="container">
	    <div class="navbar-header">
	    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
      	</button>
	      <a class="navbar-brand" href="#">Ct&#8377;l Budget</a>
	    </div>
	    <div class="collapse navbar-collapse" id="myNavbar">
	    <ul class="nav navbar-nav navbar-right">
	      <li class="navbutton"><a href="Aboutus.php" style="color: #6f6cde;"><span class="glyphicon glyphicon-exclamation-sign"></span>About Us</a></li>
	      <?php if(isset($_SESSION['log_in']) OR isset($_SESSION['user_id'])): ?>
	      	<li class="navbutton"><a href="Home.php" style="color: #6f6cde;"><span class="glyphicon glyphicon-home"></span>Home</a></li>
	      	<li class="navbutton"><a href="Logout.php" style="color: #6f6cde;"><span class="glyphicon glyphicon-log-out"></span>Logout</a></li>
			<?php else : ?>	
	     	 <li class="navbutton"><a href="Signup.php" style="color: #6f6cde;"><span class="glyphicon glyphicon-user"></span>Signup</a></li>
	     	 <li class="navbutton"><a href="Login.php" style="color: #6f6cde;"><span class="glyphicon glyphicon-log-in"></span>Login</a></li>
	     	<?php endif; ?>
	      	    </ul>
	</div>
	  </div>
	</nav>