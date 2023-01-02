<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<form id="form1" name="form1" method="get" action="motdp.php">
  <p>veillez entrer votre mot de passe :
    
    <label for="textfield"></label>
    <input type="text" name="mdp" id="textfield" />
  </p>
  <p>veillez entrer le vouveau mot de passe:
    <label for="textfield2"></label>
    <input type="text" name="nvmdp" id="textfield2" />
  </p>
  <p>
    <input type="submit" name="button" id="button" value="Submit" />
  </p>
</form>
<?php
if(isset($_GET["nvmdp"])){
$mdp=$_GET["mdp"];
$nvmdp=$_GET["nvmdp"];
$user="root";
$pwd="";
$db="test";
$chain_connex="mysql:host=localhost;dbname=$db";
$id=new PDO($chain_connex,$user,$pwd);
if($id) echo" acces reussit";
else echo" acces echoue";
$t="NOMS";
$r="update `$t` set `password`='$nvmdp' where `password`='$mdp'";
$req=$id->prepare($r);
$e=$req->execute();
if($e) echo" succes update";
else echo " erreur update";
}
?>
</body>
</html>