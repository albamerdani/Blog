<?php
include("lidhje_db.php");
include("funksione.php");
?>
<!DOCTYPE html>
<html>
<head>
<title>Blog</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>

<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="line-control-master/editor.css">

</head>
<body>

	<div id="wrapper">
		<h1 class="page-header">Welcome to admin panel</h1>
		<h3>Edit or delete articles</h3>
		<p>
		<a href="admin.php"><button>Admin Panel</button></a>
		<a href="view_article.php"><button>View articles</button></a>
		<a href="add_article.php"><button>Add article</button></a>
		</p>
		
		<div>
			<table class="table table-border" class="table table-hover" border="2">
				<thead>
					<tr>
						<th>Article ID</th>
						<th>Article title</th>
						<th>Article content</th>
						<th>Article tags</th>
						<th>Article image</th>
						<th>Article author</th>
						<th>Article category</th>
						<th>Article data</th>
						<th>Article status</th>
						<th>Article feature</th>
						<th>Edit Article</th>
						<th>Delete Article</th>
						</tr>
				</thead>
						
				<tbody>
					<?php
						find_articles();
					?>
				</tbody>
			</table>

			<?php
				delete_article();
			?>
		</div>

		<form action="" method="post" enctype="multipart/from-data">
			<div class="form-group">
				
				<?php 		
					if(isset($_GET['edit'])){
						$art_id = $_GET['edit'];

						$query = "SELECT * FROM article WHERE ID_article = '$art_id'";
						$select_article = mysqli_query($lidhje, $query);

						while($row = mysqli_fetch_assoc($select_article)){
					
							$article_id = $row['ID_article'];
							$article_title = $row['Title_article'];
							$article_content = $row['Summary'];
							$article_tags = $row['Tags'];
							$article_image = $row['Image'];
							$article_data = $row['Data_article'];
							$article_category = $row['ID_category'];
							$article_user = $row['ID_user'];
							$article_status = $row['Status'];
							$article_feature = $row['Is_feature'];
							
							$author_name = get_user_name($article_user);
							$category_name = get_category_name($article_category);
				?>
				
				Article Author
				<input type="text" name="id_user" class="form-control" value="<?php if(isset($article_user)) echo $author_name; ?>">
				
				Article Title
				<input type="text" name="title_article" class="form-control" value="<?php if(isset($article_title)) echo $article_title; ?>">
				
				Article Content
				<input type="text" name="content_article" class="form-control" value="<?php if(isset($article_content)) echo $article_content; ?>">
				
				Change Article content <textarea class="form-control" name="summary" cols="30" rows="20"></textarea>
				
				Article Tags
				<input type="text" name="tags_article" class="form-control" value="<?php if(isset($article_tags)) echo $article_tags; ?>">
				
				Article Image
				<img name="image_article" class="form-control" class="img img-responsive" style="width:300px; height:300px;" src="images/<?php if(isset($article_image)) echo $article_image; ?>">
				
				<input type="file" name="image"/>
					<?php
						if(is_array($_FILES)){
							$art_image = $_FILES['image']['name'];
							$art_image_temp = $_FILES['image']['tmp_name'];
							move_uploaded_file($article_image_temp, "images/$art_image");	
						}
					?>
					
				Article Data
				<input type="date" name="data_article" class="form-control" value="<?php if(isset($article_data)) echo $article_data; ?>">
				
				Article Status
				<input type="text" name="status_article" class="form-control" value="<?php if(isset($article_status)) echo $article_status; 
					if($article_status == 1)
						echo " (published)";
					else
						echo " (not published)"; ?>">
				
				Article Feature
				<input type="text" name="feature_article" class="form-control" value="<?php if(isset($article_feature)) echo $article_feature; 
					if($article_feature == 1)
						echo " (Is feature)";
					else
						echo " (Is not feature)";?>">
					
				Article Category
				<input type="text" name="content_article" class="form-control" value="<?php if(isset($article_category)) echo $category_name; ?>">
				
				Choose Article Status
					<select name="status" id="status" selected="<?php if(isset($article_status)) echo $article_status; ?>">
						<option value=""></option>
						<option value="0">0 (Not published)</option>
						<option value="1">1 (Published)</option>
					</select>
						
				Choose Article feature 
				<select name="feature" id="feature" selected="<?php if(isset($article_feature)) echo $article_feature; ?>">
					<option value=""></option>
					<option value="0">0 (Is not feature)</option>
					<option value="1">1 (Is feature)</option>
				</select>
				<?php } ?>
				
				Choose Article Category
				<select name="id_category" selected="<?php echo $category_name; ?>">
					<option value="">Select a category</option>
					<?php
							
						$query = "SELECT * FROM category";
						$select_categories = mysqli_query($lidhje, $query);
						
						confirmQuery($select_categories);
						
						while($row = mysqli_fetch_assoc($select_categories)){
							$cat_id = $row['ID_category'];
							$cat_title = $row['Title_category'];
		
							echo "<option value='$cat_id'>$cat_title</option>";
						}
					?>
				</select>
			</div>
			<div class="form-group">
				<input class="btn btn-primary" type="submit" name="update_article" value="Update Article">
			</div>
			
			<?php

				if(isset($_POST['update_article'])){
					
					$art_title = $_POST['title_article'];
					$art_category = $_POST['id_category'];
					$art_user = $_POST['id_user'];
					$art_image = $_FILES['image']['name'];
					$art_image_temp = $_FILES['image']['tmp_name'];
					$art_content = $_POST['summary'];
					//$art_content = $_POST['content_article'];
					$art_tags = $_POST['tags_article'];
					$art_data = $_POST['data_article'];
					$art_status = $_POST['status'];
					$art_feature = $_POST['feature'];
					
					move_uploaded_file($art_image_temp, "images/$art_image");
					
					if(empty($art_image)){
						
						$query = "SELECT * FROM article WHERE ID_article = '$art_id'";
						$select_image = mysqli_query($lidhje, $query);
						
						confirmQuery($select_image);
						
						while($row = mysqli_fetch_array($select_image)){
							$article_image = $row['Image'];
						}
					}
					
					$query = "UPDATE article SET (Title_article='$art_title', Summary='$art_content', Tags='$art_tags', Image='$art_image', Data_article='$art_data', ID_category='$art_category', ID_user='$art_user', Status='$art_status', Is_feature='$art_feature') WHERE ID_article = '$art_id'";
					
					$update_article = mysqli_query($lidhje, $query);
					confirmQuery($update_article);
				}
			}
		?>
		</form>
	</div>

	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="line-control-master/editor.js"></script>
	<script>
		$('textarea').Editor();
	</script>
</body>
</html>