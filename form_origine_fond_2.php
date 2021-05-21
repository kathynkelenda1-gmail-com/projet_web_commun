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
    <link rel="stylesheet" href="style_souscription.css"> 
    <link rel="stylesheet" type="text/css" href="style_form.css" />
   
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
   
</head>
<body>
    
<?php 

include "check_connexion.php";
include "connexionBDD.php";
include "barre_de_navigation.php";

?>

<div id="container_1" style="height: 100%">
<br> <br>

<h3>ORIGINE DES FONDS ET OBJET DE L'OPERATION</h3>

<div class="divOrigineFondsOpérationGauche">

<h4>Origine des fonds</h4>

<form action="" method="post">

<select name="origine_des_fonds[]" class="form-select" multiple required>
    <option name="Epargne">Epargne déjà constitué</option>
    <option name="realisation_actif_origine">Réalisation actifs</option>
    <option name="créditétablissement">Crédit </option> 
    <option name="autre"> Autre </option>
    
</select><br>

<label>  Si vous avez selectionné Réalisation d'actifs, veuillez en donner l'origine.</label><br><br>
<input class="form-control" type="text" name="actif_origine"><br><br>

<label> Si vous avez contracté un crédit, veuillez préciser l'établissement s'il vous plait.</label><br>
<input  class="form-control" type="text" name="etablissement_credit"><br><br>

<label> Si vous avez selectionné autre, veuillez le préciser.</label><br><br>
<input  class="form-control" type="text" name="autre_precision"><br><br><br><br>

<?php /*<span class="vertical-line"></span> */?>



<h4>Objet de l'opération</h4> 

<select name="objet_operation[]" class="form-select" multiple required>
    <option name="valorisationcapital">Valorisation de capital</option>
    <option name="constitution de capital">Constitution de capital </option>
    <option name="moyenrevenus">Moyen de revenus</option> 
    <option name="transmissionpatrimoniale">Transmission patrimoniale </option>
    <option name="autre_1">Autre (Préciser):</option> 
</select><br>

<label>Si vous avez selectionné autre, veuillez le préciser. </label>
<input type="text" name="autre_precision1">

<br>

<a href="form_1.php" class="btn btn-outline-secondary" >Précédent</a> 
<input type="submit" class="btn btn-primary" value="Sauvegarder" name="sauvegarder">
<a href="form_souscription_3.php"class="btn btn-outline-secondary" >Suivant</a>

</form>

</div>

<?php
    include "connexionBDD.php";
   

    if(isset($_POST["sauvegarder"]))
    {

        // Check connection
        if($link === false){
            die("ERROR: Echec de connexion. " . mysqli_connect_error());
        }
        $Mail=$_SESSION["Mail"]; 
        echo "$Mail.<br>";
        
        $origine_des_fonds = "";

        
        foreach ($_POST['origine_des_fonds'] as $selectedOption) 
        {
           $origine_des_fonds = $origine_des_fonds. ',' . $selectedOption;
        }
        
        echo "origine_des_fonds => $origine_des_fonds. <br>";

        $objet_operation = "";
        foreach ($_POST["objet_operation"] as $selectedOption) 
        {
           $objet_operation = $objet_operation. ',' . $selectedOption;
        }

 
        $actif_origine=$_POST["actif_origine"];
        $etablissement_credit=$_POST["etablissement_credit"];;
        $autre_precision = $_POST["autre_precision"];

        $autre_precision1 = $_POST["autre_precision1"];

        /*$autre_1_precision = $_POST["autre_1_precision"];*/

        
        /*echo "objet_operation => $objet_operation. <br>";
        echo "actif origine => $actif_origine.<br>";
        echo "etablissement credit :> $etablissement_credit.<br>"
        echo "autre precision => $autre_precision.<br>";
        echo "autre precision1 =>$autre_precision1.<br>";*/

        $requeteFonds="UPDATE formulaire_souscription1 SET origine_des_fonds='$origine_des_fonds'
        ,objet_operation='$objet_operation',actif_origine='$actif_origine',
        etablissement_credit='$etablissement_credit',autre_precision='$autre_precision',
         autre_precision1='$autre_precision1'
          where Mail='$Mail' and id_formulaire='$id_formulaire' "; 
         //   echo"ma requete  est  $requeteFonds";
        $resultatform2 = mysqli_query($link, $requeteFonds);

        header("Refresh:1;url=form_souscription_3.php");
    }
    ?>

</body>
</html>