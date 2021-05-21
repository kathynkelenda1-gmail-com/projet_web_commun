<?php
session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="inscription.css">
    <title>Inscription</title>
</head>
<body>

    
    <div class='carreI'>    
    <div class='formI'>
    <h2>Etes vous une entreprise ou un particulier ?</h2>
    <form action="" method="post">
    Particulier: <input type="radio" name="type" value="Particulier" required>  &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp  
    Entreprise:<input type="radio" name="type" value="Entreprise" required> <br><br>
    <input type="submit" name="Choisir" value='Choisir'>
    </form>
    

    <?php


 

if(isset($_POST['Choisir'])){
    if ($_POST['type'] == "Particulier")
    {
        ?>        
        <h1>Inscription</h1>
 
        <form action="" method="post">
        
 
        Nom: &nbsp&nbsp <input type="text" name="Nom" placeholder="Entrer votre nom" required><br><br>
        Prenom: &nbsp&nbsp <input type="text" name="Prenom" placeholder="Entrer votre Prenom" required ><br><br>
        Sexe: &nbsp&nbsp    Homme:<input type="radio" name="Sexe" value="Homme" required > &nbsp&nbsp
                            Femme:<input type="radio" name="Sexe" value="Femme" required><br><br>

        Date de naissance: &nbsp&nbsp<input type="date" name="DateNai" id="" required><br><br>

        Nationalité:&nbsp&nbsp    <select name="Nat" required>
        <?php 

        $id = mysqli_connect("127.0.0.1","root","","scpi");
        $req2 = "select nom_fr_fr from pays ";
        $res2 = mysqli_query($id,$req2);
        while($ligne = mysqli_fetch_assoc($res2)){
            ?>
            <option $ligne><?php echo $ligne['nom_fr_fr']?> </option>;
        
            <?php
        }
        ?>
        </select><br><br>
    
        Pays de naissance:&nbsp&nbsp <select name="PaysNai" required >
        <?php 

            
            $req3 = "select nom_fr_fr from pays ";
            $res3 = mysqli_query($id,$req3);
            while($ligne = mysqli_fetch_assoc($res3)){
                ?>
                <option $ligne><?php echo $ligne["nom_fr_fr"]?> </option>;
        
            <?php
            }
            ?>
        </select><br><br>

        Profession:&nbsp&nbsp <input type="text" name="Profession" placeholder="Entrer votre profession"    required><br><br>

        Mail:&nbsp&nbsp <input type="email" name="Mail" placeholder="Entrer votre mail" required><br><br>




        Mot de passe:&nbsp&nbsp <input type="password" name="mdp"  placeholder="Entrer un mot de passe" required><br><br>
        Confirmation du mot de passe:&nbsp&nbsp<input type="password" name="confimdp" placeholder="Confirmer votre mot de passe"required><br><br>

        
   
        
    
    
        <input type="submit" value="S'inscrire" name='ok'>
        </div>
    </div>
    </form>

    <?php



    
   
        
    }else{
        ?>
        <form action="" method="post">
        <br><br><br>
        Mail &nbsp&nbsp <input type="mail" name="Mail" id="" ><br><br>

        Mot de passe: &nbsp&nbsp <input type="password" name="mdp" id=""><br><br>

        Verification mot de passe &nbsp&nbsp <input type="password" name="confimdp" id=""><br><br>

        Forme juridique &nbsp&nbsp<input type="text" name="FormeJur" id=""><br><br>

        Nom/Denomination sociale: &nbsp&nbsp<input type="text" name="NomEntre" id=""><br><br>

        Adresse &nbsp&nbsp <input type="text" name="AdresseEntre" id=""><br><br>

        Code postal &nbsp&nbsp <input type="text" name="CpEntre" id="">

        Ville &nbsp&nbsp<input type="text" name="VilleEntre" id=""><br><br>

        Telephone &nbsp&nbsp<input type="tel" name="TelEntre" id=""> <br><br>

        N°SIRET &nbsp&nbsp<input type="number" name="SIRET" id=""> 

        N°APE &nbsp&nbsp<input type="number" name="APE" id=""><br><br>

        <input type="submit" value="Suivant" name='suivant'>
    
        </form>


        <?php
         
}
}



