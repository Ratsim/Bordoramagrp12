<!DOCTYPE html>
<?php

require_once('functions.php');

?>
<html>

<head>
	<title>Bordeaux ma scène</title>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="./style.css">

</head>

<body class="sign_up_body">

    <div>
    <a href= "index.php"> <button class="retour_button"> Retour </button> </a>
    </div>

	<div class="container sign_up_part col-lg-3">

            <h2 class="sign_up_title">CONNECTION</h2>

            <form action="functions.php" method="POST">

            <div class="form-group">
                <label for="Login" class="sign_up_label"> Pseudo :</label>
                <input type="text" name="Login" class="form-control form-control-sign"/>
            </div>

             <div class="form-group">
                <label for="Pass" class="sign_up_label"> Mot de passe :</label>
                <input type="password" name="Pass" class="form-control form-control-sign"/>
            </div>

            <div class="form-group sign_in_button">
                <input type="submit" value="Se connecter" name="sign_in_submit" class="btn btn-primary mb-2 sign_up_button_2"/>
            </div>

            </form>

    </div> 

</body>

</html>