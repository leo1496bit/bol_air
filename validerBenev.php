<?php
$nom=$_POST['nom']." ".$_POST['prenom'];
$naissance=$_POST['date'];
$naissance=implode('-',array_reverse(explode('-',$naissance)));
$adresse=$_POST['adresse'];
$email=$_POST['email'];
$telephone=$_POST['tel'];
$code=idate('U');
$code='EXT'.$code;
if(isset($_POST['permis'])){
    $permi=$_POST['permis'];
    $numero_permi=$_POST['numPerm'];
$lieu_permi=$_POST['LieuPerm'];
$date_permi=$_POST['datePerm'];
$date_permi=implode('-',array_reverse(explode('-',$date_permi)));
}
if(isset($_POST['brevet'])){
    $brevet=$_POST['brevet'];
}
else{
    $brevet='non';
}
if(!empty($_POST['sup'])){
    $infos=$_POST['sup'];
}
else{
    $infos="Rien à signaler";
}

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
if(isset($permi)){
    $req=$bd->prepare('call inserer_benevolePermis(:nom,:adresse,:naissance
    ,:brevet,:code,:telephone,:infos,
    :numPerm,:date_permi,:lieu_permi)');
    $req->bindParam(':nom',$nom);
    $req->bindParam(':adresse',$adresse,PDO::PARAM_STR);
    $req->bindParam(':naissance',$naissance);
    $req->bindParam(':brevet',$brevet,PDO::PARAM_STR);
    $req->bindParam(':code',$code);
    $req->bindParam(':telephone',$telephone,PDO::PARAM_STR);
    $req->bindParam(':infos',$infos,PDO::PARAM_STR);
    $req->bindParam('numPerm',$numero_permi,PDO::PARAM_STR);
    $req->bindParam(':date_permi',$date_permi,PDO::PARAM_STR);
    $req->bindParam(':lieu_permi',$lieu_permi,PDO::PARAM_STR);
    $req->execute();
}
else{
    $req=$bd->prepare('call inserer_benevole(:nom,:adresse,:naissance
    ,:brevet,:code,:telephone,:infos)');
    $req->bindParam(':nom',$nom);
    $req->bindParam(':adresse',$adresse,PDO::PARAM_STR);
    $req->bindParam(':naissance',$naissance);
    $req->bindParam(':brevet',$brevet,PDO::PARAM_STR);
    $req->bindParam(':code',$code);
    $req->bindParam(':telephone',$telephone,PDO::PARAM_STR);
    $req->bindParam(':infos',$infos,PDO::PARAM_STR);
    $req->execute();
}
echo $code;