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


<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="line-control-master/editor.css">
<link rel="stylesheet" href="glDatePicker-master/styles/glDatePicker.darkneon.css">

<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" type="text/css" />

<script type="text/javascript">
	
	$(document).ready(function(){
		
		$('#submit').on('click', function(){
			var article_text = $('textarea').val();
			$('#show').html(article_text);
		});
		
	});
</script>


<!--
<link href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.7.1/css/froala_editor.css" rel="stylesheet" type="text/css" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.7.1/css/froala_editor.min.css" rel="stylesheet" type="text/css" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.7.1/css/froala_style.css" rel="stylesheet" type="text/css" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.7.1/css/froala_style.min.css" rel="stylesheet" type="text/css" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.7.1/css/plugins/colors.css" rel="stylesheet" type="text/css" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.7.1/css/plugins/colors.min.css" rel="stylesheet" type="text/css" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.7.1/css/plugins/draggable.css" rel="stylesheet" type="text/css" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.7.1/css/plugins/draggable.min.css" rel="stylesheet" type="text/css" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.7.1/css/plugins/emoticons.css" rel="stylesheet" type="text/css" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.7.1/css/plugins/emoticons.min.css" rel="stylesheet" type="text/css" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.7.1/css/plugins/special_characters.css" rel="stylesheet" type="text/css" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.7.1/css/plugins/special_characters.min.css" rel="stylesheet" type="text/css" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.7.1/css/plugins/image_manager.css" rel="stylesheet" type="text/css" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.7.1/css/plugins/image_manager.min.css" rel="stylesheet" type="text/css" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.7.1/css/plugins/image.css" rel="stylesheet" type="text/css" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.7.1/css/plugins/image.min.css" rel="stylesheet" type="text/css" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.7.1/css/plugins/table.css" rel="stylesheet" type="text/css" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.7.1/css/plugins/table.min.css" rel="stylesheet" type="text/css" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.7.1/css/plugins/video.css" rel="stylesheet" type="text/css" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.7.1/css/plugins/video.min.css" rel="stylesheet" type="text/css" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.7.1/css/froala_editor.pkgd.css" rel="stylesheet" type="text/css" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.7.1/css/froala_editor.pkgd.min.css" rel="stylesheet" type="text/css" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.7.1/css/plugins/file.css" rel="stylesheet" type="text/css" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.7.1/css/plugins/file.min.css" rel="stylesheet" type="text/css" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.7.1/css/themes/royal.css" rel="stylesheet" type="text/css" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.7.1/css/themes/royal.min.css" rel="stylesheet" type="text/css" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.7.1/css/third_party/embedly.css" rel="stylesheet" type="text/css" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.7.1/css/third_party/embedly.min.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.7.1/js/third_party/embedly.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.7.1/js/plugins/font_size.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.7.1/js/plugins/font_family.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.7.1/js/plugins/paragraph_format.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.7.1/js/plugins/paragraph_style.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.7.1/js/languages/en_gb.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.7.1/js/plugins/file.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.7.1/js/froala_editor.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.7.1/js/froala_editor.pkgd.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.7.1/js/plugins/align.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.7.1/js/plugins/colors.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.7.1/js/plugins/draggable.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.7.1/js/plugins/emoticons.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.7.1/js/plugins/image_manager.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.7.1/js/plugins/image.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.7.1/js/plugins/lists.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.7.1/js/plugins/table.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.7.1/js/plugins/video.min.js"></script>

<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />

<link href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.5.1/css/froala_editor.pkgd.min.css" rel="stylesheet" type="text/css" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.5.1/css/froala_style.min.css" rel="stylesheet" type="text/css" />


<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>


<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.5.1//js/froala_editor.pkgd.min.js"></script>


<link href='https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.7.1/css/froala_editor.min.css' rel='stylesheet' type='text/css' />
<link href='https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.7.1/css/froala_style.min.css' rel='stylesheet' type='text/css' />

<script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.7.1/js/froala_editor.min.js'></script>


<script>
  $(function() {
    $('textarea').froalaEditor()
  });
  
  $(function() {
    $('textarea#eg-royal-theme').froalaEditor({
      // Set royal theme name.
      theme: 'royal'
    })
  });
</script> -->

</head>

<body>

	<div id="wrapper">
		<h1 class="page-header">Welcome </h1>
		<a href="artikuj.php"><button>View articles</button></a>
		<a href="edit_delete_article.php"><button>Edit or delete articles</button></a>
		
		<div class="col-xs-6">
			<form action="" method="post" enctype="multipart/from-data">
				<div class="form-group">
					Article Title <input type="text" class="form-control" name="artikull"/>
					Article content <textarea class="form-control" name="summary" cols="30" rows="20"></textarea>
					Article Tags <input type="text" class="form-control" name="tags"/>
					Article Image <input type="file" name="image"/>
					Article Category <select name="id_category" id="">
					<option value="">Select a Category</option>
					<?php
						
						$query = "SELECT * FROM category";
						$select_categories = mysqli_query($lidhje, $query);
						
						confirmQuery($select_categories);
						
						while($row = mysqli_fetch_assoc($select_categories)){
							$cat_id = $row['ID_category'];
							$cat_title = $row['Title_category'];
							
							echo "<option value='".$cat_id."'>".$cat_title."</option>";
						}
					?>
					</select>
	
					<p>Article author <input type="text" class="form-control" name="author"/></p>
					Article published date <input type="date" class="form-control" name="data"/>
					<input type="text" class="form-control" name="data" id="data"/>
					<script type="text/javascript" src="glDatePicker-master/glDatePicker.js"></script>
					<script type="text/javascript" src="glDatePicker-master/glDatePicker.min.js"></script>
					<p>Article status <select name="status" id="status">
					<option value=""></option>
					<option value="0">0 (Not published)</option>
					<option value="1">1 (Published)</option>
					</select>
					</p>
					Article feature <select name="feature" id="feature">
					<option value=""></option>
					<option value="0">0 (Is not feature)</option>
					<option value="1">1 (Is feature)</option>
					</select>

				</div>

				<div class="form-group">
					<input class="btn btn-primary" type="submit" name="submit" id="submit" value="Add Article"/>
				</div>
			</form>
			
			<?php add_articles();?>
		</div>
		
		
		<div id="show" ></div>
    </div>
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type="text/javascript" src="line-control-master/editor.js"></script>
<script>
    $('textarea').Editor();
	$('#data').glDatePicker();
</script>
</body>

</html>