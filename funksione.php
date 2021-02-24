<?php

function confirmQuery($result){			//funksion qe kontrollon realizimin e querit dhe cilat jane gabimet nese ka
	global $lidhje;						//variblen $lidhje qe mundeson lidhjen me databazen e bejme variabel global
	if(!$result){
		die("QUERY FAILED." . mysqli_error($lidhje));
	}
}


//FUNKSIONET PER KATEGORITE

function add_categories(){
	global $lidhje;
	
	if(isset($_POST['submit'])){		//mer vleren nga nje input tekst dhe shton ate vlere ne databaze ne tabelen category
		
		$category = $_POST['kategori'];
		$category = mysqli_real_escape_string($lidhje, $category);
		
		if($category = "" || empty($category)){
			echo "Ploteso fushen";
		}
		
		$query = "INSERT INTO category(ID_category, Title_category) VALUES('', '$category')";
		$category_query = mysqli_query($lidhje, $query);
		if(!$category_query){
			die('QUERY FAILED' . mysqli_error($lidhje));
		}
	}
}


function view_categories(){		//funksion i cili realizon querin per te marre te dhenat e nje kategorie nga databaza 
								//dhe per ti afishuar vlerat ne nje tabele te kategori.php
	global $lidhje;
	
	$select = "SELECT * FROM category";
	$select_categories = mysqli_query($lidhje, $select);
	
	while($row = mysqli_fetch_assoc($select_categories)){
		$category_id = $row['ID_category'];
		$category_title = $row['Title_category'];
		
		echo "<tr><td>$category_id</td>";
		echo "<td>$category_title</td></tr>";
	}
}


function find_categories(){		//funksion i cili realizon querin per te marre te dhenat e nje kategorie nga databaza 
								//dhe per ti afishuar vlerat ne nje tabele edit_delete_categories.php
	global $lidhje;				//nuk merr argumenta dhe nuk kthen vlere
	
	$select = "SELECT * FROM category";
	$select_categories = mysqli_query($lidhje, $select);
	
	while($row = mysqli_fetch_assoc($select_categories)){
		$category_id = $row['ID_category'];
		$category_title = $row['Title_category'];
		
		echo "<tr><td>$category_id</td>";
		echo "<td>$category_title</td>";
		echo "<td><a href='edit_delete_category.php?edit=$category_id'>Edit</a></td>";
		echo "<td><a href='edit_delete_category.php?delete=$category_id'>Delete</a></td></tr>";
	}
}

	
function delete_category(){		//funksion qe fshin nje te dhene nga databaza sipas id perkatese
	global $lidhje;
	
	if(isset($_GET['delete'])){
		$cat_id = $_GET['delete'];
		$delete = "DELETE * FROM category WHERE ID_category = '$cat_id'";
		$delete_query = mysqli_query($lidhje, $delete);
		header("Location: edit_delete_category.php");		//Ridrejton ne te njejten faqe per ti dhene refresh pasi eshte fshire nje kategori per te shfaqur ato qe kane mbetur.
	}
}


function get_category_name($id_title){				//Merr nje parameter te tipit number nga tabela e artikujve per id e kategorise
	global $lidhje;
	$get_category_name = "SELECT Title_category FROM category WHERE ID_category = '$id_title'";
	$get_category_name_query = mysqli_query($lidhje, $get_category_name);
	while($row = mysqli_fetch_assoc($get_category_name_query)){
		$category_name = $row['Title_category'];
	}
	confirmQuery($get_category_name_query);
	return $category_name;						//Kthen si rezultat nje stringe qe eshte titulli i kategorise
}


//FUNKSIONET PER USERAT

function find_users(){		//funksion i cili realizon querin per te marre te dhenat e nje kategorie nga databaza 
								//dhe per ti afishuar vlerat ne nje tabele edit_delete_categories.php
	global $lidhje;				//nuk merr argumenta dhe nuk kthen vlere
	
	$select = "SELECT * FROM users";
	$select_users = mysqli_query($lidhje, $select);
	
	while($row = mysqli_fetch_assoc($select_users)){
		$user_id= $row['ID_user'];
		$firstname = $row['Firstname'];
		$lastname = $row['Lastname'];
		$gender = $row['Gender'];
		$email = $row['Email'];
		$date = $row['Data'];
		$role = $row['Role'];
		
		echo "<tr><td>$user_id</td>";
		echo "<td>$firstname</td>";
		echo "<td>$lastname</td>";
		echo "<td>$gender</td>";
		echo "<td>$email</td>";
		echo "<td>$date</td>";
		echo "<td>$role</td>";
		echo "<td><a href='users.php?admin=$user_id'>Admin</a></td>";
		echo "<td><a href='users.php?user=$user_id'>User</a></td>";
		echo "<td><a href='users.php?delete=$user_id'>Delete</a></td></tr>";
	}
}


