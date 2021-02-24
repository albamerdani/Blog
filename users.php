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
		<h3>View users</h3>
		<p>
		<a href="admin.php"><button>Admin Panel</button></a>
        </p>
			<div class="col-xs-6">
				<table class="table table-border" class="table table-hover" border="2">
					<thead>
						<tr>
						<th>User ID</th>
						<th>Firstname</th>
						<th>Lastname</th>
						<th>Gender</th>
						<th>Email</th>
						<th>Registration date</th>
						<th>Role</th>
						<th>Change to Admin</th>
						<th>Change to User</th>
						<th>Delete</th>
						</tr>
					</thead>
					
					<tbody>
						<?php
							find_users();
						?>
					</tbody>
				</table>
			</div>
    </div>
	<?php delete_user();?>
</body>

</html>