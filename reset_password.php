<?php
include("lidhje_db.php");
include("funksione.php");
?>

<!DOCTYPE html>
<html>
<head>
</head>
<body>

Email
<input type="email" name="email" id="user_email" size="30" class="form-control" required/>
New Password
<input type="password" name="new_password" id="password" size="20" required/>
Re-enter Password
<input type="password" name="re_password" id="password" size="20" required/>

<input type="submit" name="reset" id="reset" value="Reset" class="btn btn-success"/>
</body>
</html>

<?php
if(isset($_POST['reset'])){
	$email=$_POST['email'];
	$new_password=$_POST['new_password'];
	$re_password=$_POST['re_password'];
	if($new_password="" || $re_password="" || $email=""){
		echo "Ploteso fushat!";
	}
	if($new_password != $re_password){
		echo "<p>Passwordet nuk perputhen!</p>";
	}
	
	else{
		$reset = "UPDATE users SET Password = '$new_password' WHERE Email = '$email'";
		$reset_query = mysqli_query($lidhje, $reset);
		confirmQuery($reset_query);
		echo "<p>Passwordi juaj u ndryshua!</p>";
	}
}

?>