<?php
include("lidhje_db.php");
session_start();
?>
<!DOCTYPE html>
<html>

<head>
<title>Blog</title>
<meta charset="utf-8">

<link rel="stylesheet" type="text/css" href="styles/style.css">
<!--
<link type="text/css" rel="stylesheet" href="stilet/hyrje.css"> 
<script type="text/javascript" src="kontrolle_hyrje.js"></script>
-->
</head>

<body>
<header id="header">
<link rel="stylesheet" type="text/css" href="styles/header.css">
<h1>Welcome to our blog</h1>
<a href ="logout.php"><input type ="button" value = "Log out" id = "logout" name="logout"/></a>
</header>
<footer id = "footer"></footer>
</body>
</html>