function admin_role(){		//funksion qe fshin nje te dhene nga databaza sipas id perkatese
	global $lidhje;
	
	if(isset($_GET['admin'])){
		$user_id = $_GET['admin'];
		$admin_role = "UPDATE users SET Role='admin' WHERE ID_user = '$user_id'";
		$admin_role_query = mysqli_query($lidhje, $admin_role_query);
		header("Location: users.php");		//Ridrejton ne te njejten faqe per ti dhene refresh pasi eshte fshire nje kategori per te shfaqur ato qe kane mbetur.
	}
}


function user_role(){		//funksion qe fshin nje te dhene nga databaza sipas id perkatese
	global $lidhje;
	
	if(isset($_GET['user'])){
		$user_id = $_GET['user'];
		$user_role = "UPDATE users SET Role='user' WHERE ID_user = '$user_id'";
		$user_role_query = mysqli_query($lidhje, $user_role_query);
		header("Location: users.php");		//Ridrejton ne te njejten faqe per ti dhene refresh pasi eshte fshire nje kategori per te shfaqur ato qe kane mbetur.
	}
}

	
function delete_user(){		//funksion qe fshin nje te dhene nga databaza sipas id perkatese
	global $lidhje;
	
	if(isset($_GET['delete'])){
		$user_id = $_GET['delete'];
		$delete = "DELETE * FROM users WHERE ID_user = '$user_id'";
		$delete_query = mysqli_query($lidhje, $delete);
		header("Location: users.php");		//Ridrejton ne te njejten faqe per ti dhene refresh pasi eshte fshire nje kategori per te shfaqur ato qe kane mbetur.
	}
}


function get_user_name($id_user){				//Merr nje parameter te tipit number nga tabela e artikujve per id e autorit
	global $lidhje;
	$get_author_name = "SELECT Firstname, Lastname FROM users WHERE ID_user = '$id_user'";
	$get_author_name_query = mysqli_query($lidhje, $get_author_name);
	while($row = mysqli_fetch_assoc($get_author_name_query)){
		$user_name = $row['Firstname'];
		$user_lastname = $row['Lastname'];
	}
	confirmQuery($get_author_name_query);
	return $user_name . " " . $user_lastname;		//Kthen si rezultat nje bashkim stringash qe eshte emri dhe mbiemri i autorit
}



//FUNKSIONET PER ARTIKUJT

function add_articles(){
	global $lidhje;
	
	if(isset($_POST['submit'])){		//mer vleren nga inputet dhe i shton ato vlera ne databaze ne tabelen article
		
		$article_title = $_POST['artikull'];
		$article_content = $_POST['summary'];
		$article_tags = $_POST['tags'];
		$article_image = $_FILES['image']['name'];
		$article_image_temp = $_FILES['image']['tmp_name'];
		$article_category = $_POST['id_category'];
		$article_author = $_POST['author'];
		$article_data = $_POST['data'];
		$article_status = $_POST['status'];
		$article_feature = $_POST['feature'];
		
		$article_title = mysqli_real_escape_string($lidhje, $article_title);
		$article_content = mysqli_real_escape_string($lidhje, $article_content);
		$article_tags = mysqli_real_escape_string($lidhje, $article_tags);
		
		if(is_array($_FILES)){
		move_uploaded_file($article_image_temp, "images/$article_image");	
		}
		
		if($article_title = "" || empty($article_title) || $article_content = "" || empty($article_content)|| $article_tags = "" || empty($article_tags) || empty($article_image) 
			|| $article_category = "" || empty($article_category)|| $article_author = "" || empty($article_author)|| $article_data = "" || empty($article_data)
			|| $article_status = "" || empty($article_status)|| $article_feature = "" || empty($article_feature)){
			echo "Ploteso fushat";
		}
		
		$get_author_id = "SELECT ID_user FROM users WHERE Firstname LIKE $article_author";
		$get_author_id_query = mysqli_query($lidhje, $get_author_id);
		while($row = mysqli_fetch_assoc($get_author_id_query)){
			$user_id = $row['ID_user'];
		}
		
		$query = "INSERT INTO article(ID_article, Title_article, Summary, Tags, Image, Data_article, ID_category, ID_user, Status, Is_feature) 
				VALUES('', '$article_title', '$article_content', 'article_tags', '$article_image', '$article_data', '$article_category', '$user_id', '$article_status', '$article_feature')";
		$article_query = mysqli_query($lidhje, $query);
		if(!$article_query){
			die('QUERY FAILED' . mysqli_error($lidhje));
		}
	}
}



