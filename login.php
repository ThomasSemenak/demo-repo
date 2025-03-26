<?php
include 'top_menu.php';
include "cfg/dbconnect.php";

 // Initilize varibles
$email = $err_msg = "";  
if (isset($_POST['submit'])) {    // if Form is submitted
	// store form data into variable
	$email = trim($_POST['email']);
	$password = trim($_POST['password']);
	// generate md5 hash, because password is stored in database with md5 hash
	$password = md5($password);
	
	// check if same emailid and password are stored in the database
	$sql = "select * from users where email = ? and password = ?";
	$stmt = $conn->prepare($sql);
	$stmt->bind_param("ss", $email, $password);
	if ($stmt->execute()){
		$result = $stmt->get_result();
		if ($result->num_rows == 1) {
			$row = $result->fetch_assoc();
			$_SESSION['name'] = $row['name'];
			$_SESSION['userid'] = $email;
			header("location:index.php");
		}
		else 
			$err_msg = "Incorrect Email id/Password";
	}
	else 
		$err_msg = "Some Error occurred";
}
	?>	
	 <form class="form-1" action="login.php" method ="post">
	 	<h2>Login Form</h2>
	 	<?php if ($err_msg !="") ?>
	 	<p class="err-msg"><?php echo $err_msg; $err_msg ="";?></p>

	 	<div class="col-md-12 form-group">
	 		<label>Email Id</label>
	 		<input type = "text" class="form-control" name="email" id = "email" value="<?php echo $email;?>" placeholder ="Enter your Email Id" required>
	 	</div>

	 	<div class="col-md-12 form-group">
		 	<label>Password</label>
		 	<input type = "password" class="form-control" name="password" id = "password" placeholder ="Enter Password" required>
		 </div>
	 	
	 	<div class="col-md-12 form-group">
	 		<input type="checkbox" class="check" onclick="togglePwd()">Show Password
	 	</div>
	 	<div class="col-md-12 form-group text-right">
	 		<button type="submit" class="btn btn-primary" name="submit">Login</button>
	 	</div>
	 </form>
<script>
  $(document).ready(function() { 
       $("#login").addClass("active"); 
    });
</script>
</body>
</html>