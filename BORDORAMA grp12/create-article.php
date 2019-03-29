<!DOCTYPE html>
<?php
include"Navbar.php";
require_once('functions.php');
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

    <div class="container main-content create-part">
        <h2 class="title_create"> CREER UN ARTICLE </h2>
        <form action="functions.php" method="POST">

        <div class="form-group">
            <label for="NumArt"> Numéro </label>
            <input type="text" class="form-control form-control-create" name="NumArt" placeholder="Rédigez NumArt"/>
        </div>

        <div class="form-group date">
                    <label for="DtCreA"> Date de création </label>
                    <input type="date" class="form-control form-control-create" name="DtCreA" />
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
        </div>

        <div class="form-group">
            <label for="LibTitrA"> Titre </label>
            <input type="text" class="form-control form-control-create" name="LibTitrA" placeholder="Rédigez LibTitrA"/>
        </div>

        <div class="form-group">
            <label for="LibChapoA"> Chapô </label>
            <textarea name="LibChapoA" class="form-control form-control-create" placeholder="Rédigez LibChapoA" cols="110" rows="5"></textarea> 
        </div>

        <div class="form-group">
            <label for="Parag1A"> 1er paragraphe </label>
            <textarea name="Parag1A" class="form-control form-control-create" placeholder="Rédigez Parag1A" cols="110" rows="5"></textarea>
        </div>

        <div class="form-group">
            <label for="LibSsTitr1"> 1er sous-titre </label>
            <input type="text" class="form-control form-control-create" name="LibSsTitr1" placeholder="Rédigez LibSsTitr1"/>
        </div>

        <div class="form-group">
            <label for="Parag2A"> 2ème paragraphe  </label>
            <textarea name="Parag2A" class="form-control" placeholder="Rédigez Parag2A" cols="110" rows="5"></textarea>
        </div>

        <div class="form-group">
            <label for="LibSsTitr2"> 2ème sous-titre </label>
            <input type="text" class="form-control form-control-create" name="LibSsTitr2" placeholder="Rédigez LibSsTitr2"/>
        </div>

        <div class="form-group">
            <label for="Parag3A"> 3ème paragraphe </label>
            <textarea name="Parag3A" class="form-control form-control-create" placeholder="Rédigez Parag3A" cols="110" rows="5"></textarea>
        </div>

        <div class="form-group">
            <label for="LibConclA"> Conclusion </label>
            <textarea name="LibConclA" class="form-control form-control-create" placeholder="Rédigez LibConclA" cols="110" rows="5"></textarea>
        </div>

        <div class="form-group">
            <label for="UrlPhotA"> Image </label>
            <input type="url" name="UrlPhotA" class="form-control form-control-create" placeholder="Insérer UrlPhotA"/>
        </div>

        <div class="form-group">
            <label for="NumThem"> Thème </label>
            <select name="NumThem" class="form-control form-control-create">
                <option value="2ZQ4">Evenement</option>
                <option value="76D1">Acteur clé</option>
                <option value="F67A">Insolite</option>
            </select> 
        </div>

        <div class="form-group">
            <label for="NumAngl"> Angle </label>
            <select name="NumAngl" class="form-control form-control-create">
                <option value="DF56K">Les spectacles</option>
            </select>
        </div>

        <div class="form-group">
            <label for="NumLang"> Langue </label>
            <select name="NumLang" class="form-control form-control-create">
                <option value="ALL041">Allemand</option>
                <option value="ANGL01">Anglais</option>
                <option value="BULG21">Bulgare</option>
                <option value="FRAN01">Français</option>
                <option value="ITAL11">Italien</option>
                <option value="SPAIN01">Espagnol</option>
                <option value="URS98">Ukrainien</option>
                <option value="URS99">Russe</option>
            </select>
        </div>

        <div class="form-group">
            <label for="NumMoCle"> Mots clé </label>
            <div class="row justify-content-center">
                <input type=text name="NumMoCle" class="form-control form-control-create col-lg-3" placeholder="Mot clé 1"/>
                <input type=text name="NumMoCle" class="form-control form-control-create col-lg-3 offset-md-1" placeholder="Mot clé 2"/>
                <input type=text name="NumMoCle" class="form-control form-control-create col-lg-3 offset-md-1" placeholder="Mot clé 3"/>
            </div>
        </div>
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
    <div class="row justify-content-center create-button">
        <input type="submit" value="envoyer l'article" class="btn btn-primary mb-2 create-button-2 col-lg-1.5" name="create_article_submit">
    </div>

        </form>

    </div> 

</body>

</html>




            
