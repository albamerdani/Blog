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
		<h3>Edit or delete category</h3>
		<p>
		<a href="admin.php"><button>Admin Panel</button></a>
		<a href="kategori.php"><button>View categories</button></a>
		<a href="add_category.php"><button>Add category</button></a>
		</p>
 
		<div>
			<table class="table table-border" class="table table-hover" border="2">
				<thead>
					<tr>
					<th>Category ID</th>
					<th>Category title</th>
					<th>Edit Category</th>
					<th>Delete Category</th>
					</tr>
				</thead>
					
				<tbody>
					<?php
						find_categories();
					?>
				</tbody>
			</table>
				
			<?php
				delete_category();
			?>
		</div>
		

		<div class="col-xs-6">
			<form action="" method="post">
				<div class="form-group">
					<?php 		
						if(isset($_GET['edit'])){
							$cat_id = $_GET['edit'];
						
							$select = "SELECT * FROM category WHERE ID_category ='$cat_id'";
							$select_categories_id = mysqli_query($lidhje, $select);
							while($row = mysqli_fetch_assoc($select_categories_id)){
								$category_id = $row['ID_category'];
								$category_title = $row['Title_category'];
					?>
					<input type="text" class="form-control" name="category_title" value="<?php if(isset($category_title))echo $category_title;?>">
					<?php } ?>

				</div>

				<div class="form-group">
					<input class="btn btn-primary" type="submit" name="update" value="Update Category">
				</div>
			</form>
				<?php 
					if(isset($_POST['update'])){
						$cat_title = $_POST['category_title'];
						$query = "UPDATE category SET Title_category = '$cat_title' WHERE ID_category = '$cat_id'";
						$update_query = mysqli_query($lidhje, $query);
					}
					}
				?>
		</div>
    </div>
</body>

</html>