<?php
include"Navbar.php";

require_once('functions.php');
$id_article = $_GET['id_article'];
$article = getAnArticleToDisplay($id_article);


?>

<!DOCTYPE html>
<html>

 <head>
    <meta charset="utf-8">
    <title>Bordorama</title> 
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Alegreya+Sans|Playfair+Display+SC" rel="stylesheet"> 
    <LINK rel=STYLESHEET href="styles.css" type="text/css">
  </head>

  <body>

    
	<div class="container main-content">
		<div class="row justify-content-center">
			<div class="col-10 align-self-center">
				<div class="row">
					<img class="article_picture" src=<?= $article['UrlPhotA'] ?> >
				</div>
				<div class="row mt-4">
					<h2 style="font-family: 'Playfair Display SC', serif;"><?= $article['LibTitrA']?></h2>
					<div class="mt-3">
						<p style="font-family: 'Alegreya', serif;"><?= $article['LibChapoA']?></p>
						<p style="font-family: 'Alegreya', serif;"><?= $article['Parag1A']?></p>
					</div>
					<div class="mt-3">
						<h3 style="font-family: 'Alegreya', serif;"><?= $article['LibSsTitr1']?></h3>
						<p style="font-family: 'Alegreya', serif;"><?= $article['Parag2A']?></p>
					</div>
					<div class="mt-3">
					<h3 style="font-family: 'Alegreya', serif;"><?= $article['LibSsTitr2']?></h3>
					<p style="font-family: 'Alegreya', serif;"><?= $article['Parag3A']?></p>
					</div>
					<p style="font-family: 'Alegreya', serif;"><?= $article['LibConclA']?></p>
					<form action= <?= "edit-article.php?id_article=".$id_article ?> method="POST" ><input class="btn-primary" type="submit" value="Modifier" name="edit_submit"/></form>
					<form action= <?= "functions.php?id_article=".$id_article ?> method="POST" ><input class="btn-danger" type="submit" value="supprimer" name="delete_submit"/></form>
				</div>			 	
		 	</div>
		 
	 	</div>
 	</div>

</body>

</html>