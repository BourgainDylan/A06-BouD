<?php 
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <title>Document</title>
</head>

<body>

    <!-- HEADER -->
    <div class="jumbotron ">
        <h1 class="display-4">PHP procédural</h1>
        <hr class="my-4">
        <p>j'apprends et je me perfectionne</p>
    </div>

<div class="container">
        <div class="row ">
            <nav class="col-sm-3  ">
                <a href="index.php" class=" btn-block btn btn-outline-secondary ">Home</a>

                <?php

                
            if(isset($_SESSION['table'])){
            

                include'includes/nav.inc.html';
                

            }



?>
            </nav>
            <section class=" col-sm-9 ">

            <?php 

            
            if (!empty($_SESSION)){

                $table=$_SESSION['table'];
  
            }

            
            if(isset($_GET["addmore"])){    


                include'includes/form2.inc.html';
                
              
        
            }

            elseif(isset($_GET["add"])){    


                include'includes/form.inc.html';
             
        
            }

   
    
            
            elseif (isset($_POST['form1'])){

            
 
                $table=[
                    "Firstname" => $_POST["prenom"],
                    "last_name" => $_POST["nom"],
                    "situation" =>$_POST["customRadio"],
                    "age" => $_POST["age"], 
                    "taille" => $_POST["taille"]
                    ];
            
             $_SESSION['table']=$table;
            
              echo' <h1> les données ont bien été enregistrées </h1> ';

        
                }
                elseif(isset($_POST['form2'])){

                    $table=[
                        "Firstname" => $_POST["prenom"],
                        "last_name" => $_POST["nom"],
                        "situation" =>$_POST["customRadio"],
                        "age" => $_POST["age"], 
                        "taille" => $_POST["taille"],
                        "html" => $_POST["html"],
                        "css" => $_POST["css"],
                        "bootstrap" => $_POST["bootstrap"],
                        "PHP" => $_POST["PHP"],
                        "Mysql" => $_POST["Mysql"],
                        "javaScript" => $_POST["javaScript"],
                        "symfony" => $_POST["symfony"],

                        ];
                
                        
                    $_SESSION['table']=$table;
                    echo' <h1> les données ont bien été enregistrées </h1> ';

                        var_dump($table);

                }
                
                
                
                
                
                
                elseif (isset($_SESSION['table'])){
                 

                        if(isset($_GET['debogage'])){

                        
                            echo'<h2>Débogage</h2>';
                            echo'===> lecture d\'un tableau avec la boucle foreach';
                            echo'</br> </br>' ;
                            print "<pre>";
                            print_r ($_SESSION['table']);
                            print "</pre>";
                            echo'</div>';
        
                        }elseif(isset($_GET['concatenation'])){

                            echo'<div>';
                            echo'<h2>Concaténation</h2>';
                            echo'</br>  ';
                            echo' ===> construction d\'une phrase avec le contenu du tableau';
                            echo'</br> </br> ';
                            echo ' '. $_SESSION['table']['Firstname'].' '.   $_SESSION['table']["last_name"].',';
                            echo'</br> </br> ';
                            echo' '.$_SESSION['table']['age'].' ans, je mesure ' . $_SESSION['table']['taille'] .'m et je fais partie de la formation simplon';
                            echo'</br> </br> ';
                            echo' ===> construction d\'une phrase après maj du tableau';
                            echo'</br> </br> ';
                            echo ' '. ucwords($_SESSION['table']['Firstname'] ).' '.  strtoupper ( $_SESSION['table']["last_name"]).',';
                            echo'</br> </br> ';
                            echo' '.$_SESSION['table']['age'].' ans, je mesure ' . $_SESSION['table']['taille'] .'m et je fais partie de la formation simplon';
                            echo'</br> </br> ';
                            echo' ===> affichage d\'une virgule à la place du point pour la taille';
                            echo'</br> </br> ';
                            echo' ' .str_replace('.', ',', $_SESSION['table']['age'].' ans, je mesure ' .   $_SESSION['table']['taille']  .'m et je fais partie de la formation simplon' ).' ';
                           echo'</div>';
                        
                        }elseif(isset($_GET['boucle'])){
                            echo'<div>';
                            echo'<h2> Boucle </h2>';
                            echo'</br>';
                            echo'===> lecture d\'un tableau avec la boucle foreach';
                            echo'</br></br>';
                        foreach( $table as $key => $value){
                            echo' à la ligne n 0 correspond la clé '.$key.' et content '.$value.'</br>';
                        }
                        
                            echo'</div>';
                        }elseif (isset($_GET['fonction'])){
                            echo'<div>';

    
                            echo'<h2> fonction </h2> </br>';
                            
                            echo' ===> j\'utilise ma fonctione readtable() </br>
                            </br>';
                        
                            function readtable($table) {
                            foreach( $table as $key => $value){
                             
                                echo' à la ligne n 0 correspond la clé '.$key.' et content '.$value.'</br>';
                            
                            }
                        
                            }
                        
                            readtable($table);
                        
                            }elseif( isset ($_GET['del'])){



                                echo'<h1>les données ont bien été supprimées </h1>';
                                session_destroy();
                                
                                }

                }

                
                else{

                    echo'<a href="index.php?add" type="button" class="btn btn-primary">Ajouter des données</a>';
                    echo'<a href="index.php?addmore" type="button" class="btn btn-secondary mx-2">Ajouter plus de  données</a>';

                }

         
            ?>

            </section>

        </div>
        </div>


    <footer class="d-flex justify-content-center"> Dylan Bourgain- PHP </footer>


</body>

</html>