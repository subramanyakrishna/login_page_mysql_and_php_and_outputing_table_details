
<?php
	
	$errors = ['eml' => '', 'psw' => '','tq'=>''];
	
	if(isset($_POST['submit'])){
	
	if(empty($_POST['email'])){

			$errors['eml'] =  'An email is required <br />';
		

			if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
				$errors['eml'] = 'Email must be a valid email address';
			}
		}
	if(empty($_POST['password'])) {

			$errors['psw'] = " password is must <br>";
	
	 if(!empty($_POST['password'])){

			if(!preg_match("#.*^(?=.{8,20})(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9]).*$#", $_POST['password'])) {

				$errors['psw'] = "Your password is not safe,It must include at list 8 characters string with at least 1 digit,1 uppercase,1 lowercase and 1 special symbol";
				
			}

	}
}

	if( ( $errors['psw'] == '') && ( $errors['eml'] == '')){

	$servername = "localhost";
	$username = "root";
	$password = "";
	$database = "login";
	$conn = mysqli_connect($servername, $username, $password ,$database);

	if (!$conn) {
	  echo "Connection error: " . mysqli_connect_error();
	  die();
		}

		$email = mysqli_real_escape_string($conn,$_POST['email']);
		$password = mysqli_real_escape_string($conn,$_POST['password']);

		$sql = "INSERT INTO users(email,psw) VALUES('$email','$password')";

		if(mysqli_query($conn,$sql)){
		  }else{
			echo "error".mysqli_error($conn);
	} 
		
}
	
}
?>


<!DOCTYPE html>
<html>
<head>
	<title>Registration</title>
	<style type="text/css">
		form{
			display: block;
			width: 200px;
			border: 5px solid black;
			text-align: center;
			padding: 20px;
			position: fixed;
  			top: 50%;
  			left: 50%;
  			margin-top: -50px;
  			margin-left: -100px;
		}
		button{
			width: 60px;
			height: 20px;
			margin: 3px auto;
			
		}
		h4{
			margin-block-start: 1em !important;
    		margin-block-end: 1em !important;
		}
		.errors{
			color: red;
		}
		.tq{
			color: purple;
			font-family:fantasy;
			font-size: 20px;
		}
	</style>
</head>
<body>
	<div class="container">
	<form class="form"  method="post" action="#">	<h4>Enter details</h4>
		<div class="name">
		<label>Your Email</label><br>

		<input type="email" name="email">
		<div class="errors"><?php echo $errors['eml']; ?></div>
		</div>
		
		<div class="password">
		<label>Your password</label><br>
		<input type="text" name="password">
		<br>
		 <div class="errors"><?php echo $errors['psw'] ; ?></div> 
		</div>
		<button name="submit" value="submit">submit</button>
		
					
				</div>
		</div>
		</form>
	</div>
</body>
</html>