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
    include "barre_de_navigation.php";

    ?>


    <h1>Produits offerts</h1><hr>
    <table class="table">
        <tr>
        <th scope="col">Nom du produit</th>
        <th scope="col">Description</th>
        <th scope="col">Prix d'une part</th>
        <th scope="col">Nombre de part disponibles</th> 
        <th scope="col">adresse</th>
        <th scope="col">code postal</th>
        </tr>

        
   <?php
   
    
    include "connexionBDD.php";

   $requeteAffichageTableauProduits = "select * from produits_offerts order by codeP";
   $res = mysqli_query($link, $requeteAffichageTableauProduits);
   while($ligne = mysqli_fetch_assoc($res)) //Permet de récuperer ligne par ligne chaque résultat dans le listing des résultats
   {
            echo "<tr>
                        <td>".$ligne["nomP"]."</td>
                        <td>".$ligne["descriptionP"]."</td>
                        <td>".$ligne["prixP"]."</td>
                        <td>".$ligne["partP"]."</td>
                        <td>".$ligne["adrueP"]."</td>
                        <td>".$ligne["cp_ville"]."</td>
                </tr>";
    }

   ?>
    </table>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

</body>
</html>