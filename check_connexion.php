<?php
if(!isset($_SESSION)) { 
    session_start(); 
} 

$Mail=$_SESSION["Mail"];

$id_formulaire = "";
if(isset($_SESSION['id_formulaire']))
{
    $id_formulaire = $_SESSION['id_formulaire'];
}
//echo '<div style = "margin:right; width:100%"> Bienvenu(e) '.  $Mail  .'</div>';


//echo "formulaire_id => $id_formulaire <br>";


if(!isset($Mail)){
header("Location:4_Souscrire.php");

}



?>