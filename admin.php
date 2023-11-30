<?php

session_start();

if (!isset($_SESSION["user"]) ) {
    exit('Csak belépett felhasználóknak! <a href="login.php">Belépek</a>');}
// ide connection kell még



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profilom</title>
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
    
<?php  
print('Kedves Admin,sikeresen beléptés');
 ?>

</body>
</html>