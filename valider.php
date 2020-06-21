<?php
session_start();
$categorie=$_POST['type']."-".$_POST['gender'];
$equipe=$_POST['club'];
$repas=$_POST['repas'];
$nom1=$_POST['nom1']." ".$_POST['prenom1'];
$naissance1=$_POST['date1'];
$naissance1=implode('-',array_reverse(explode('-',$naissance1)));
$adresse1=$_POST['adresse1'];
$email1=$_POST['email1'];
$telephone1=$_POST['tel1'];
$nom2=$_POST['nom2']." ".$_POST['prenom2'];
$naissance2=$_POST['date2'];
$naissance2=implode('-',array_reverse(explode('-',$naissance2)));
$telephone2=$_POST['tel2'];
$adresse2=$_POST['adresse2'];
$email2=$_POST['email2'];
$_SESSION['id1']=$email1;
$_SESSION['id2']=$email2;
try{
    $bd=new PDO('pgsql:host=localhost;dbname=postgres;port=5432','cristaline','cristaline',
    [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,//set PDO to throw exceptions on error
        PDO::ATTR_ORACLE_NULLS => PDO::NULL_NATURAL,//NULL values are returned as PHP null's
    ]);
}
catch(Exception $e){
    die($e);
}
$bd->exec('SET search_path TO cristaline');
$req=$bd->prepare("call equipe_inserer(:equipe,
:categorie,
:repas,
:nom1,
:adresse1,
:email1,
:telephone1,
:naissance1,
:nom2,
:adresse2,
:email2,
:telephone2,
:naissance2)");
$req->bindParam(':repas',$repas,PDO::PARAM_INT);
$req->bindParam('equipe',$equipe);
$req->bindParam('categorie',$categorie);
$req->bindParam(':nom1',$nom1);
$req->bindParam(':adresse1',$adresse1,PDO::PARAM_STR);
$req->bindParam(':email1',$email1,PDO::PARAM_STR);
$req->bindParam(':telephone1',$telephone1,PDO::PARAM_STR);
$req->bindParam(':naissance1',$naissance1);
$req->bindParam(':nom2',$nom2);
$req->bindParam(':adresse2',$adresse2,PDO::PARAM_STR);
$req->bindParam(':email2',$email2,PDO::PARAM_STR);
$req->bindParam(':telephone2',$telephone2,PDO::PARAM_STR);
$req->bindParam(':naissance2',$naissance2);
$req->execute();
echo "$categorie;$equipe;$repas;$nom1;$naissance1;\n 
$adresse1;$email1;$telephone1;$nom2;$naissance2;
$telephone2;$adresse2;$email2";


?>