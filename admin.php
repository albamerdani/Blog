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

<a href="home_admin.php"><input type="button" value="Home" id="home" name="home"/></a>
<a href="kategori.php"><input type="button" value="Categories" id="kategori" name="kategori"/></a>
<a href="users.php"><input type="button" value = "Users" id="user" name="user"/></a>
<a href="view_article.php"><input type="button" value="Articles" id="artikuj" name="artikuj"/></a>
<a href="komente.php"><input type="button" value="Komente" id="komente" name="komente"/></a>

</body>
</html>