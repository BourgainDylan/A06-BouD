<?php
session_start();

include'includes/head.inc.html';

include'includes/header.inc.html';



echo'<a href="index.php"  class="btn btn-outline-secondary">Home</a>';
echo'<a href="index.php?add"   class="btn btn-outline-secondary">ajout de données</a>';

if( !empty($_SESSION)){

     
  $table=$_SESSION['table'];

}

if(isset($_GET["add"])){ 

    include'includes/form.inc.html';
  
}elseif (!empty($_POST)){

 
    $table=[
        "Firstname" => $_POST["prenom"],
        "last_name" => $_POST["nom"],
        "situation" =>$_POST["customRadio"],
        "age" => $_POST["age"], 
        "taille" => $_POST["taille"]
        ];

   
  $table=$_SESSION['table'];

   

  echo' <h1> les données ont bien été enregistrées </h1> ';


}elseif (isset($_SESSION['table']) ){
  
    include'includes/nav.inc.html';
   
    
}if (isset($_GET['debogage']) ){

   
    echo'<h2>Débogage</h2>';
    echo'</br> </br> </br> ' ;
    print "<pre>";
    print_r ($_SESSION['table']);
    print "</pre>";


}if (isset($_GET['concatenation'])){

    echo'<h2>Concaténation</h2>';
    echo'</br> </br> ';
    echo' ===> construction d\'une phrase avec le contenu du tableau';
    echo'</br> </br> </br>';
    echo ' '. $_SESSION['table']['Firstname'].' '.   $_SESSION['table']["last_name"].',';
    echo'</br> </br> ';
    echo' '.$_SESSION['table']['age'].' ans, je mesure ' . $_SESSION['table']['taille'] .'m et je fais partie de la formation simplon';
    echo'</br> </br> </br>';
    echo' ===> construction d\'une phrase après maj du tableau';
    echo'</br> </br> ';
    echo ' '. ucwords($_SESSION['table']['Firstname'] ).' '.  strtoupper ( $_SESSION['table']["last_name"]).',';
    echo'</br> </br> ';
    echo' '.$_SESSION['table']['age'].' ans, je mesure ' . $_SESSION['table']['taille'] .'m et je fais partie de la formation simplon';
    echo'</br> </br> </br>';
    echo' ===> affichage d\'une virgule à la place du point pour la taille';
    echo'</br> </br> ';
    echo' ' .str_replace('.', ',', $_SESSION['table']['age'].' ans, je mesure ' .   $_SESSION['table']['taille']  .'m et je fais partie de la formation simplon' ).' ';



} 

if(isset($_GET['boucle']) ){

echo'<h2> Boucle </h2>';
    var_dump($table);


}



if(isset($_GET['fonction']) ){

    echo'<h2> fonction </h2>';
    
    
    
    }
    
    



// include'includes/form.inc.html';
// include'includes/footer.inc.html';





?>

