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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

</head>
<body>
<?php 

include "check_connexion.php";
include "connexionBDD.php";
include "barre_de_navigation.php";

?>
<div class="divSec3first" >


<h2> 1. Selection Produit </h2> 
    Vous ne pouvez souscrire qu'à un seul produit par souscription. <br /> <br /><br />
    <div> 
       
        <?php

    
            // initialisation à vide pour le depart
            $choix_produit_code = "";
            $prix_produit_selectionnee = "";
            $part_produit_selectionnee = "";
            $montant_souscription_produit="";
            
            $Mail=$_SESSION["Mail"];
            

            if(isset($_POST['selection']))
            {
                $choix_produit_code = $_POST['choix_produit'];

                //echo $choix_produit_code;
                //echo $_POST['choix_produit'];
                $requete_donnee_produit_selectionnee = "Select prixP, partP  from produits_offerts where codeP = '".$choix_produit_code."'";
                //echo $requete_donnee_produit_selectionnee;
                $requeteProduitSelectionnee = mysqli_query($link,$requete_donnee_produit_selectionnee);
                while($ligne = mysqli_fetch_assoc($requeteProduitSelectionnee))
                {
                    $prix_produit_selectionnee = $ligne['prixP']; 
                    $part_produit_selectionnee = $ligne['partP'];

                    /*echo $ligne['prixP']; 
                    echo '<br/>';
                    echo $ligne['partP'];*/
                }
            }
            // deuxieme formulaire
            else if(isset($_POST['choix_part']))
            {
                // id caché dans le deuxieme formulaire
                $choix_produit_code = $_POST['codeP'];
                $part_souscris_produit=$_POST["part_souscris"];
                

                //echo $choix_produit_code;
                //echo $_POST['choix_produit'];
                $requete_donnee_produit_selectionnee = "Select prixP, partP  from produits_offerts where codeP = '".$choix_produit_code."'";
                //echo $requete_donnee_produit_selectionnee;
                $requeteProduitSelectionnee = mysqli_query($link,$requete_donnee_produit_selectionnee);
                while($ligne = mysqli_fetch_assoc($requeteProduitSelectionnee))
                {
                    $prix_produit_selectionnee = $ligne['prixP']; 
                    $part_produit_selectionnee = $ligne['partP'];
                   
                    
                    /*echo $ligne['prixP']; 
                    echo '<br/>';
                    echo $ligne['partP'];*/

                    $montant_souscription_produit = $prix_produit_selectionnee * $part_souscris_produit;
                    
                    //echo 'montant total : '.$montant_total;
                }

               
                $part_souscris_produit=$_POST["part_souscris"];
                $requeteRecupPart_souscris="UPDATE formulaire_souscription1 SET part_souscris='$part_souscris_produit' 
                where Mail='$Mail'  and id_formulaire='$id_formulaire' ";
                $resultatRecupPart_souscris= mysqli_query($link,$requeteRecupPart_souscris);
                
            }
            //troisemeformulaire formulaire
            else if(isset($_POST['Sauvegarder']))
            {   echo 'sauvegarder'; 

                $montant_souscription_produit=$_POST['montant_souscription'];
                $compte_cheque=$_POST['compte_cheque'];
                $compte_virement=$_POST['compte_virement'];
                $requeteRecupSuite="UPDATE formulaire_souscription1 SET montant_souscription_produit='$montant_souscription_produit',compte_cheque='$compte_cheque',compte_virement='$compte_virement'
                        where Mail='$Mail'  and id_formulaire='$id_formulaire'  ";
                $resultatRecupSuite=mysqli_query( $link, $requeteRecupSuite);
                
                header("Refresh:1;url=form_coordonnee_bancaires_4.php");
            }
            else 
            {
                echo "Veuillez selectionner un produit";
            }

            
            ?>

            
    Selectionner un produit:
    <form action="form_souscription_3.php" method="post">
        <select name="choix_produit" class="form-select">
            <?php 
            $requeteChoix = "select codeP, nomP from produits_offerts order by nomP";
            $resultatChoix = mysqli_query($link,$requeteChoix);
                while($ligne = mysqli_fetch_assoc($resultatChoix))
                {
                ?>
                    <option value="<?=$ligne["codeP"];?>"><?=$ligne["nomP"];?></option>
                <?php
                }
                ?>
        </select>

        <br/>
        <br/>

        <input type="submit" class="btn btn-primary" name="selection" value="Valider">

        <br><br>

        </form>
    
    </div>

    <h2> 2. Saise de nombre de part </h2>

    <form action="form_souscription_3.php" method="post">

    <input type="hidden" value="<?=$choix_produit_code;?>" name="codeP" id ="codeP">
    
    <div>Prix d'une part': <input class="form-control" type="text" value="<?=$prix_produit_selectionnee;?>" name="partA"> </div> <br>

    <div>Nombre de part disponible : <input class="form-control" type="number" value="<?=$part_produit_selectionnee;?>" name="part_dispo"> </div> <br>

    <div>Nombre de part souscris : <input class="form-control" type="number" value="<?=$part_souscris_produit;?>" name="part_souscris"> </div> <br>
    
    <input type="submit" name="choix_part" class="btn btn-primary" value="Cliquer pour connaitre le montant total"/> <br> <br>

    </form>

   
    <h2> 3. Montant total à payer </h2>

    <form action="form_souscription_3.php" method="post">

    <input type="hidden" value="<?=$prix_produit_selectionnee;?>" name="codeP" id ="codeP">

    <div>Montant de souscription(A*B): <input type="text" value="<?=$montant_souscription_produit;?>" name="montant_souscription"> </div> <br>
    <div>Dont comptant par chèque: <input type="text" name="compte_cheque"> </div> <br>
    <div>Dont comptant par virement: <input type="text" name="compte_virement"> </div> <br>
    <a href="form_situation_fiscale.php" class="btn btn-outline-secondary">Précédent</a>
     <input type="submit" name="Sauvegarder" value="sauvegarder" class="btn btn-primary">
      <a href="form_coordonnee_bancaires_4.php" class="btn btn-outline-secondary">Coordonnee Bancaires</a><br>

    </form>

</div>

</body>
</html>