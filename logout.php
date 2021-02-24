<?php		//Fshihen te dhenat ne SESSION te asaj faqeje kur shtypet butoni Log out dhe ridrejtohesh ne hyrje
session_start();
session_destroy();
header("Location:index.php");
?>