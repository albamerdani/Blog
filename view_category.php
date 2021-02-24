<?php 
include("lidhje_bd.php");
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
		<h1 class="page-header">Welcome to admin </h1>
		<h3>View categories</h3>

		<div>
			<table class="table table-border" class="table table-hover">
				<thead>
					<tr>
					<th>Category ID</th>
					<th>Category title</th>
					</tr>
				</thead>

				<tbody>
					<?php
					view_categories();
					?>
				</tbody>
			</table>
		</div>
    </div>
</body>

</html>