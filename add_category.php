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

</head>

<body>

	<div id="wrapper">
		<h1 class="page-header">Welcome to admin panel</h1>
		<p>
		<a href="admin.php"><button>Admin Panel</button></a>
		<a href="kategori.php"><button>View categories</button></a>
		<a href="edit_delete_category.php"><button>Edit or delete category</button></a>
		</p>
		<div class="col-xs-6">
			<form action="" method="post">
				<div class="form-group">
					<input type="text" class="form-control" name="kategori">
				</div>

				<div class="form-group">
					<input class="btn btn-primary" type="submit" name="submit" value="Add Category">
				</div>
			</form>
			
			<?php add_categories();?>
		</div>
    </div>
</body>

</html>