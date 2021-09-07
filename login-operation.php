<?php 
//$emailErr='';
echo "output";
//if(isset($_POST['signin'])){
	 if (empty($_POST["email"])) {
    echo "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      echo "Invalid email format";
    }
    else{
    	echo "valid email format";
    }
  }
  
//}
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>