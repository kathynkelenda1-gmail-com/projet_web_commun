<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="style_form.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

</head>
<body>
    <?php 

    include "check_connexion.php";
    include "connexionBDD.php";
    include "barre_de_navigation.php";

    ?>

    <h1>Formulaire de souscription</h1>
    <div id="container_1">
    <form action="" method="post">
    <table>
        
         <tr>
            <td>Zone fiscale</td>
         <td> 
               
             <select name="zone_fiscale" class="form-select">
                    <option>Choisissez</option>
                    <option name="metropole">France métropolitaine</option>
                    <option name="outre_mer">France Outre-mer(DOM/TOM/COM)</option>
                    <option name="ailleurs">Non résident(Indiquer pays de résidence)</option>
             
             </select><br><br><br><br>

             <input type="texte" class="form-control" name="pays_de_residence" placeholder="si non résident, mentionner votre pays de résidence">  

         </td>
        </tr>

        <br><br><br>

        <tr>
            <td>Avez-vous un co-souscripteur?(Si oui, cette section identité apparaitra pour votre co-souscripteur)</td>
            <td>
                <select name = "co_souscripteur_id" class="form-select" >
                    <option>Choisir</option>
                    <option>Oui</option>   <?php/**cmt rendre accessible ce lien? et faire apparaitre en double ce formulaire pour le co souscripteur*/?>
                    <option>Non</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>Etre contacté par un conseiller(Choisir une date):</td>
            <td><input type="date"  class="form-control" name="conseiller"  required></td>
            <td></td>
        </tr>
    
    </table>
        <div id="liens">
            <button class="btn btn-outline-secondary"><a href="form_1.php">Précédent</a></button>
            <input type="submit"  class="btn btn-primary" value="Sauvegarder" name="sauvegarder" >
            <button class="btn btn-outline-secondary"><a href="form_origine_fond_2.php">Suivant</a> </button>
        </div>
    </form>
    </div>

    

    <?php
   
  

    if(isset($_POST["sauvegarder"]))
    {
        
        
        // Check connection
        if($link == false){
            die("ERROR: Echec de connexion. " . mysqli_connect_error());
        }

        $Mail=$_SESSION["Mail"];
        
        $zone_fiscale = $_POST["zone_fiscale"]; 
        echo $zone_fiscale;
        
        $pays_de_residence = $_POST["pays_de_residence"];

        $co_souscripteur = $_POST["co_souscripteur_id"];
        

         
        $co_souscripteur_id = $_POST["co_souscripteur_id"]; 
        $conseiller = $_POST["conseiller"];
        
        
        if($zone_fiscale!="" and $conseiller !=""){

            $requeteSouscription="INSERT INTO formulaire_souscription1(id_formulaire,Mail,zone_fiscale,pays_de_residence, co_souscripteur_id,conseiller) 
            values (null,'$Mail', '$zone_fiscale','$pays_de_residence','$co_souscripteur_id','$conseiller')";
        
            $last_id = "";
            
            $resultatform1 = mysqli_query($link,$requeteSouscription);

                if($resultatform1)
                {

                    
                    $_SESSION['id_formulaire'] = GetLatsId();

                    $id_formualire = $_SESSION['id_formulaire'];

                    echo "formulaire_id => $id_formualire ";

                    if($co_souscripteur == 'Oui') {
                    header("Refresh:1;url=form_cosouscripteur.php");
                    }
                    else {
                    header("Refresh:1;url=form_origine_fond_2.php");
                    }


                } else{
                    echo "erreur de requete $requeteSouscription. " . mysqli_error($link);
                }

        }
        else{
            echo"Veuillez renseigner votre zone fiscale et/ou ".
             "date à laquelle vous souhaitez etre recontacter par l'un de nos conseiller.";
        }

    }

    function GetLatsId ()
    {
        include "connexionBDD.php";
        $last_id = "";
        $requeteAffichageTableauProduits = "select  max(id_formulaire) as id_formulaire from formulaire_souscription1";
        $res = mysqli_query($link, $requeteAffichageTableauProduits);
        while($ligne = mysqli_fetch_assoc($res)) //Permet de récuperer ligne par ligne chaque résultat dans le listing des résultats
        {
            $last_id = $ligne["id_formulaire"];
        }
        return $last_id;
    }

    ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

</body>
</html>