<?php
include("lidhje_db.php");
session_start();
?>

<!DOCTYPE html>
<html>

<head>

<title>Regjistrim</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- jQuery library-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<link type="text/css" rel="stylesheet" href="styles/hyrje.css"> 

</head>

<body>
<h1><b>Regjistrohuni tani!</b></h1>

<div id="regjistrim_anetar">
<table>
<form method="POST" action="register.php">
<tr>
<td>Username</td>
<td><input type="text" name="username" id="username" size="20" required/></td>
</tr>
<tr>
<td>Password</td>
<td><input type="password" name="password" id="password" size="20" required/></td>
</tr>
<tr>
<td>Re-enter Password</td>
<td><input type="password" name="re-password" id="re-password" size="20" required/></td>
</tr>
<tr>
<td>Emri</td>
<td><input type="text" name="emri" id="emri" size="20" required/></td>
</tr>
<tr>
<td>Mbiemri</td>
<td><input type="text" name="mbiemri" id="mbiemri" size="20" required/></td>
</tr>
<tr>
<td>Gjinia</td>
<td><input type="radio" name="gjinia" id="gjinia" value="Mashkull"/> Mashkull <input type="radio" name="gjinia" id="gjinia" value="Femer"/> Femer </td>
</tr>
<tr>
<td>Email</td>
<td><input type="email" name="email" id="email" size="50" required/></td>
</tr>
</table>
<p><input type="submit" name="buton_regjistrimi" id="buton_regjistrimi" value="Regjistrohu" class="btn btn-success"/></p>
</form>
<p><form method="POST" action="index.php"><input type="submit" name="return" value="Shko ne Hyrje" id="return" class="btn btn-info"/></form></p>
</p>
</div>
<?php
if(isset($_POST['buton_regjistrimi'])){
	$username = $_POST['username'];
	$password = ($_POST['password']);
	$re_password = $_POST['re-password'];
	$emri = $_POST['emri'];
	$mbiemri = $_POST['mbiemri'];
	$gjinia = $_POST['gjinia'];
	$email = $_POST['email'];
	

	if($password == $re_password)
	{
		//$password = crypt($password, "$1a$18$11iloveyou");
		
		$shto_rekord = "INSERT INTO users(ID_user, Firstname, Lastname, 'Gender', Email, Data, Username, Password, Role) VALUES ('', '$emri', '$mbiemri', '$gjinia', '$email', now(),'$username','$password', 'user')";
		$shto_rekord_query = mysqli_query($lidhje, $shto_rekord);
		
		$anetar_ri = mysqli_query($lidhje, "SELECT ID_user,Username,Password FROM users WHERE Username='{$username}' AND Password='{$password}' LIMIT 1");
		$row = mysqli_fetch_assoc($anetar_ri);
		
		$username_memb_ri = $row['Username'];
		$password_memb_ri = $row['Password'];
		$id_memb_ri = $row['ID_user'];
		$roli_memb_ri = $row['Role'];
		
		print_r($shto_rekord_query);
		
		if (!$shto_rekord_query){
			echo "Veprimi nuk u realizua.";
			die("QUERY FAILED ".mysqli_error($lidhje));
		}
		
		else if($username_memb_ri == $username && $password_memb_ri == $password)
		{
			$_SESSION['username'] = $username_memb_ri;
			$_SESSION['password'] = $password_memb_ri;
			$_SESSION['roli'] = $id_memb_ri;
			$_SESSION['id_user'] = $roli_memb_ri;
			
			echo "Veprimi u realizua me sukses.";
			header("Location:home.php");
		}
	}
	
	else
		echo "Password-et nuk perputhen. Ju lutem plotesojini sakte e njesoj te dy fushat e password-eve";
}
mysqli_close($lidhje);
?>
</body>
</html>
