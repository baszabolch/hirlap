<?php

session_start();
$connection = mysqli_connect('localhost', 'root', '', 'blog');


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="proba.css">
    <link rel="stylesheet" href="navbar.css">
</head>
<body>

<header>

  

<nav>
 <div class="menu">
  <a href="#"><h1>Szia kedves Olvasó</h1></a>
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
$sql = "SELECT `id`, `cim`, `url`, `leiras`, `posted_by`,`pcsurl`, `date` FROM `posts`";
$result = $connection->query($sql);

// eredmény kiíratása
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {?>
       
    


       <div class="projcard-container">
    
    <div class="projcard projcard-blue">
      <div class="projcard-innerbox">
        <img class="projcard-img" src="<?php echo $row['pcsurl'] ?>" />
        <div class="projcard-textbox">
          <div class="projcard-title"><?php echo $row['cim'] ?></div>
          <div class="projcard-subtitle">További részleteket itt <a href="<?php echo $row['url'] ?>">Katt</a></div>
          <div class="projcard-bar"></div>
          <div class="projcard-description"><?php echo $row['leiras'] ?></div>
          <div class="projcard-tagbox">
            <span class="projcard-tag"><?php echo $row['id'] ?><</span>
            <span class="projcard-tag"><?php echo $row['posted_by'] ?></span>
            <span class="projcard-tag"><?php echo $row['date'] ?></span>
          </div>
        </div>
      </div>
    </div>
    
    </div>
    
    
    
    
    
  </div>

<?php 



//html rész vége

}
} else { echo "Nincs cikk";   
}
?>
</body>
</html>

























