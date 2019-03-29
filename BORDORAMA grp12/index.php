<?php

include"Navbar.php";

require_once('functions.php');
if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
$articles = getArticles ();
$best_articles = getArticlesByLikes();
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
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-6 main-content">
				<?php foreach ($articles as $article ):  ?>
					<div class=" mb-5">
						<a href= <?= "show-article.php?id_article=".($article->NumArt) ?> >
						<img class="thumbnail" src=<?= $article->UrlPhotA?> >
					 	<h2 class="mt-2" style="font-family: 'Playfair Display SC', serif;"><?= $article->LibTitrA ?></h2>
					 	<p style="font-family: 'Alegreya', serif;"><?= $article->LibChapoA ?></p>
					 	
					 	</a>
				 	</div>
				 
				<?php endforeach; ?>
			</div>
			<div class="col-md-6">
				<div class="row selected-articles">
					<div>
						<?php foreach ($best_articles as $article ):  ?>
							<div class="d-flex mb-3" style="flex-direction:row; ">
								<img class="mini-thumbnail" src=<?= $article->UrlPhotA?> >
							 	<h2><?= $article->LibTitrA ?></h2>
						 	</div>
						<?php endforeach; ?>
					</div>
				</div>
				<div class="row" style="">
					<div class="banner">

					</div>
				</div>
			</div>
		</div>
	</div>

</body>

</html>
