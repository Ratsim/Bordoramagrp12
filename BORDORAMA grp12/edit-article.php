<!DOCTYPE html>
<?php
include"Navbar.php";
require_once('functions.php');
$id_article = $_GET['id_article'];
$article = getAnArticleToDisplay($id_article);
include "connect.php" ;

?>
<html>

<head>
    <meta charset="utf-8">
    <title>Bordorama</title> 
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <LINK rel=STYLESHEET href="styles.css" type="text/css">
  </head>

  <body>

    <div class="container main-content col-lg-5">
        <h2> Modifier un Article</h2>
        <form action=<?= "functions.php?id_article=".$id_article ?> method="POST">

        <div class="form-group">
            <label for="LibTitrA"> Titre </label><br/>
            <input type="text" class="form-control" name="LibTitrA" value=<?= $article['LibTitrA'] ?> >
        </div>

        <div class="form-group">
            <label for="LibChapoA"> Chapô </label><br/>
            <textarea name="LibChapoA" cols="110" rows="5" class="form-control"><?= $article['LibChapoA'] ?></textarea>
        </div>

        <div class="form-group">
            <label for="Parag1A"> 1er paragraphe </label><br/>
            <textarea name="Parag1A" class="form-control" cols="110" rows="5"><?= $article['Parag1A'] ?></textarea>
        </div>

        <div class="form-group">
            <label for="LibSsTitr1"> 1er sous-titre </label><br/>
            <input type="text" class="form-control" name="LibSsTitr1" value="<?= $article['LibSsTitr1'] ?>"/>
        </div>

        <div class="form-group">
            <label for="Parag2A"> 2ème paragraphe </label><br/>
            <textarea name="Parag2A" cols="110" rows="5" class="form-control"><?= $article['Parag2A'] ?></textarea>
        </div>

        <div class="form-group">
            <label for="LibSsTitr2"> 2ème sous-titre </label><br/>
            <input type="text" class="form-control" name="LibSsTitr2" value="<?= $article['LibSsTitr2'] ?>"/>
        </div>

        <div class="form-group">
            <label for="Parag3A"> 3ème paragraphe </label><br/>
            <textarea name="Parag3A" cols="110" rows="5" class="form-control"><?= $article['Parag3A'] ?></textarea>
        </div>

        <div class="form-group">
            <label for="LibConclA"> Conclusion </label><br/>
            <textarea name="LibConclA" cols="110" rows="5" class="form-control"><?= $article['LibConclA'] ?></textarea>
        </div>

        <div class="form-group">
            <label for="UrlPhotA"> Image </label><br/>
            <input type="url" class="form-control" name="UrlPhotA" value="<?= $article['UrlPhotA'] ?>"/>
        </div>

          <!--Faire une liste box pour angle, langue et thématique-->    
          <p>Choix de : angle langue thématique </p>

        <?php   
                $angle = "Angle";      
                $requete = "SELECT * FROM ANGLE";
                $stmt = $bdPdo->prepare($requete);
                $stmt->execute([$angle]);
          ?>      
        <SELECT>

       <?php  
                while($obj = $stmt->fetch()) {
       ?>
                <option value="<?php  echo($obj[0]);   ?>"><?php echo($obj[1]); ?></option>> 
       <?php
                }
       ?>
       </SELECT> 

       <?php $langue = "Langue";
                $requete = "SELECT * FROM LANGUE";
                $stmt = $bdPdo->prepare($requete);
                $stmt->execute([$langue]);
       ?>
       <SELECT>

       <?php
             while($obj = $stmt->fetch()) {
       ?>
             <option value="<?php  echo($obj[0]);   ?>"><?php echo($obj[1]); ?></option>> 
       <?php

               }       
       ?>
       </SELECT> 
       <?php 
             $thematique = "Thématique";
             $requete = "SELECT * FROM THEMATIQUE";
             $stmt = $bdPdo->prepare($requete);
             $stmt->execute([$thematique]);
      ?>
      <SELECT>
      <?php
             while($obj = $stmt->fetch()) {
      ?>
             <option value="<?php  echo($obj[0]); ?>"><?php echo($obj[1]); ?></option>> 
      <?php
             }
      ?>
      </SELECT></div><br><br>
            <input type="submit" value="edit_article" class="btn btn-primary mb-2" name="edit_article_submit">

            <br/>
            <br/>

        </form>

    </div> 

</body>

</html>