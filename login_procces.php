<?php

session_start();

$connection = mysqli_connect('localhost', 'root', '', 'blog');

$post = $_POST;  
extract($post);   
$errors = [];

if( filter_var( $email, FILTER_VALIDATE_EMAIL ) == false){
    //filter_var  meg a validate ott nagyaba ez mind kell az emailhez
    $errors[] =' Az email ivalid!!!<br>';
} else {
   $eredmeny = mysqli_query($connection, "select * from admins where email =  '$email'");
   if (mysqli_num_rows( $eredmeny ) === 0 ) {
    $errors[] =' Az email nem található!!!<br>';
   } //mysqli_num_rows segitségével számoltatjuk megy hány email van regelve.
}
$length = mb_strlen( $password,'UTF-8');
if( $length < 4 or $length > 30 ){
    $errors[] ='A jelszó nem jó';
}

if( count($errors) > 0) {
    $_SESSION["hibak"] = $errors;
    $_SESSION["adatok"] = $_POST;
    } else {
        //login folyamat
        $eredmeny = mysqli_query($connection, "select * from admins where email =  '$email'");
        $user = mysqli_fetch_assoc($eredmeny);
        
        $maylogin = password_verify($password, $user["password"]);
        if ( !$maylogin) {
            $_SESSION["hibak"] = ['Hibás belépési adatok!!!'];
            }  else{$_SESSION["user"] = $user;} 
            header("location: admin.php");
            exit;
    }
header("location: login.php"); 
