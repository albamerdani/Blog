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
<a href ="admin.php"><input type ="button" value = "Admin" id = "admin" name="admin"/></a>
<a href ="logout.php"><input type ="button" value = "Log out" id = "logout" name="logout"/></a>
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
		
		
		echo '<div id="'. $article_id .'">';
		echo '<h2>' . $article_title .'</h2>';
		echo '<h4>In ' . $category . '</h4>';
		echo '<p><small>By ' . $author . '</small></p>';
		echo '<div>';
		echo '<img class="img img-responsive" style="width:100px; height:100px;" src="images/'. $article_image .'">';
		echo '<p>'. $article_content . '</p>';
		echo '</div>';
		

		$select_comment = "SELECT * FROM komente WHERE Comment_status='approved' AND ID_article='$article_id'";
		$select_comment_query = mysqli_query($lidhje, $select_comment);
	
		while($row = mysqli_fetch_assoc($select_comment_query)){
			$comment_id = $row['ID_comment'];
			$comment_content = $row['Comment'];
			$comment_author = $row['ID_user'];
			$comment_data = $row['Comment_date'];

			$user_name = get_user_name($comment_author);
			
			echo '<div>';
			echo '<h4>' . $user_name . '</h4><small>' . $comment_data . '</small>';
			echo '<p>' . $comment_content . '</p>';
			echo '</div>';
			
		}
		
		echo '<div id="koment_form">';
		echo 'Leave a Comment';
		echo '<form method="POST" action="">';
		echo 'Author:';
		echo '<input type="text" name="comment_author_name" id="comment_author_name"/>';
		echo 'Email:';
		echo '<input type="email" name="email_author" id="email_author"/>';
		echo 'Comment:';
		echo '<input type="text" name="comemnt_content" id="comemnt_content"/>';
		echo '<p><input type="submit" name="comment" id="comment" value="Comment" class="btn btn-success"/></p>';
		echo '</form>';
		echo '</div>';
		echo '</div>';
		
	}
?>

<!--	<div id="<?//php $article_id ?>">
		<h2><?//php echo $article_title;?></h2>
		<h4>In <?//php echo $category;?></h4>
		<p><small>By <?//php echo $author;?></small></p>
		<div>
			<img class="img img-responsive" style="width:100px; height:100px;" src="images/<?//php echo $article_image;?>">
			<p><?//php echo $article_content;?></p>
		</div>
		
		<?//php
			//$select_comment = "SELECT * FROM komente WHERE Comment_status='approved' AND ID_article='$article_id'";
			//$select_comment_query = mysqli_query($lidhje, $select_comment);
			
		/*	while($row = mysqli_fetch_assoc($select_comment_query)){
		 		$comment_id = $row['ID_comment'];
				$comment_content = $row['Comment'];
				$comment_author = $row['ID_user'];
				$comment_data = $row['Comment_date'];

				
				$user_name = get_user_name($comment_author);
			} */
		?>
		<div>
			<h4><?//php echo $user_name;?></h4><small><?//php echo $comment_data;?></small>
			<p><?//php echo $comment_content;?></p>
		</div>
		
		<div id="koment_form">
			Leave a Comment
			<form method="POST" action="">
				Author:
		<input type="text" name="comment_author_name" id="comment_author_name"/>
				Email:
				<input type="email" name="email_author" id="email_author"/>
				Comment:
				<input type="text" name="comemnt_content" id="comemnt_content"/>
				<p><input type="submit" name="comment" id="comment" value="Comment" class="btn btn-success"/></p>
			</form>
		</div>
	</div>
-->
	
	<?php
		if(isset($_POST['comment'])){
			$comment_author_name = $_POST['comment_author_name'];
			$email_author = $_POST['email_author'];
			$comemnt_content = $_POST['comemnt_content'];
			
			$author_id = "SELECT ID_user FROM users WHERE Firstname LIKE '%$comment_author_name%' AND Email='$email_author' LIMIT 1";
			$author_id_query = mysqli_query($lidhje, $author_id);
			confirmQuery($author_id_query);
			$row = mysqli_fetch_assoc($author_id_query);
			$user_id = $row['ID_user'];
			
			$add_comment = "INSERT INTO komente(ID_comment, Comment, ID_article, ID_user, Email_user, Comment_date, Comment_status) VALUES('', '$comemnt_content', '$article_id', '$user_id', '$email_author', '". date('yyyy-mm-dd') ."', 'unapproved')";
			$add_comment_query = mysqli_query($lidhje, $add_comment);
			confirmQuery($add_comment_query);
		}
	?>
<!--<footer id = "footer"></footer>-->
</body>
</html>