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
    <title>addcikk</title>

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
if ( isset($_SESSION["hibak"] ) ) {
   foreach ($_SESSION["hibak"] as $err ){
    print"<li>$err</li>";
   }
unset($_SESSION["hibak"]); }   //ki iratásután ez a fügvény meg semimisiti a hibákat reesetnél eltünit
elseif ( isset($_SESSION["sikeres"])) {
  print '<li>'.$_SESSION["sikeres"].'</li>';
  unset($_SESSION["sikeres"]);
}
   ?>




<div class="login-page">
  <div class="form">
    <form class="login-form"action="addcikk_proc.php" method="post">
    <input type="text" placeholder="Add meg a cimet!" name="cim">
    <input type="text" placeholder="Cikknek a link je!"name="url">
    <input type="text" placeholder="Rövid leirása"name="leiras">
    <input type="text" placeholder="Ki a megosztó"name="posted_by">
    <input type="text" placeholder="Cikknek a kép link je!"name="pcsurl">

    
      <button>Beküld</button>
      <p class="message">Csak belépett admin tud regisztráni ujjat <a href="">Create admin account</a></p>
    </form>
  </div>
</div>












</body>
</html>

<?php  
unset($_SESSION["adatok"]);
?>