<?php

session_start();

// =========================    Redirections to functions   =========================

if(isset($_POST['sign_up_submit']))
{
	Signup();
}

if(isset($_POST['delete_submit']))
{
    DelArticle();
}

if(isset($_POST['sign_in_submit']))
{
   Signin();
}

if(isset($_POST['create_article_submit']))
{
    createArticle();
}

if(isset($_POST['deconnect_submit']))
{
   deconnect();
}

if(isset($_POST['like_submit']))
{	
   AddaLike();
}

if(isset($_POST['edit_article_submit']))
{   
   EditArticle();
}

if(isset($_POST['create_angle_submit']))
{
    createAngle();
}

if(isset($_POST['edit_angle_submit']))
{
    EditAngle();
}

if(isset($_POST['delete_angle_submit']))
{
    delAngle();
}

if(isset($_POST['show_angle_submit']))
{
    GetAngle();
}
// =========================    Articles    =========================

function getArticles(){

	require('connect.php');

	$query_article = "SELECT * FROM ARTICLE";
	$query = $bdPdo->prepare($query_article);
	$query->execute();
	$article = $query->fetchALL(PDO::FETCH_OBJ);
return $article;
}

function getAngles(){

    require('connect.php');

    $query_angle = "SELECT * FROM ANGLE";
    $query = $bdPdo->prepare($query_angle);
    $query->execute();
    $angle = $query->fetchALL(PDO::FETCH_OBJ);
return $angle;
}

function getArticlesByLikes(){
	require('connect.php');
	$query_article = "SELECT * FROM ARTICLE ORDER BY likes DESC LIMIT 0,3";
	$query = $bdPdo->prepare($query_article);
	$query->execute();
	$article = $query->fetchALL(PDO::FETCH_OBJ);
return $article;


}

function getAnglesByLikes(){
    require('connect.php');
    $query_angle = "SELECT * FROM ANGLE ORDER BY likes DESC LIMIT 0,3";
    $query = $bdPdo->prepare($query_angle);
    $query->execute();
    $article = $query->fetchALL(PDO::FETCH_OBJ);
return $angle;


}

function getAnArticleToDisplay($id_article){
	require('connect.php');
	$query_article = "SELECT * FROM ARTICLE WHERE NumArt=(:id_article)";
	$query = $bdPdo->prepare($query_article);
	$query->execute(array(
		':id_article' => $id_article
	));
	$article = $query->fetch();
return $article;

}

function getAnAngleToDisplay($id_angle){
    require('connect.php');
    $query_angle = "SELECT * FROM ANGLE WHERE NumAngle=(:id_angle)";
    $query = $bdPdo->prepare($query_angle);
    $query->execute(array(
        ':id_angle' => $id_angle
    ));
    $angle = $query->fetch();
return $angle;

}

function AddaLike(){
	require('connect.php');

	$article = getAnArticleToDisplay($_GET['id_article']);
	$new_like = ($article['likes'] + 1);
	$query_like = "UPDATE ARTICLE SET likes = :new_like WHERE NumArt=(:id_article)";
	$query = $bdPdo->prepare($query_like);
	$query->execute(array(
		':new_like' => $new_like,
		':id_article' => $_GET['id_article']
	));
	header('Location:show-article.php?id_article='.$_GET['id_article']);


}

function DelArticle(){
   require('connect.php');

   $query_delete = $bdPdo->prepare('DELETE FROM ARTICLE WHERE NumArt=(:id_article)');

   $query_delete->execute(array(

       ':id_article' => $_GET['id_article']

   ));

   header('Location:index.php');
}

function DelAngle(){
   require('connect.php');

   $query_delete = $bdPdo->prepare('DELETE FROM ANGLE WHERE NumAngl=(:id_angle)');

   $query_delete->execute(array(

       ':id_angle' => $_GET['id_angle']

   ));

   header('Location:show-angle.php');
}

function createArticle(){
    
    require('connect.php');

    $query_create = $bdPdo->prepare('INSERT INTO article (NumArt, DtCreA, LibTitrA, LibChapoA, Parag1A, LibSsTitr1, Parag2A, LibSsTitr2, Parag3A, LibConclA, UrlPhotA, NumAngl, NumThem, NumLang) VALUES(:NumArt, :DtCreA, :LibTitrA, :LibChapoA, :Parag1A, :LibSsTitr1, :Parag2A, :LibSsTitr2, :Parag3A, :LibConclA, :UrlPhotA, :NumAngl, :NumThem, :NumLang)'); 
    
    $query_create->execute(array( 
        ':NumArt' => $_POST['NumArt'], 
        ':DtCreA' => $_POST['DtCreA'], 
        ':LibTitrA' => $_POST['LibTitrA'], 
        ':LibChapoA' => $_POST['LibChapoA'],
        ':Parag1A' => $_POST['Parag1A'],
        ':LibSsTitr1' => $_POST['LibSsTitr1'],
        ':Parag2A' => $_POST['Parag2A'],
        ':LibSsTitr2' => $_POST['LibSsTitr2'],
        ':Parag3A' => $_POST['Parag3A'],
        ':LibConclA' => $_POST['LibConclA'],
        ':UrlPhotA' => $_POST['UrlPhotA'],
        ':NumAngl' => $_POST['NumAngl'],
        ':NumThem' => $_POST['NumThem'],
        ':NumLang' => $_POST['NumLang'])); 

    $query_create->closeCursor();
    header('Location:index.php');
}

