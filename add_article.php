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

<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="line-control-master/editor.css">
<link rel="stylesheet" href="glDatePicker-master/styles/glDatePicker.darkneon.css">

<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" type="text/css" />

</head>

<body>

	<div id="wrapper">
		<h1 class="page-header">Welcome </h1>
		<h3>Add an article</h3>
		<p>
		<a href="admin.php"><button>Admin Panel</button></a>
		<a href="view_article.php"><button>View articles</button></a>
		<a href="edit_delete_article.php"><button>Edit or delete articles</button></a>
		<p>
		<div class="col-xs-6">
			<form action="" method="post" enctype="multipart/from-data">
				<div class="form-group">
					Article Title <input type="text" class="form-control" name="artikull"/>
					Article content <textarea class="form-control" name="summary" cols="30" rows="20" id="eg-royal-theme"></textarea>
					Article Tags <input type="text" class="form-control" name="tags"/>
					Article Image <input type="file" name="image" id="image"/>
					Article Category <select name="id_category" id="">
					<option value="">Select a Category</option>
					<?php
						
						$query = "SELECT * FROM category";
						$select_categories = mysqli_query($lidhje, $query);
						
						confirmQuery($select_categories);
						
						while($row = mysqli_fetch_assoc($select_categories)){
							$cat_id = $row['ID_category'];
							$cat_title = $row['Title_category'];
							
							echo "<option value='".$cat_id."'>".$cat_title."</option>";
						}
					?>
					</select>
	
					<p>Article author <input type="text" class="form-control" name="author"/></p>
					Article published date <input type="date" class="form-control" name="data"/>
					<p>Article status <select name="status" id="status">
					<option value=""></option>
					<option value="0">0 (Not published)</option>
					<option value="1">1 (Published)</option>
					</select>
					</p>
					Article feature <select name="feature" id="feature">
					<option value=""></option>
					<option value="0">0 (Is not feature)</option>
					<option value="1">1 (Is feature)</option>
					</select>

				</div>

				<div class="form-group">
					<input class="btn btn-primary" type="submit" name="submit" value="Add Article"/>
				</div>
			</form>
			
			<?php add_articles();?>
		</div>
    </div>
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="line-control-master/editor.js"></script>
	<script type="text/javascript" src="glDatePicker-master/glDatePicker.js"></script>
	<script type="text/javascript" src="glDatePicker-master/glDatePicker.min.js"></script>
	<script>
		$('textarea').Editor();
		$('#data').glDatePicker();
	</script>
</body>

</html>