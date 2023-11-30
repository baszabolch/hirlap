<?php
session_start(); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="navbar.css">
</head>
<body>
<header>

  

<nav>
 <div class="menu">
  <a href="#"><h1>Szia kedves Látogató</h1></a>
<div class="brows"> 
  <ul>
    <li><a href="index.php" >Home</a></li>
    <li><a href="login.php" >Belépés</a></li>
    <li><a href="addcikk.php" >Cikk feltöltés</a></li>
    <li><a href="szerkesztes.php">Szerkesztés</a></li>
    <li><a href="logout.php"onclick="if( !confirm('Biztosan kilépsz ?') ) return false;"
>Kilépés</a></li>
  </ul>
 </div>
</div>
</nav>
  </header>

   <?php
if ( isset($_SESSION["hibak"] ) ) {
   foreach ($_SESSION["hibak"] as $err ){
    print"<li>$err</li>";
   }
unset($_SESSION["hibak"]); }   //ki iratásután ez a fügvény meg semimisiti a hibákat reesetnél eltünit


   ?>







<div class="login-page">
  <div class="form">
    <form class="login-form"action="login_procces.php" method="post">
      <input type="email" placeholder="email"name="email" value="<?php print @$_SESSION["adatok"]["email"] ?>"/>
      <input type="password" placeholder="password" name="password"/>
      <button>login</button>
      <p class="message">Csak belépett admin tud regisztráni ujjat <a href="adminreggg.php">Create admin account</a></p>
    </form>
  </div>
</div>