if(isset($_POST['ok']))
{ 
    
    if ( $_POST['mdp'] != $_POST['confimdp'] ){
        echo "Les 2 mots de passe sont différents";
    
    }else{
        $id = mysqli_connect("127.0.0.1","root","","scpi");
        $Mail = $_POST["Mail"];
        $req = "select Mail from profil where Mail='".$Mail."'";
        $res = mysqli_query($id,$req);

        if ( mysqli_num_rows($res) > 0 ){
            echo "Mail deja pris";
        }else{
    
            echo"Le mot de passe sont corect";
        
            $id = mysqli_connect("127.0.0.1","root","","scpi");
            $ID = null;
            $Nom = $_POST["Nom"];
            $Prenom = $_POST["Prenom"];
            $Sexe = $_POST["Sexe"];
            $DateNai = $_POST["DateNai"];
            $PaysNai = $_POST["PaysNai"];
            $Nat = $_POST["Nat"];
            $Profession = $_POST["Profession"];
            $Mail = $_POST["Mail"];
            $Mdp = $_POST["mdp"];
            
    
       
            $req = "insert into profil values (null,'$Nom','$Prenom','$Sexe','$DateNai','null','null','$Mail','$Profession','$Mdp')";
            $res = mysqli_query($id,$req);


            $_SESSION['ID'] = $ID;
            $_SESSION['Nom'] = $Nom ;
            $_SESSION['Prenom'] = $Prenom;
            $_SESSION['Sexe'] = $Sexe;
            $_SESSION['DateNai'] = $DateNai;
            $_SESSION['Nat'] = $Nat;
            $_SESSION['PaysNai'] = $PaysNai;
            $_SESSION['Mail'] = $Mail;
            $_SESSION['Profession'] = $Profession;
            $_SESSION['Mdp'] = $Mdp;
            header('Location: Profil.php');
        }
    
    }
}

                        //formulaire pour entreprise 


    if(isset($_POST['suivant'])){

        if ( $_POST['mdp'] != $_POST['confimdp'] ){
            echo "Les 2 mots de passe sont différents";
        
        }else{
            $id = mysqli_connect("127.0.0.1","root","","scpi");
            $Mail = $_POST["Mail"];
            $req = "select Mail from profil where Mail='".$Mail."'";
            $res = mysqli_query($id,$req);
    
            if ( mysqli_num_rows($res) > 0 ){
                echo "Mail deja pris";
            }else{
        
                echo"Le mot de passe sont corect";
            
                
                $Mdp = $_POST["mdp"];
                $TelEntre = $_POST["TelEntre"];
                $Mail = $_POST["Mail"];
        
                $SIRET = $_POST["SIRET"];
                $FormeJur = $_POST["FormeJur"];
                $NomEntre = $_POST["NomEntre"];
                $AdresseEntre = $_POST["AdresseEntre"];
                $CpEntre = $_POST["CpEntre"];
                $VilleEntre = $_POST["VilleEntre"];
                $TelEntre = $_POST["TelEntre"];
                $APE = $_POST["APE"];

    
                $_SESSION['SIRET'] = $SIRET;
                $_SESSION['FormeJur'] = $FormeJur ;
                $_SESSION['NomEntre'] = $NomEntre;
                $_SESSION['AdresseEntre'] = $AdresseEntre;
                $_SESSION['CpEntre'] = $CpEntre;
                $_SESSION['VilleEntre'] = $VilleEntre;
                $_SESSION['TelEntre'] = $TelEntre;
                $_SESSION['APE'] = $APE;
                $_SESSION['Mail'] = $Mail;
                $_SESSION['Mdp'] = $Mdp;



                header('Location: inscriptionEntrePrt2.php');
                
            }
        
        }





        

    }
   ?>



    
    
    
 
 
 


    

    
</body>
</html>