
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="style_form.css" />
</head>
<body>
    <h1>SECTION 1. IDENTITE</h1>
    <div id="container_1">
    <form action="" method="post">
    <table>
         <tr>
            <td>Sexe</td>
            <td> 
                <select name="sexe">
                    <option></option>
                    <option>Féminin</option>
                    <option>Masculin</option>
                </select> 
            </td>
        </tr>

        <tr>
            <td>Nom:</td>
            <td><input type="text" name="nom2"></td>  <?php /**charger automatiquement à partir de la bdd ces données de la personne qui constituent son profil */?>
            <td>Prénom:</td>
            <td><input type="text" name="prenom2"></td>
        </tr>

        <tr>
            <td>Nom de jeune fille:</td>
            <td><input type="text" name="nom_de_jeune_fille"></td>
        </tr>
       
        <tr>
            <td>Née le:</td>
            <td><input type="text" name="date_de_naissance2"></td>
            <td>à:</td>
            <td><input type="text" name="lieu_de_naissance"></td>
        </tr>
        
        <tr>
            <td>Nationalité:</td>
            <td><input type="text" name="nationalite"></td>
        <tr>

        <tr>
            <td>Adresse:</td>
            <td><input type="text" name="adresse" placeholder="N°, type et nom de voie"></td>
        <tr> 

        <tr>
            <td>Code postal:</td>
            <td><input type="text" name="code_postal"></td>
            <td>Ville:</td>
            <td><input type="text" name="ville"></td>
        </tr> 

        <tr>
            <td>Télephone:</td>
            <td><input type="text" name="telephone"></td>
            <td>E-mail:</td>
            <td><input type="email" name="email"></td>
        </tr> 

        <tr>
            <td>Profession exacte ou dernière profession si retraité:</td>
            <td><input type="text" name="profession"></td>
        <tr>

         <tr>
            <td>situation fiscale</td>
         <td> 
               <?php /**  <input type="radio" name="metropole">  &nbsp;&nbsp;France métropolitaine<br>*/?>
               <?php /**<input type="radio" name="outre_mer">  &nbsp;&nbsp;France d'outre-mer(DOM/TOM/COM)<br>*/?>
               <?php /**<input type="radio" name="ailleurs">   &nbsp;&nbsp;Non résident(Indiquer pays de résidence)*/?>

             <select name="zone">
                    <option>Choisissez</option>
                    <option name="metropole">France métropolitaine</option>
                    <option name="outre_mer">France d'outre-mer(DOM/TOM/COM)</option>
                    <option name="ailleurs">Non résident(Indiquer pays de résidence)</option>
             
             </select><br><br>
             <input type="texte" name="pays_de_residence" placeholder="Votre pays de résidence">  


         </td>
        </tr>

        <tr><input type="text" name="pays_de_residence"></tr>

        <tr>
            <td>Avez-vous un co-souscripteur?(Si oui, cette section identité apparaitra pour votre co-souscripteur)</td>
            <td>
                <select>
                    <option></option>
                    <option><a href="co-souscripteur.php">Oui</a></option>   <?php/**cmt rendre accessible ce lien? et faire apparaitre en double ce formulaire pour le co souscripteur*/?>
                    <option>Non</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>Etre contacté par un conseiller(Choisir une date):</td>
            <td><input type="date" name="conseiller"></td>
            <td></td>
        </tr>
    
    </table>
        <div id="liens">
            <button class="buttonStyle "><a href="form_1.php" >Précédent</a></button>
            <button><input type="submit" value="Sauvegarder" name="ok1" class="border"></button>
           <button><a href="form_2.php" class="border">Suivant</a> </button>
        </div>
    </form>
    </div>

    <?php
    include "connexionBDD.php";
    

    if(isset($_POST["ok1"]))
    {
        
        
        // Check connection
        if($link === false){
            die("ERROR: Echec de connexion. " . mysqli_connect_error());
        }


        $nom2 = $_POST["nom2"];
        $prenom2 = $_POST["prenom2"];
        $nom_de_jeune_fille = $_POST["nom_de_jeune_fille"];
        $date_de_naissance2 = $_POST["date_de_naissance2"];
       
        $lieu_de_naissance = $_POST["lieu_de_naissance"];
        $nationalite = $_POST["nationalite"];
        $adresse = $_POST["adresse"];
        $code_postal = $_POST["code_postal"];
        
        $ville = $_POST["ville"];
        $telephone = $_POST["telephone"];
        $email = $_POST["email"];
        $profession = $_POST["profession"];

        $requeteSouscription="INSERT INTO co_souscripteur(id,nom,prenom,nom_de_jeune_fille,date_de_naissance2,	lieu_de_naissance,	nationalite, adresse, code_postal, ville, telephone, email ,profession, zone_fiscale) 
        values (null,'$nom2','$prenom2','$nom_de_jeune_fille',' $date_de_naissance2',' $lieu_de_naissance',' $nationalite ','$adresse','$code_postal ',' $ville ','$telephone','$email','$profession')";

        echo $requeteSouscription;
        
        $resultatform1 = mysqli_query($link,$requeteSouscription);

    }
    ?>

</body>
</html>