<?php
session_start();

    $ID = $_SESSION['ID'];     
    $Prenom = $_SESSION['Prenom'];
    $Nom = $_SESSION['Nom']; 
    $Sexe = $_SESSION['Sexe']; 
    $DateNai= $_SESSION['DateNai']; 
    $Nat = $_SESSION['Nat']; 
    $PaysNai = $_SESSION['PaysNai']; 
    $Mail = $_SESSION['Mail']; 
    $Profession = $_SESSION['Profession']; 
    
    
    

    $id = mysqli_connect("127.0.0.1","root","","scpi");
    $req = "select * from profil where ID = '$ID'";
    $res = mysqli_query($id,$req);


    $SIRET = $_SESSION['SIRET']; 
    $FormJur = $_SESSION['FormJur'];  
    $NomEntre = $_SESSION['NomEntre'];  
    $AdresseEntre = $_SESSION['AdresseEntre'];  
    $CpEntre = $_SESSION['CpEntre'];  
    $VilleEntre = $_SESSION['VilleEntre'];  
    $TelEntre = $_SESSION['TelEntre'];  
    $APE = $_SESSION["APE"];
    $Mail = $_SESSION['Mail'];  
    $Mdp = $_SESSION['Mdp'];
    $RespLeg = $_SESSION['RespLeg'];
    $Qualité = $_SESSION['Qualité'];
    $AdresseResp = $_SESSION['AdresseResp'];
    $DateNaiResp = $_SESSION['DateNaiResp'];
    $PaysNaiResp = $_SESSION['PaysNaiResp'];
    $BeneOp = $_SESSION['BeneOp'];
    $Fiscalité = $_SESSION['Fiscalité'];

    $id2 = mysqli_connect("127.0.0.1","root","","scpi");
    $req4 = "select * from profilentre where SIRET= '$SIRET'";
    $res2 = mysqli_query($id2,$req4);  
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="profil.css">
    <title>Document</title>
</head>
<body>
    
</body>
</html>

<div class='carreP'>
    <div class='affichage'>
    <h1>Votre profil</h1>
    <?php

    echo"Votre nom $Nom <br></br>";
    echo"Votre prenom: $Prenom <br></br>";
    echo"Vous etes un/une: $Sexe <br></br>";
    echo"Vous etes né le $DateNai en $PaysNai <br></br>";
    echo"Votre nationalité : $Nat <br></br>";
    echo"Votre mail: $Mail <br></br>";
    echo"Votre pofession: $Profession <br></br>";

    ?>
    </div>
</div>

    <?php

   


    echo"$SIRET,$FormJur,$NomEntre,$AdresseEntre,$CpEntre,$VilleEntre,$TelEntre,$APE,$RespLeg,$Qualité,$AdresseResp,$DateNaiResp,$PaysNaiResp,$BeneOp,$Fiscalité,$Mail";

    ?>