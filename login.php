<?php //Kushtet e log in te anetarit
include("lidhje_db.php");
global $lidhje;

if(isset($_POST['login']))
{
	
	$user_memb = $_POST['username'];
	$password_memb = $_POST['password'];
	
	if(isset($_POST['remember'])){
		$_COOKIE['user'] = $user_memb;
		$_COOKIE['pass'] = $password_memb;
	}
	
	$login = "SELECT * FROM users WHERE Username='{$user_memb}' AND Password='{$password_memb}' LIMIT 1";
	$login_query = mysqli_query($lidhje, $login);
	
	
	if($login_query)
	{
		
			$row = mysqli_fetch_assoc($login_query);

			$vlera_user = $row['Username'];
			$vlera_pass = $row['Password'];
			$vlera_id_ = $row['ID_user'];
			$vlera_roli = $row['Role'];
	
			//$password_memb = crypt($password_memb, $vlera_pass);
			
		if(($vlera_user == $user_memb) && ($vlera_pass == $password_memb))		//kontrolloj nese vlerat e fututra ne input tekstet perkojne me vlerat e marra nga databaza
		{	//Ruaj ne SESSION vlerat e username, password, id te anetarit qe ekziston si regjistrim dhe logohet 
			//per ti perdorur si kritere ne kushtet e funksionaliteteve te tjera, fshihen te dhenat nga SESSION kur shtypet butoni Log out
			$_SESSION['username'] = $user_memb;
			$_SESSION['password'] = $password_memb;
			$_SESSION['id_user'] = $vlera_id;
			$_SESSION['roli'] = $vlera_roli;
			
			
			
			if($vlera_roli == 'user'){
				header("Location:home.php");
			}
			else{
				header("Location:home_admin.php");
			}
		}
		
		else
		{
			echo "Keni futur username ose password gabim!";
			header("Location:index.php");
		}
	}
	
	else
	{
		echo "Ju nuk jeni i regjistruar.";
	}
}
mysqli_close($lidhje);
?>