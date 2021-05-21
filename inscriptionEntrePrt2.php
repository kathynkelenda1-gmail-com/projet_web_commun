<?php
session_start();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="inscription.css">
    <title>Document</title>
</head>
<body>

    <?php
    
    
    if(isset($_POST['Suivant'])){

        $RespLeg = $_POST["RespLeg"];
        $Qualité = $_POST["Qualité"];
        $AdresseResp = $_POST["AdresseResp"];
        $DateNaiResp = $_POST["DateNaiResp"];
        $PaysNaiResp = $_POST["PaysNaiResp"];
        $BeneOp = $_POST["BeneOp"];
        $Fiscalité = $_POST["Fiscalité"];

        

        $SIRET = $_SESSION['SIRET'];  
        $APE = $_SESSION['APE'];  
        $FormeJur = $_SESSION['FormeJur'];  
        $NomEntre = $_SESSION['NomEntre'];  
        $AdresseEntre = $_SESSION['AdresseEntre'];  
        $CpEntre = $_SESSION['CpEntre'];  
        $VilleEntre = $_SESSION['VilleEntre'];  
        $TelEntre = $_SESSION['TelEntre'];  
        
        $Mail = $_SESSION['Mail'];  
        $Mdp = $_SESSION['Mdp'];  
        
        $id = mysqli_connect("127.0.0.1","root","","scpi");
        $req3 = "insert into profilentre values ('$SIRET','$FormeJur','$NomEntre','$AdresseEntre','$CpEntre','$VilleEntre','$TelEntre','$APE','$RespLeg','$Qualité','$AdresseResp','$DateNaiResp','$PaysNaiResp','$BeneOp','$Fiscalité','$Mail','$Mdp')";
        $res3 = mysqli_query($id,$req3);

        $_SESSION['RespLeg'] = $RespLeg;
        $_SESSION['Qualité'] = $Qualité;
        $_SESSION['AdresseResp'] = $AdresseResp;
        $_SESSION['DateNaiResp'] = $DateNaiResp;
        $_SESSION['PaysNaiResp'] = $PaysNaiResp;
        $_SESSION['BeneOp'] = $BeneOp;
        $_SESSION['Fiscalité'] = $Fiscalité;        
        


        header('Location: Profil.php');

    }

    ?>

    
    <form action="" method="post">
    
    Nom du reponsable légal: &nbsp&nbsp <input type="text" name="RespLeg" id=""><br><br>
    Qualité: &nbsp&nbsp <input type="text" name="Qualité" id=""><br><br>
    Adresse personelle: &nbsp&nbsp <input type="text" name="AdresseResp" id="">

    </select><br><br>
    Né le &nbsp&nbsp <input type="date" name="DateNaiResp" id=""> &nbsp&nbsp à &nbsp&nbsp 

    
    
    <select name="PaysNaiResp" required >
    <?php 

        $id = mysqli_connect("127.0.0.1","root","","scpi");
        $req = "select nom_fr_fr from pays ";
        $res = mysqli_query($id,$req);
        while($ligne = mysqli_fetch_assoc($res)){
            ?>
            <option $ligne><?php echo $ligne["nom_fr_fr"]?> </option>;
    
        <?php
        }
        ?>
    </select><br><br>

    
    bénéficiaire effectif de l'operation: &nbsp&nbsp <input type="text" name="BeneOp" required><br><br>

    Fiscalité: &nbsp&nbsp&nbsp&nbsp     <input type="radio" name="Fiscalité" value="IS">IS &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                                        <input type="radio" name="Fiscalité" value="IR">IR &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                                        <input type="radio" name="Fiscalité" value="Autre"> Autre &nbsp&nbsp&nbsp
                                        


    
    
    

    <input type="submit" name='Précédent' value="Précédent" > &nbsp&nbsp <input type="submit" name="Suivant" value="Suivant" >

    </form>
    


</body>
</html>





