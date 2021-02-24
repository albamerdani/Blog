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
		<h1 class="page-header">Welcome to articles list</h1>
		<h3>View articles</h3>
		<p>
		<a href="admin.php"><button>Admin Panel</button></a>
		<a href="add_article.php"><button>Add article</button></a>
		<a href="edit_delete_article.php"><button>Edit or delete article</button></a>
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
						</tr>
					</thead>
					
					<tbody>
						<?php
							view_articles();
						?>
					</tbody>
				</table>
			</div>
    </div>
</body>

</html>