function view_articles(){		//funksion i cili realizon querin per te marre te dhenat e nje artikulli nga databaza 
								//dhe per ti afishuar vlerat ne nje tabele te article.php
	global $lidhje;
	
	$article = "SELECT * FROM article";
	$select_article = mysqli_query($lidhje, $article);
	
	while($row = mysqli_fetch_assoc($select_article)){
		$article_id = $row['ID_article'];
		$article_title = $row['Title_article'];
		$article_content = $row['Summary'];
		$article_tags = $row['Tags'];
		$article_image = $row['Image'];
		$article_author = $row['ID_user'];
		$article_cat = $row['ID_category'];
		$article_data = $row['Data_article'];
		$article_status = $row['Status'];
		$article_feature = $row['Is_feature'];
		
		
		//Keto dy query jane zhvilluar ne funksione te vecante
		/*
		$get_author_name = "SELECT Firstname, Lastname FROM users WHERE ID_user = '$article_author'";
		$get_author_name_query = mysqli_query($lidhje, $get_author_name);
		while($row = mysqli_fetch_assoc($get_author_name_query)){ 
			$user_name = $row['Firstname'];
			$user_lastname = $row['Lastname'];
		}
		
		$get_category_name = "SELECT Title_category FROM category WHERE ID_category = '$article_cat'";
		$get_category_name_query = mysqli_query($lidhje, $get_category_name);
		while($row = mysqli_fetch_assoc($get_category_name_query)){
			$category_name = $row['Title_category'];
		}
		*/
		
		
		$user_name = get_user_name($article_author);
		$category_name = get_category_name($article_cat);
		
		echo "<tr><td>$article_id</td>";
		echo "<td>$article_title</td>";
		echo "<td>$article_content</td>";
		echo "<td>$article_tags</td>";
		echo "<td><img class='img img-responsive' style='width:300px; height:250px;' src='images/".$article_image."' alt='$article_image'</td>";	//per te shfaqur imazhin dhe jo vetem url e tij
		echo "<td>$user_name</td>";
		echo "<td>$category_name</td>";
		echo "<td>$article_data</td>";
		
		if($article_status == 1)
			echo "<td>published</td>";
		else
			echo "<td>not published</td>";
		
		if($article_feature == 1)
			echo "<td>Is feature</td></tr>";
		else
			echo "<td>Is not feature</td></tr>";
	}
}


function find_articles(){		//funksion i cili realizon querin per te marre te dhenat e nje artikulli nga databaza 
								//dhe per ti afishuar vlerat ne nje tabele te edit_delete_post.php, bashke me linket edit dhe delete per artikullin perkates
	global $lidhje;
	
	$select = "SELECT * FROM article";
	$select_article = mysqli_query($lidhje, $select);
	
	while($row = mysqli_fetch_assoc($select_article)){
		$article_id = $row['ID_article'];
		$article_title = $row['Title_article'];
		$article_content = $row['Summary'];
		$article_tags = $row['Tags'];
		$article_image = $row['Image'];
		$article_author = $row['ID_user'];
		$article_cat = $row['ID_category'];
		$article_data = $row['Data_article'];
		$article_status = $row['Status'];
		$article_feature = $row['Is_feature'];
		
		
		$user_name = get_user_name($article_author);
		$category_name = get_category_name($article_cat);
		
		echo "<tr><td>$article_id</td>";
		echo "<td>$article_title</td>";
		echo "<td>$article_content</td>";
		echo "<td>$article_tags</td>";
		echo "<td><img class='img img-responsive' src='images/".$article_image."' alt='$article_image'</td>";	//per te shfaqur imazhin dhe jo vetem url e tij
		echo "<td>$user_name</td>";
		echo "<td>$category_name</td>";
		echo "<td>$article_data</td>";
		
		if($article_status == 1)
			echo "<td>published</td>";
		else
			echo "<td>not published</td>";
		
		if($article_feature == 1)
			echo "<td>Is feature</td>";
		else
			echo "<td>Is not feature</td>";
		echo "<td><a href='edit_delete_article.php?edit=$article_id'>Edit</a></td>";
		echo "<td><a href='edit_delete_article.php?delete=$article_id'>Delete</a></td></tr>";
	}
}

	
function delete_article(){		//funksion qe fshin nje te dhene nga databaza sipas id perkatese
	global $lidhje;
	
	if(isset($_GET['delete'])){
		$art_id = $_GET['delete'];
		$delete = "DELETE * FROM article WHERE ID_article='{$art_id}'";
		$delete_query = mysqli_query($lidhje, $delete);
		header("Location: edit_delete_article.php");		//Ridrejton ne te njejten faqe per ti dhene refresh pasi eshte fshire nje kategori per te shfaqur ato qe kane mbetur.
	}
}


function get_article_title($id_title){				//Merr nje parameter te tipit number nga tabela e artikujve per id e kategorise
	global $lidhje;
	$get_article_title = "SELECT Title_article FROM article WHERE ID_article='{$id_title}'";
	$get_article_title_query = mysqli_query($lidhje, $get_article_title);
	while($row = mysqli_fetch_assoc($get_article_title_query)){
		$article_title = $row['Title_article'];
	}
	confirmQuery($get_article_title_query);
	return $article_title;						//Kthen si rezultat nje stringe qe eshte titulli i kategorise
}


