<?php
include("lidhje_db.php");
include("funksione.php");
session_start();
?>
<!DOCTYPE html>
<html>

<head>
<title>Blog</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- jQuery library-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<link rel="stylesheet" type="text/css" href="styles/style.css">

</head>

<body>

<header id="header">
<link rel="stylesheet" type="text/css" href="styles/header.css">
<h1>Welcome to our blog</h1>
<input type="button" value="Log in" id="log_in" name="login" data-toggle="modal" data-target="#loginModal"/>
<a href="#" data-toggle="modal" data-target="#reset_passwordModal" id="reset_pass"><button>Reset password</button></a>
<a href ="register.php"><input type="button" value="Register" id="register" name="register"/></a>
</header>

<span>
BLOG Search
<form method="post" action="">
<input type="text" name="tags" id="tags">
<input type="submit" name="search" value="Search" id="search">
</form>
<?php search_by_tags();?>
</span>

<?php
	$article = "SELECT * FROM article WHERE Status='1'";
	$select_article = mysqli_query($lidhje, $article);
	
	while($row = mysqli_fetch_assoc($select_article)){
		$article_id = $row['ID_article'];
		$article_title = $row['Title_article'];
		$article_content = $row['Summary'];
		$article_image = $row['Image'];
		$article_author = $row['ID_user'];
		$article_cat = $row['ID_category'];
		$article_data = $row['Data_article'];
		
		$author = get_user_name($article_author);
		$category = get_category_name($article_cat);
		
		echo '<div id="'. $article_id . '">';
		echo	'<h2>'. $article_title.'</h2>';
		echo	'<h4>In ' . $category . '</h4>';
		echo	'<p><small>By ' . $author. ' On: ' . $article_data. '</small></p>';
		echo	'<div>';
		echo		'<img class="img img-responsive" style="width:100px; height:100px;" src="images/'. $article_image . '">';
		echo		'<p>' . $article_content . '</p>';
		echo	'</div>';
		echo '</div>';
	}
	

?>

	<!-- Modal per tu loguar ne blog -->
	<div class="modal fade" id="loginModal" role="dialog">
		<div class="modal-dialog">
		  <!-- Modal content-->
			<div class="modal-content">
			
				<div class="modal-header" style = "background:lightblue">
					<button type="button" class="close" data-dismiss="modal" style="color:navy">&times;</button>
					<h2 class="modal-title" class="modal_style">Log in</h2>
				</div>
				
				<form method="POST" action="login.php" id="log">
				<div class="modal-body" style="background:black; color:white; font-style:bold;">
					<table>
						<tr>
							<td></td>
							<td>User</td>
						</tr>
						<tr>
							<td>Username</td>
							<td><input type="text" name="username" id="username" size="20" required/></td>
						</tr>
						<tr>
							<td>Password</td>
							<td><input type="password" name="password" id="password" size="20" required/></td>
						</tr>
						<tr>
							<td>Remember me</td>
							<td><input type="checkbox" name="remember" id="remember"/></td>
						</tr>
						<tr>
							<td><a href="reset_password.php">Reset password</a></td>
							<td></td>
						</tr>
					</table>
				</div>
				<div class="modal-footer" style="background:navy">
					<input type="submit" name="login" id="login" value="Log in" class="btn btn-success"/>
					<button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
				</div>
				</form>
			</div>
		</div>
	</div>
	
	<div class="modal fade" id="reset_passwordModal" role="dialog">
		<div class="modal-dialog">
		  <!-- Modal content-->
			<div class="modal-content">
			
				<div class="modal-header" style="background:lightblue">
					<button type="button" class="close" data-dismiss="modal" style="color:navy">&times;</button>
					<h2 class="modal-title" class="modal_style">Enter your email to reset password</h2>
				</div>
				
				<form method="POST" action="" id="reset">
				<div class="modal-body" style = "background:black; color:white; font-style:bold;">
					<p>User Email</p>
					<input type="email" name="email" id="user_email" size="30" class="form-control" required/>
				</div>
				
				<div class="modal-footer" style="background:navy">
					<input type="submit" name="submit" id="submit" value="Submit" class="btn btn-success"/>
					<button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
				</div>
				</form>
			</div>
		</div>
	</div>
	
		<?php
			include("login.php");
		?>
<!--<footer id = "footer"></footer>-->
</body>
</html>