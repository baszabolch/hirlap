<?php
session_start(); 
if (!isset($_SESSION["user"]) ) {
    exit('Csak belépett Adminnak! <a href="login.php">Belépek</a>');
}
$post = $_POST;  //itt befogjuk a postból az adatokat rögtön egy változóba

extract($post);   //itt átalakitjük őket
$errors = [];
$connection = mysqli_connect('localhost', 'root', '', 'blog');

if (@$_SERVER["REQVEST_METHOD"] === 'POST') {
    $cim = $_POST["cim"];
    $url = $_POST["url"];
    $leiras = $_POST["leiras"];
    $posted_by = $_POST["posted_by"];
    $errors = [];

    $cim = mysqli_real_escape_string($connection,$cim);
    $length = mb_strlen( trim($cim),'UTF-8'); //a trim itt kiszüri a space et és utána meg az utf 8 hogy magyar nyelv.
    if( $length < 3 or $length > 100 ) {
        // ez a hiba üzenet!
        $errors[] = 'A cim minimum 3 maximum 100 karakter lehet!!!<br>';
    }
    
    $url = mysqli_real_escape_string($connection,$url);
    $length = mb_strlen( trim($url),'UTF-8');
    if( $length < 3 or $length > 25500 ) {
        // ez a hiba üzenet!
        $errors[] = 'A leiras minimum 3 maximum 25500 karakter lehet!!!<br>';
    }
    
    $leiras = mysqli_real_escape_string($connection,$leiras);
    $length = mb_strlen( trim($leiras),'UTF-8');
    if( $length < 3 or $length > 255 ) {
        // ez a hiba üzenet!
        $errors[] = 'A leiras minimum 3 maximum 255 karakter lehet!!!<br>';
    }
    
    $posted_by = mysqli_real_escape_string($connection,$posted_by);
    $length = mb_strlen( trim($posted_by),'UTF-8');
    if( $length < 3 or $length > 255 ) {
        // ez a hiba üzenet!
        $errors[] = 'A leiras minimum 3 maximum 255 karakter lehet!!!<br>';
    }
    if( sizeof ($errors) > 0 ) {
        $_SESSION["hibak"] = $errors;
        $post_id = $_SESSION['post']['id'];
        
        mysqli_query($connection,"
        update posts
        set
        cim = '$uj_cim'
        url = '$uj_url'
        leiras = '$uj_leiras'
        posted_by = '$uj_posted_by'
        pcsurl = '$uj_pcsurl'
        where
        id = '$post_id';
        ");
        
    } else {
        $_SESSION["successmsg"] = 'A szerkesztés sikeres!';
    }
    header("location: szerkesztes.php");
        exit;
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="navbar.css">
    <link rel="stylesheet" href="login.css">
</head>
<body>
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

<header>

  

<nav>
 <div class="menu">
  <a href="#"><h1>Szerkeszés Alfa teszt</h1></a>
<div class="brows"> 
  <ul>
    <li><a href="index.php" onclick="loadContent('index.html')">Home</a></li>
    <li><a href="login.php" onclick="loadContent('rolunk.html')">Belépés</a></li>
    <li><a href="addcikk.php" onclick="loadContent('rendelés.html')">Cikk feltöltés</a></li>
    <li><a href="szerkesztes.php">Szerkesztés</a></li>
    <li><a href="logout.php"onclick="if( !confirm('Biztosan kilépsz ?') ) return false;"
>Kilépés</a></li>
  </ul>
 </div>
</div>
</nav>
  </header>
    

<?php   ?>








<div class="login-page">
  <div class="form">
    <form class="login-form"action="" method="post">
    <input type="text" placeholder="Add meg a cimet!" name="cim">

<input type="text" placeholder="Cikknek a link je!"name="url">
<input type="text" placeholder="Rövid leirása"name="leiras">
<input type="text" placeholder="Ki a megosztó"name="posted_by">
<input type="text" placeholder="Cikknek képpének a link je!"name="pcsurl">
    
      <!-- <button>Beküld</button> -->
      <p class="message">Csak belépett admin tud regisztráni ujjat <a href="">Create admin account</a></p>
    </form>
  </div>
</div>

    



</body>
</html>