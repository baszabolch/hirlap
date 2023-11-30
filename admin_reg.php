<?php
//ITT KELL A SESSION STARTOT PL MEGHIVNI!
session_start();
//db init
$connection = mysqli_connect('localhost', 'root', '', 'blog');
//print_R($_GET); is igy kell
/* $name = $_POST["name"];
 $email = $_POST["email"];
 $pasword = $_POST["pasword"];
 $pasword_confirm = $_POST["pasword_confirm"];


 //név min4 max 20 karakter.
 $errors = [];


if ( strlen( $name) < 4 or strlen( $name) > 20 ){
  $errors[] = 'A név minimum 4 maximum 20 karakter lehet!!!<br>';
}
if( filter_var($email, FILTER_VALIDATE_EMAIL) == false ){
    $errors[] = 'invalit email!<br>';
}
if ( strlen( $pasword) < 4 or strlen( $pasword) > 20 ){
    $errors[] = 'A jelszó minimum 4 maximum 20 karakter lehet!!!<br>';
}
if( $pasword != $pasword_confirm) { $errors[] = 'jelszavak nem egyeznek!<br>';
}

$hibakszama = count($errors); 
if ($hibakszama > 0) {
    foreach ( $errors as $err) {
        print "$err<br>";
    }
} else {
    print "sikeres ürlap küldés!";
}*/
$post = $_POST;  //itt befogjuk a postból az adatokat rögtön egy változóba

extract($post);   //itt átalakitjük őket
$errors = [];
$username = mysqli_real_escape_string($connection,$username);  //ezt minden változóval meg kéne csinálni ami bekerül az sql parancsba! biztonsági okok.
// validáljuk a felhasználó név hosszát és hogy ne legyen benne space
$length = mb_strlen( trim($username),'UTF-8'); //a trim itt kiszüri a space et és utána meg az utf 8 hogy magyar nyelv.
if( $length < 4 or $length > 30 ) {
    // ez a hiba üzenet!
    $errors[] = 'A név minimum 4 maximum 30 karakter lehet!!!<br>';
}
if( filter_var( $email, FILTER_VALIDATE_EMAIL ) == false){
    //filter_var  meg a validate ott nagyaba ez mind kell az emailhez
    $errors[] =' Az email ivalid!!!<br>';
} else {
   $eredmeny = mysqli_query($connection, "select * from admins where email =  '$email'");
   if (mysqli_num_rows( $eredmeny ) > 0 ) {
    $errors[] =' Az email már foglalt!!!<br>';
   } //mysqli_num_rows segitségével számoltatjuk megy hány email van regelve.
}
$length = mb_strlen( $password,'UTF-8');
if( $length < 4 or $length > 30 ){
    $errors[] ='A jelszó nem jó';
}
if ($password != $pasword_confirmation ) {
    $errors[] ='a jelszavak nem eggyeznek!!';
}
// ha ezt nem adod meg mit irjon ki az errorabe kerülő hibákat akkor semmit nem ir ki majd!
if( count($errors) > 0) {
    $_SESSION["hibak"] = $errors;
    $_SESSION["adatok"] = $_POST;        //ez az összes elküldöt adatot bele helyezi mivel POST! mert post a metódus amivel küldök.
   // print $_SESSION["adatok"]["name"]  igy érem el az adatokból a nevet kb
    } else {
        //ez a jobbik titkositás a jelszóra van egy másik is de ez inkább! fontos hogy itt a végén legyen titkositás!
        $password = password_hash($password, PASSWORD_DEFAULT);
       // INSERT INTO `users` (`id`, `name`, `email`, `password`) VALUES (NULL, '$name', '$email', '$password'); ez az adatbázárol van myadmin
       mysqli_query($connection, "INSERT INTO `admins` (`id`, `username`, `email`, `password`) VALUES (NULL, '$username', '$email', '$password');");
       $_SESSION["sikeres"] = "Sikeresen regisztráltás a(z) $email cimmel a(z) oldalra!!!";
       $_SESSION["successmsg"] = 'A regisztráció sikeres!';

    }
header("location: index.php"); 