function createAngle(){
    
    require('connect.php');

    $query_create = $bdPdo->prepare('INSERT INTO angle (NumAngl, LibAngl, NumLang) VALUES(:NumAngl, :LibAngl, :NumLang)'); 
    
    $query_create->execute(array( 
        ':NumAngl' => $_POST['NumAngl'], 
        ':LibAngl' => $_POST['LibAngl'], 
        ':NumLang' => $_POST['NumLang'], 
        )); 

    $query_create->closeCursor();
    header('Location:show-angle.php');
}

function EditArticle(){
    require('connect.php');

    $article = getAnArticleToDisplay($_GET['id_article']);
    $query_edit = $bdPdo->prepare('UPDATE ARTICLE SET LibTitrA = :LibTitrA, LibChapoA = :LibChapoA, Parag1A = :Parag1A, LibSsTitr1 = :LibSsTitr1, Parag2A = :Parag2A, LibSsTitr2 = :LibSsTitr2, Parag3A = :Parag3A, LibConclA = :LibConclA , UrlPhotA = :UrlPhotA WHERE NumArt=(:id_article)');
    $query_edit->execute(array( 

        ':id_article' => $_GET['id_article'],
        ':LibTitrA' => $_POST['LibTitrA'], 
        ':LibChapoA' => $_POST['LibChapoA'],
        ':Parag1A' => $_POST['Parag1A'],
        ':LibSsTitr1' => $_POST['LibSsTitr1'],
        ':Parag2A' => $_POST['Parag2A'],
        ':LibSsTitr2' => $_POST['LibSsTitr2'],
        ':Parag3A' => $_POST['Parag3A'],
        ':LibConclA' => $_POST['LibConclA'],
        ':UrlPhotA' => $_POST['UrlPhotA'])); 
    header('Location:show-article.php?id_article='.$_GET['id_article']);

}

function EditAngle(){
    require('connect.php');

    $query_edit = $bdPdo->prepare('UPDATE ANGLE SET LibAngl = :LibAngl, NumLang = :NumLang WHERE NumAngl=(:id_angle)');
    $query_edit->execute(array( 

        ':id_angle' => $_GET['id_angle'],
        ':LibAngl' => $_POST['LibAngl'], 
        ':NumLang' => $_POST['NumLang'],)); 
    header('Location:show-angle.php?id_angle='.$_GET['id_angle']);

}


// =========================    Account / User    =========================

function Signup(){

	require('connect.php');
	$count = $bdPdo->prepare("SELECT COUNT(*) AS pseudoexist FROM USER WHERE Login=?");
    $count->execute(array($_POST['Login']));
    $req  = $count->fetch(PDO::FETCH_ASSOC);
    $count->closeCursor();

    if($req['pseudoexist']==0) {
        $base = $bdPdo->prepare('INSERT INTO USER(Login,Pass) VALUES(:Login, :Pass)'); 
        $base->execute(array( 
            'Login' => $_POST['Login'], 
            'Pass' => $_POST['Pass'])); 
        $base->closeCursor();
        $_SESSION['erreur']=2;
        header('Location:./sign-in.php');

    } 
    else {
        $_SESSION['erreur']=1;
        header('Location:sign-up.php');
    }
}

function Signin(){

	require('connect.php');
	$count = $bdPdo->prepare("SELECT COUNT(*) AS pseudoexist FROM USER WHERE Login=?");
    $count->execute(array($_POST['Login']));
    $req  = $count->fetch(PDO::FETCH_ASSOC);
    $count->closeCursor();

    if($req['pseudoexist']==0) {
        $_SESSION['erreur2']=2;
        header('Location:sign-up.php');
    } 
    else {
        $testmdp=$bdPdo->prepare("SELECT Pass FROM USER WHERE Login=?");
        $testmdp->execute(array($_POST['Login']));
        $req_2  = $testmdp->fetch(PDO::FETCH_ASSOC);
        $testmdp->closeCursor();

        if ($req_2['Pass']==$_POST['Pass']) {
            $_SESSION['erreur2']=3;
            header('Location:index.php');
        }
        else {
            $_SESSION['erreur2']=2;
            header('Location:login.php');
        }
    }

    

}

function deconnect(){
	require('connect.php');
	if ($_POST['deconnect_submit']==true) {
        $_SESSION['erreur2']=2;
        header('Location:index.php');
    }

}

?>