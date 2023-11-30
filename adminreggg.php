
<?php
session_start(); 
if (!isset($_SESSION["user"]) ) {
    exit('Csak belépett Adminnak! <a href="login.php">Belépek</a>');
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Regisztrációs Űrlap</title>
    <link rel="stylesheet" href="navbar.css">
    <link rel="stylesheet" href="login.css">
</head>
<body>
    
<header>

  

<nav>
 <div class="menu">
  <a href="#"><h1>Szia kedves Admin</h1></a>
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





  <div class="login-page">
  <div class="form">
    <form class="login-form"action="admin_reg.php" method="post">
    <input type="text" id="username" placeholder="Felhasználó név" name="username" required >
    <input type="email" id="email"placeholder="Email" name="email" required>
    <input type="password" id="password"placeholder="Jelszó" name="password" required>
    <input type="password" neme="pasword_confirmation" placeholder="Jelszó ujra" name="pasword_confirmation">

      <button>Resztrálok</button>
      <p class="message">Csak belépett admin tud regisztráni ujjat <a href="adminreggg.php">Create admin account</a></p>
    </form>
  </div>
</div>












    
</body>
</html>