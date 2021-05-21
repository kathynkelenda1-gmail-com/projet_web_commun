<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div id="produit_offerts">

<h1>Produits offerts</h1>

<form action="" method="post">

    <label>codeP:</label> 
    <input type="text" name="codeP"><br><br>

     <label>nomP:</label>
    <input type="text" name="nomP"><br><br>

    <label>imageP:</label>
    <input type="text" name="imageP"><br><br>

    <label>descriptionP:</label>
    <input type="text" name="descriptionP"><br><br>

    <label>prixP:</label>
    <input type="number" name="prixP"><br><br>

    <label>partP:</label>
    <input type="number" name="partP"><br><br>

    <label>Adresse:</label>
    <input type="text" name="adrueP"><br><br>

    <label>code postal et ville:</label>
    <input type="text" name="cp_villeP"><br><br>


<input type="submit" name="sauvegarder">

</form>


<?php
include "connexionBDD.php";


if(isset($_POST["sauvegarder"]))
{
    
    
    // Check connection
    if($link === false){
        die("ERROR: Echec de connexion. " . mysqli_connect_error());
    }

    $codeP = $_POST["codeP"];
    $nomP = $_POST["nomP"];
    $imageP = $_POST["imageP"];
    $descriptionP = $_POST["descriptionP"];
    $adrueP = $_POST["adrueP"];
    $cp_ville = $_POST["cp_villeP"];
    $prixP = $_POST["prixP"];
    $partP = $_POST["partP"];


    $requeteProduits="INSERT INTO produits_offerts(codeP, nomP , imageP,descriptionP,cp_ville,adrueP,prixP, partP ) 
    values ('$codeP', '$nomP','$imageP','$descriptionP','$cp_ville','$adrueP','$prixP','$partP')";

    echo $requeteProduits;

    
    $resultatProduits = mysqli_query($link, $requeteProduits);
}

?>

</body>
</html>