<?php 
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<?php
    include'includes/head.inc.html';
?>

<body>

    <!-- HEADER -->
  <?php
    include'includes/header.inc.html';
  ?>

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

                if(!empty($_POST["customRadio"])){

                    $table["customRadio"] =  $_POST["customRadio"];
                }
 
                $table=[
                    "Firstname" => $_POST["prenom"],
                    "last_name" => $_POST["nom"],
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
                        "age" => $_POST["age"], 
                        "taille" => $_POST["taille"],
                        "color" => $_POST["color"],
                        "dob" => $_POST["dob"],
                
                        ];

                            if(!empty($_POST["customRadio"])){
                                $table["customRadio"] =  $_POST["customRadio"];
                            }

                            if(!empty($_POST["html"])){
                                $table["html"] =  $_POST["html"];
                                
                            }
                            if(!empty($_POST["css"])){
                                $table["css"]= $_POST["css"];
                            }
                            if(!empty($_POST["bootstrap"])){
                                $table["bootstrap"]=  $_POST["bootstrap"];
                            }
                            if(!empty($_POST["PHP"])){
                                $table["PHP"]= $_POST["PHP"];
                            }
                            if(!empty($_POST["Mysql"])){
                                $table["Mysql"]= $_POST["Mysql"];
                            }
                            if(!empty($_POST["javaScript"])){
                                $table["JavaScript"]= $_POST["javaScript"];
                            }
                            if(!empty($_POST["Symfony"])){
                                $table["Symfony"]=  $_POST["Symfony"];

                         
                            }


                            if(!empty($_FILES)){


                                $img = $_FILES['img'];
                                $ext = strtolower(substr($img['name'],-3));
                                $allow_ext = ["jpg", "png"];
                                $not_Allow_Ext = ["pdf"];


                                if(in_array($ext, $allow_ext) && $_FILES['img']['size'] <= "1999999" ) {

                                    move_uploaded_file($img['tmp_name'], "uploaded/".$img['name']);
                                    echo '<div class="alert alert-success" role="alert">';
                                    echo' image enregistrée ';
                                    echo'</div>';
    
                                }



                                elseif(in_array($ext, $not_Allow_Ext)){
                              

                                    echo '<div class="alert alert-danger" role="alert">';
                                    echo' format non autorisé';
                                     echo'</div>';
                                }




                                elseif( $_FILES['img']['size'] > "2000000"  ){

                                echo '<div class="alert alert-danger" role="alert">';
                                echo' taille supérieur à 2 Mo';
                                echo'</div>';
                                }


                                elseif($_FILES['img']['name'] == "") {
       
                                echo '<div class="alert alert-danger" role="alert">';
                                echo' aucune image selectionnée ';
                                echo'</div>';
                                        ;
                                    }
    
                                    
                                    
                                else{
                                        echo"error 1";
                                    }
            
                            }

    

                    $_SESSION['table']=$table;
                    $_SESSION['table']["img"] = $img ;
               

                    echo '<div class="alert alert-success" role="alert">';
                    echo' les données ont bien été enregistrées ';
                    echo'</div>';
                
              

                }
                
                
      
                elseif (isset($_SESSION['table'])){
                 

                        if(isset($_GET['debogage'])){

                        
                            echo'<h2>Débogage</h2>';
                            echo'===> lecture d\'un tableau à l\'aide de la fonction print_r';
                            echo'</br> </br>' ;
                            print "<pre>";
                            print_r ($table);
                            print "</pre>";
                            echo'</div>';
        
                        }elseif(isset($_GET['concatenation'])){

                            echo'<div>';
                            echo'<h2>Concaténation</h2>';
                            echo'</br>';
                            echo'<p> ===> construction d\'une phrase avec le contenu du tableau</p>';
                            echo'</br> </br> ';
                            echo ' <h3> '. $table['Firstname'].' '.  $table["last_name"].' </h3>';
                            echo' </br> ';
                            echo' '.$table['age'].' ans, je mesure ' . $table['taille'] .'m et je fais partie de la formation simplon';
                            echo'</br> </br> ';
                            echo' <p> ===> construction d\'une phrase après maj du tableau </p>';
                            echo' </br> ';
                            echo '  <h3>'. ucwords($table['Firstname'] ).' '.  strtoupper ( $table["last_name"]).'</h3>';  
                            echo' </br> ';
                            echo' '.$table['age'].' ans, je mesure ' . $table['taille'] .'m et je fais partie de la formation simplon';
                            echo'</br> </br> ';
                            echo' <p> ===> affichage d\'une virgule à la place du point pour la taille </p>';
                            echo'</br> </br> ';
                            echo '  <h3>'. ucwords($table['Firstname'] ).' '.  strtoupper ( $table["last_name"]).'</h3>';  
                          
                            echo' ' .str_replace('.', ',', $table['age'].' ans, je mesure ' .   $table['taille']  .'m et je fais partie de la formation simplon' ).' ';
                            echo'</div>';
                        
                        }elseif(isset($_GET['boucle'])){
                            echo'<div>';
                            echo'<h2> Boucle </h2>';
                            echo'</br>';
                            echo'===> lecture d\'un tableau avec la boucle foreach';
                            echo'</br></br>';
                            $i=0;

                      

                        foreach( $table as $key => $value){
             
                            if($key == "img"){
                                echo' à la ligne n'.$i.' correspond la clé "'.$key.'" et contient : <img class = "mw-100"  src="./uploaded/'.$table['img']['name'].'">';
                                $i++;
                            }
    
                            
                            else{
                                echo' à la ligne n'.$i.' correspond la clé "'.$key.'" et contient '.$value.'</br>';
                               
                            }
                            $i++;

                            
                        }

                    
                            echo'</div>';
                        }elseif (isset($_GET['fonction'])){
                            echo'<div>';

    
                            echo'<h2> fonction </h2> </br>';
                            
                            echo' ===> j\'utilise ma fonctione readtable() </br>
                            </br>';

                          
                           
                            function readtable($table) {
                                $i=0;

                             
                            foreach( $table as $key => $value){

                             

                                if($key == "img"){
                                    echo' à la ligne n'.$i.' correspond la clé "'.$key.'" et contient : <img  class = "mw-100"  src="./uploaded/'.$table['img']['name'].'"</br>';
                                    $i++;
                                }
        
                                
                                else{
                                    echo' à la ligne n'.$i.' correspond la clé "'.$key.'" et contient '.$value.'</br>';
                                   
                                }
                                $i++;

                           
                                
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


   <?php
        include'includes/footer.inc.html';

   ?>


</body>

</html>