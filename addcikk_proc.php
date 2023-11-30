<?php

session_start();

$connection = mysqli_connect('localhost', 'root', '', 'blog');

$post = $_POST;
$errors = [];
extract($post);




$cim = mysqli_real_escape_string($connection,$cim);

$length = mb_strlen('UTF-8'); //a trim itt kiszüri a space et és utána meg az utf 8 hogy magyar nyelv.
if( $length < 3 or $length > 100 ) {
    // ez a hiba üzenet!
    $errors[] = 'A cim minimum 3 maximum 100 karakter lehet!!!<br>';
}


$url = mysqli_real_escape_string($connection,$url);
$length = mb_strlen( 'UTF-8');
if( $length < 3 or $length > 25500 ) {
    // ez a hiba üzenet!
    $errors[] = 'A leiras minimum 3 maximum 25500 karakter lehet!!!<br>';
}


$leiras = mysqli_real_escape_string($connection,$leiras);
$length = mb_strlen( 'UTF-8');
if( $length < 3 or $length > 255 ) {
    // ez a hiba üzenet!
    $errors[] = 'A leiras minimum 3 maximum 255 karakter lehet!!!<br>';
}






$posted_by = mysqli_real_escape_string($connection,$posted_by);
$length = mb_strlen( 'UTF-8');
if( $length < 3 or $length > 255 ) {
    // ez a hiba üzenet!
    $errors[] = 'A leirasa minimum 3 maximum 255 karakter lehet!!!<br>';
}

$pcsurl = mysqli_real_escape_string($connection,$pcsurl);
$length = mb_strlen( 'UTF-8');
if( $length < 3 or $length > 25500 ) {
    // ez a hiba üzenet!
    $errors[] = 'A  minimum 3 maximum 25500 karakter lehet!!!<br>';
}





if( count($errors) > 0) {
    $_SESSION["hibak"] = $errors;
    $_SESSION["adatok"] = $_POST;        //ez az összes elküldöt adatot bele helyezi mivel POST!
   // print $_SESSION["adatok"]["name"]  igy érem el az adatokból a nevet kb
    } else {
       
       
       
     mysqli_query($connection, "INSERT INTO `posts`(`id`, `cim`, `url`, `leiras`, `posted_by`, `pcsurl`, `date`) VALUES (NULL, '$cim', '$url','$leiras', '$posted_by','$pcsurl', NULL);");
       $_SESSION["sikeres"] = "Üdvözöllek kedves Admin!!!";
       $_SESSION["successmsg"] = 'A regisztráció sikeres!';

    }
header("location: index.php"); 