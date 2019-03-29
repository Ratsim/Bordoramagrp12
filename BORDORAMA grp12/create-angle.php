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
        <h2 class="title_create"> CREER UN ANGLE </h2>
        <form action="functions.php" method="POST">

        <div class="form-group">
            <label for="NumAngl"> Numéro </label>
            <input type="text" class="form-control form-control-create" name="NumAngl" placeholder="Rédigez NumAngl"/>
        </div>

<div class="form-group">
            <label for="LibAngl"> Nom </label>
            <input type="text" class="form-control form-control-create" name="LibAngl" placeholder="Rédigez LibAngl"/>
        </div>

<?php $langue = "Langue";
                $requete = "SELECT NumLang FROM LANGUE";
                $stmt = $bdPdo->prepare($requete);
                $stmt->execute([$langue]);
       ?>
       <select name="NumLang" id="NumLang">

       <?php
             while($obj = $stmt->fetch()) {
       ?>
             <option value="<?php echo($obj[0]); ?>"><?php echo($obj[0]); ?></option>> 
       <?php

               }       
       ?>


    <div class="row justify-content-center create-button">
        <input type="submit" value="envoyer l'angle" class="btn btn-primary mb-2 create-button-2 col-lg-1.5" name="create_angle_submit">
    </div>

        </form>

    </div> 

</body>

</html>




            
