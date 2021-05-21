<?php 
include "check_connexion.php";
include "connexionBDD.php";
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    
</head>
<body>

<?php 

include "check_connexion.php";
include "connexionBDD.php";
include "barre_de_navigation.php";

?>
    
    <h2>Coordonnées bancaires</h2>

    <form action="" method="post">

        Titulaire du compte:
        <input type="text" name="titulaire_compte"> <br/><br/>

        IBAN:
        <input type="text" name="iban"><br/><br/>

        BIC:
        <input type="text" name="bic"> <br/><br/>

        <input type="checkbox" name="cgu" id="cgu"
                    value="1" required>En cochant cette caste vous valider tout le formulaire souscrit<br><br/>

        <input type="submit" name="sauvegarder" value="sauvegarder">

    </form>

    <?php

    if(isset($_POST["sauvegarder"])){

         
        // Check connection
        if($link === false){
            die("ERROR: Echec de connexion. " . mysqli_connect_error());
        }

        $Mail=$_SESSION["Mail"];

        $titulaire_compte=$_POST["titulaire_compte"];
        $iban=$_POST["iban"];
        $bic=$_POST["bic"];
        $cgu = $_POST["cgu"];

        $validation = "validation";

        $requeteSouscription="UPDATE formulaire_souscription1 SET titulaire_compte='$titulaire_compte',
         iban='$iban' , bic='$bic', $validation = '$cgu'
          where Mail='$Mail' and id_formulaire='$id_formulaire' ";
        
        $resultatform1 = mysqli_query($link,$requeteSouscription);

        
        header("Refresh:1;url=succes.php");

    }

    ?>
</body>
</html>