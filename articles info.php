<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="Pages/Style/home.css" rel="stylesheet">

<title>Document sans titre</title>
</head>

<body>
  <header>
        <nav class="navbar">
            <ul>
                <li class="navbar-item1"><a class="navbar-link" href="/secssi">Accueil</a></li>
                <li class="navbar-item2"><a class="navbar-link" href="/secssi/index.html#about">About</a></li>
                <li class="navbar-item3"><a class="navbar-link" href="/secssi/index.html#contact">Contact</a></li>
                <li class="navbar-item4"><a class="navbar-link" href="/secssi/Pages/menu.html">Menu</a></li>
                <img src="Pages/images/logo.svg" class="logonav">
            
            </ul>
        </nav>

    </header>
    
    <img src="Pages/images/gradient.svg"  class="gradient3">
    <img src="Pages/images/gradient.svg"  class="gradient4">
  
  <form id="form1" name="form1" class="form" method="get" action="articles info.php">
    <div class="container">
          <label for="textfield"><b>code A</b></label>
          <input type="text" name="A" id="textfield" placeholder="code A..." >
      
          <label for="textfield2"><b>type</b></label>
          <input type="text" name="B" placeholder="Type..." >

          <label for="textfield3"><b>Nombre d'unitées</b></label>
          <input type="text" name="C" placeholder="Nombre d'unitées..." >

          <label for="textfield4"><b>code M</b></label>
          <input type="text" name="D" placeholder="code M..." >
              
          <button type="submit" class="botton2" id="button" value="Submit" style="background-color: #420d5f;color: white;padding: 12px 20px; border: none;border-radius: 4px; cursor: pointer;position: absolute;left: 40%;top: 90%;width: 100px;">Validé</button>

    </div>
      
    <div class="container">
          <button type="button" class="cancelbtn2" style="width: auto;
            padding: 10px 18px;
            background-color: #f44336;
            position: absolute;
            left: 40%;
            top: 110%;
            width: 100px;">Annuler</button>
    </div>

  </form>

<?php
if (isset($_GET["A"])&&!empty($_GET["A"])){
$A=$_GET["A"];
$B=$_GET["B"];
$C=$_GET["C"];
$D=$_GET["D"];
$t="articles informatique";
$user="root";
$pwd="";
$db="test";
$chain_connex="mysql:host=localhost;dbname=$db";
$id=new PDO($chain_connex,$user,$pwd);
if($id) echo" acces reussit";
else echo" acces echoue";
$r="insert into `$t` (`codeA`,`type`,`nbr d'unités`,`codeM`) Values ('$A','$B','$C','$D')";
$req=$id->prepare($r);
$e=$req->execute();
if($e) echo" succes insert";
else echo " erreur insert";
}
?>
</body>
</html>