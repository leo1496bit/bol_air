<?php
session_start();

$id1=$_SESSION['id1'];
$id2=$_SESSION['id2'];
 $targ_dir="uploads/";
 $targ_file1=$targ_dir . basename($_FILES['identite1']['name']);
 $targ_file2=$targ_dir . basename($_FILES['certificat1']['name']);
 $targ_file11=$targ_dir . basename($_FILES['identite2']['name']);
 $targ_file21=$targ_dir . basename($_FILES['certificat2']['name']);
 $imageFileType1 = strtolower(pathinfo($targ_file1,PATHINFO_EXTENSION));
 $imageFileType2 = strtolower(pathinfo($targ_file2,PATHINFO_EXTENSION));
 $imageFileType11 = strtolower(pathinfo($targ_file11,PATHINFO_EXTENSION));
 $imageFileType21 = strtolower(pathinfo($targ_file21,PATHINFO_EXTENSION));
 $fichier1=$targ_dir.$id1."-piece_identite.".$imageFileType1;
 $fichier2=$targ_dir.$id1."-certificat_medical.".$imageFileType2;
 $fichier11=$targ_dir.$id2."-piece_identite.".$imageFileType11;
 $fichier21=$targ_dir.$id2."-certificat_medical.".$imageFileType21;
 if ($_FILES["identite1"]["size"] > 2000000) {
    echo "le fichier est trop grand";
  }
  if ($_FILES["identite2"]["size"] > 2000000) {
    echo "le fichier est trop grand";
  }
  if ($_FILES["certificat1"]["size"] > 2000000) {
    echo "le fichier est trop grand";
  }
  if ($_FILES["certificat2"]["size"] > 2000000) {
    echo "le fichier est trop grand";
  }
  if($imageFileType1 != "jpg" && $imageFileType1 != "png" && $imageFileType1 != "jpeg"
&& $imageFileType1 != "gif" && $imageFileType1 !="pdf") {
  echo "Sorry, only JPG, JPEG, PNG, PDF & GIF files are allowed.";
}
if($imageFileType11 != "jpg" && $imageFileType11 != "png" && $imageFileType11 != "jpeg"
&& $imageFileType11 != "gif" && $imageFileType11 !="pdf") {
  echo "Sorry, only JPG, JPEG, PNG, PDF & GIF files are allowed.";
}
if($imageFileType2 != "jpg" && $imageFileType2 != "png" && $imageFileType2 != "jpeg"
&& $imageFileType2 != "gif" && $imageFileType2 !="pdf") {
  echo "Sorry, only JPG, JPEG, PNG, PDF & GIF files are allowed.";
}
if($imageFileType21 != "jpg" && $imageFileType21 != "png" && $imageFileType21 != "jpeg"
&& $imageFileType21 != "gif" && $imageFileType21 !="pdf") {
  echo "Sorry, only JPG, JPEG, PNG, PDF & GIF files are allowed.";
}
if (move_uploaded_file($_FILES["identite1"]["tmp_name"], $fichier1)) {
    echo "The file ". basename( $_FILES["identite1"]["name"]). " has been uploaded.";
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
  if (move_uploaded_file($_FILES["identite2"]["tmp_name"], $fichier11)) {
    echo "The file ". basename( $_FILES["identite2"]["name"]). " has been uploaded.";
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
  if (move_uploaded_file($_FILES["certificat1"]["tmp_name"], $fichier2)) {
    echo "The file ". basename( $_FILES["certificat1"]["name"]). " has been uploaded.";
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
  if (move_uploaded_file($_FILES["certificat2"]["tmp_name"], $fichier21)) {
    echo "The file ". basename( $_FILES["certificat2"]["name"]). " has been uploaded.";
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
?>