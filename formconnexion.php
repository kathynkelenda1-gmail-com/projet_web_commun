<?php
session_start();


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="formconnexion.css">
    <title>Page de connexion</title>
</head>
<body>





<?php 
    
  
    



    if(isset($_POST["ok"])){
        $id = mysqli_connect("127.0.0.1","root","","scpi");
        $Mail = $_POST["mail"];
        $Mdp = $_POST["mdp"];
        $req = "select * from profil where mail='$Mail' and Mdp='$Mdp'";
        $res = mysqli_query($id,$req);
       
        if(mysqli_num_rows($res)>0)
        {
           
            
            $res = mysqli_query($id,$req);
            $req = "select max(id) as maxi from profil";
            $req = "select id from profil order by id desc limit 1";
            $res = mysqli_query($id,$req);
            $ligne = mysqli_fetch_assoc($res);
            
            $_SESSION['ID'] = $ID;
            $_SESSION['Mail'] = $Mail;
            $_SESSION['Mdp'] = $Mdp;
            $_SESSION['Nom'] = $Mdp;
           /* header('Location: Profil.php');*/
            header('Location:form_situation_fiscale_1.php');
            
            exit();
        
        }else{
        $erreur =  "Erreur de mail ou mot de passe";
        }
    }


?>
<div class="carre">
    <div class="formu">

<h1>&nbsp&nbsp&nbsp&nbsp&nbspSCPI</h1>


<form action="" method="post" class="Formulaire">
    
    <input type="text" name="mail" placeholder="e-mail" required><br><br>
    <input type="password" name="mdp" placeholder="Mot de passe" required><br><br>
    <?php if(isset($erreur)) echo "<h4>$erreur</h4>"; ?>
    <input type="submit" value="Connexion" id="btn2" name='ok' >
    <input type="submit"  value="Inscription" id="btn1" onclick="window.location.href = 'http://127.0.0.1/PHP/SCPI/Inscription.php';">
    
    

</form>

    

    </div>
</div>
</body>
</html>