//FUNKSIONET PER KOMENTET

function view_comments(){		//funksion i cili realizon querin per te marre te dhenat e nje artikulli nga databaza 
								//dhe per ti afishuar vlerat ne nje tabele te edit_delete_post.php, bashke me linket edit dhe delete per artikullin perkates
	global $lidhje;
	
	$select_comment = "SELECT * FROM komente";
	$select_comment_query = mysqli_query($lidhje, $select_comment);
	
	while($row = mysqli_fetch_assoc($select_comment_query)){
		$comment_id = $row['ID_comment'];
		$comment_content = $row['Comment'];
		$comment_author = $row['ID_user'];
		$email_author = $row['Email_user'];
		$comment_article_id = $row['ID_article'];
		$comment_data = $row['Comment_date'];
		$comment_status = $row['Comment_status'];

		
		$user_name = get_user_name($comment_author);
		$comment_article_title = get_article_title($comment_article_id);
		
		echo "<tr><td>$comment_id</td>";
		echo "<td>$comment_content</td>";
		echo "<td>$user_name</td>";
		echo "<td>$email_author</td>";
		echo "<td><a href='index.php?art_id=$comment_article_id'>$comment_article_title</a></td>";
		echo "<td>$comment_data</td>";
		echo "<td>$comment_status</td>";
		echo "<td><a href='komente.php?approve=$comment_id'>Approve</a></td>";
		echo "<td><a href='komente.php?unapprove=$comment_id'>Unapprove</a></td>";
		echo "<td><a href='komente.php?delete=$comment_id'>Delete</a></td></tr>";
	}
}



function approve_comment(){		//funksion qe fshin nje te dhene nga databaza sipas id perkatese
	global $lidhje;
	
	if(isset($_GET['approve'])){
		$com_id = $_GET['approve'];
		$approve_comment = "UPDATE comment SET Comment_status='approved' WHERE ID_comment='{$com_id}'";
		$approve_comment_query = mysqli_query($lidhje, $approve_comment);
		header("Location: komente.php");		//Ridrejton ne te njejten faqe per ti dhene refresh pasi eshte fshire nje kategori per te shfaqur ato qe kane mbetur.
	}
}



function unapprove_comment(){		//funksion qe fshin nje te dhene nga databaza sipas id perkatese
	global $lidhje;
	
	if(isset($_GET['unapprove'])){
		$com_id = $_GET['unapprove'];
		$unapprove_comment = "UPDATE comment SET Comment_status='unapproved' WHERE ID_comment='{$com_id}'";
		$unapprove_comment_query = mysqli_query($lidhje, $unapprove_comment);
		header("Location: komente.php");		//Ridrejton ne te njejten faqe per ti dhene refresh pasi eshte fshire nje kategori per te shfaqur ato qe kane mbetur.
	}
}


function delete_comment(){		//funksion qe fshin nje te dhene nga databaza sipas id perkatese
	global $lidhje;
	
	if(isset($_GET['delete'])){
		$com_id = $_GET['delete'];
		$delete_comment = "DELETE * FROM comment WHERE ID_comment='{$com_id}'";
		$delete_comment_query = mysqli_query($lidhje, $delete_comment);
		header("Location: komente.php");		//Ridrejton ne te njejten faqe per ti dhene refresh pasi eshte fshire nje kategori per te shfaqur ato qe kane mbetur.
	}
}



function search_by_tags(){
		global $lidhje;
		
	if(isset($_POST['search'])){
		$tags = $_POST['tags'];
		
		$search = "SELECT * FROM article WHERE Status='1' AND Tags LIKE '%$tags%'";
		$search_query = mysqli_query($lidhje, $search);
		
		while($row = mysqli_fetch_assoc($search_query)){
			
			$article_id = $row['ID_article'];
			$article_title = $row['Title_article'];
			$article_content = $row['Summary'];
			$article_image = $row['Image'];
			$article_author = $row['ID_user'];
			$article_cat = $row['ID_category'];
			$article_data = $row['Data_article'];
		
			$author = get_user_name($article_author);
			$category = get_category_name($article_cat);
			
			echo '<div id="'. $article_id . '">';
			echo	'<h2>'. $article_title.'</h2>';
			echo	'<h4>In ' . $category . '</h4>';
			echo	'<p><small>By ' . $author. ' On: ' . $article_data. '</small></p>';
			echo	'<div>';
			echo		'<img class="img img-responsive" style="width:100px; height:100px;" src="images/'. $article_image . '">';
			echo		'<p>' . $article_content . '</p>';
			echo	'</div>';
			echo '</div>';
		}
	}
}
?>

