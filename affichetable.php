<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Affiche tables</title>
<link href="Pages/Style/home.css" rel="stylesheet">
</head>

<body>
<header>
        <nav class="navbar">
            <ul>
                <li class="navbar-item1"><a class="navbar-link" href="/secssi/Pages/index.html">Accueil</a></li>
                <li class="navbar-item2"><a class="navbar-link" href="/secssi/Pages/index.html#about">About</a></li>
                <li class="navbar-item3"><a class="navbar-link" href="/secssi/Pages/index.html#contact">Contact</a></li>
                <li class="navbar-item4"><a class="navbar-link" href="/secssi/Pages/menu.html">Menu</a></li>
				<img src="Pages/images/logo.svg" class="logonav">
            </ul>
        </nav>
    </header>
    <img src="Pages/images/gradient.svg"  class="gradient3">
    <img src="Pages/images/gradient.svg"  class="gradient4">
    
<?php
$user="root";
$pwd="";
$db="test";
$chain_connex="mysql:host=localhost;dbname=$db";
$id=new PDO($chain_connex,$user,$pwd);
if($id) echo" acces reussit";
else echo" acces echoue";
$t1="articles informatique";
$t2="articles électroménager";
$t3="Fournisseur elec";
$t4="Fournisseurs info";
$t5="Magasin";
$t6="mouvements de stocks elec";
$t7="mouvements de stocks info";
echo "TABLE 1";
echo "$t1";
$r="select * from `$t1`";
$req=$id->prepare($r);
$e=$req->execute();
if($e) echo" succes select";
else echo " erreur select"; 
echo'<table cellpadding="4" cellspacing="0" border="1" width="10"/>';
echo'<tr><td>codeA</td><td>type</td><td>nbr d`unités</td><td>codeM</td><tr>';
$enreg=$req->fetch();
while($enreg){
	$A=$enreg["codeA"];
	$B=$enreg["type"];
	$C=$enreg["nbr d'unités"];
	$D=$enreg["codeM"];
	?>
	<tr><td><?php echo $A;?></td><td><?php echo $B;?></td><td><?php echo $C;?></td><td><?php echo $D;?></td></tr>';
    <?php
	$enreg=$req->fetch();
}
echo'</table>';
echo "TABLE 2";
echo "$t2";
$r="select * from `$t2`";
$req=$id->prepare($r);
$e=$req->execute();
if($e) echo" succes select";
else echo " erreur select"; 
echo'<table cellpadding="4" cellspacing="0" border="1" width="10"/>';
echo'<tr><td>codeE</td><td>type</td><td>nombre d`unitées</td><td>codeM</td><tr>';
$enreg=$req->fetch();
while($enreg){
	$A=$enreg["codeE"];
	$B=$enreg["type"];
	$C=$enreg["nombre d'unitées"];
	$D=$enreg["codeM"];
	?>
	<tr><td><?php echo $A;?></td><td><?php echo $B;?></td><td><?php echo $C;?></td><td><?php echo $D;?></td></tr>';
    <?php
	$enreg=$req->fetch();
}
echo'</table>';
echo "TABLE 3";
echo "$t3";
$r="select * from `$t3`";
$req=$id->prepare($r);
$e=$req->execute();
if($e) echo" succes select";
else echo " erreur select"; 
echo'<table cellpadding="4" cellspacing="0" border="1" width="10"/>';
echo'<tr><td>codeFe</td><td>nom</td><td>codeE</td><tr>';
$enreg=$req->fetch();
while($enreg){
	$A=$enreg["codeFe"];
	$B=$enreg["nom"];
	$C=$enreg["codeE"];
	
	?>
	<tr><td><?php echo $A;?></td><td><?php echo $B;?></td><td><?php echo $C;?></td></tr>';
    <?php
	$enreg=$req->fetch();
}
echo'</table>';
echo "TABLE 4";
echo "$t4";
$r="select * from `$t4`";
$req=$id->prepare($r);
$e=$req->execute();
if($e) echo" succes select";
else echo " erreur select"; 
echo'<table cellpadding="4" cellspacing="0" border="1" width="10"/>';
echo'<tr><td>codeFi</td><td>nom</td><td>codeA</td><tr>';
$enreg=$req->fetch();
while($enreg){
	$A=$enreg["codeFi"];
	$B=$enreg["nom"];
	$C=$enreg["codeA"];
	
	?>
	<tr><td><?php echo $A;?></td><td><?php echo $B;?></td><td><?php echo $C;?></td></tr>';
    <?php
	$enreg=$req->fetch();
}
echo'</table>';
echo "TABLE 5";
echo "$t5";
$r="select * from `$t5`";
$req=$id->prepare($r);
$e=$req->execute();
if($e) echo" succes select";
else echo " erreur select"; 
echo'<table cellpadding="4" cellspacing="0" border="1" width="10"/>';
echo'<tr><td>codeM</td><td>nom du magasin</td><td>articles informatiques</td><td>articles électroménager</td><tr>';
$enreg=$req->fetch();
while($enreg){
	$A=$enreg["codeM"];
	$B=$enreg["nom du magasin"];
	$C=$enreg["articles informatiques"];
	$D=$enreg["articles électroménager"];
	?>
	<tr><td><?php echo $A;?></td><td><?php echo $B;?></td><td><?php echo $C;?></td><td><?php echo $D;?></td></tr>';
    <?php
	$enreg=$req->fetch();
}
echo'</table>';
echo "TABLE 6";
echo "$t6";
$r="select * from `$t6`";
$req=$id->prepare($r);
$e=$req->execute();
if($e) echo" succes select";
else echo " erreur select"; 
echo'<table cellpadding="4" cellspacing="0" border="1" width="10"/>';
echo'<tr><td>date d`entrée</td><td>date de sortie</td><td>codeE</td><tr>';
$enreg=$req->fetch();
while($enreg){
	$A=$enreg["date d'entrée"];
	$B=$enreg["date de sortie"];
	$C=$enreg["codeE"];
	
	?>
	<tr><td><?php echo $A;?></td><td><?php echo $B;?></td><td><?php echo $C;?></td></tr>';
    <?php
	$enreg=$req->fetch();
}
echo'</table>';
echo "TABLE 7";
echo "$t7";
$r="select * from `$t7`";
$req=$id->prepare($r);
$e=$req->execute();
if($e) echo" succes select";
else echo " erreur select"; 
echo'<table cellpadding="4" cellspacing="0" border="1" width="10"/>';
echo'<tr><td>date d`entrée</td><td>date de sortie</td><td>codeA</td><tr>';
$enreg=$req->fetch();
while($enreg){
	$A=$enreg["date d'entrée"];
	$B=$enreg["date de sortie"];
	$C=$enreg["codeA"];
	
	?>
	<tr><td><?php echo $A;?></td><td><?php echo $B;?></td><td><?php echo $C;?></td></tr>';
    <?php
	$enreg=$req->fetch();
}
echo'</table>';
?>
</body>
</html>