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
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

</head>
<body>

	<div id="wrapper">
		<h1 class="page-header">Welcome to admin panel</h1>
		<h3>View, aprove or delete comments</h3>
		<p><a href="admin.php"><button>Admin Panel</button></a></p>
		<div>
			<table class="table table-border" class="table table-hover" border="2">
				<thead>
					<tr>
						<th>Comment ID</th>
						<th>Comment content</th>
						<th>Comment author</th>
						<th>Email author</th>
						<th>Comment article</th>
						<th>Comment data</th>
						<th>Comment status</th>
						<th>Approve</th>
						<th>Unapprove</th>
						<th>Delete Comment</th>
						</tr>
				</thead>
						
				<tbody>
					<?php
						view_comments();
					?>
				</tbody>
			</table>

			<?php
				approve_comment();
				unapprove_comment();
				delete_comment();
			?>
		</div>
	</div>
</body>
</html>