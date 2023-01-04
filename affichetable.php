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
echo "<p>TABLE 1</p>";
echo "<p>$t1</p>";
$r="select * from `$t1`";
$req=$id->prepare($r);
$e=$req->execute();

echo'<table cellpadding="4" cellspacing="0" border="1" width="10"/>';
echo'<tr><td style="color:white;">codeA</td> <td style="color:white;">type</td> <td style="color:white;">nbr dunités</td><td style="color:white;">codeM</td><tr>';
$enreg=$req->fetch();
while($enreg){
	$A=$enreg["codeA"];
	$B=$enreg["type"];
	$C=$enreg["nbr_dunites"];
	$D=$enreg["codeM"];
	?>
	<tr><td><?php echo"<p style='color:white;'>" . $A ."</p>";?></td><td><?php echo"<p style='color:white;'>" . $B."</p>";?></td><td><?php echo "<p style='color:white;'>" . $C."</p>";?></td><td><?php echo"<p style='color:white;'>" . $D."</p>";?></td></tr>';
    <?php
	$enreg=$req->fetch();
}
echo'</table>';
echo "<p>TABLE 2</p>";
echo "<p>$t2</p>";
$r="select * from `$t2`";
$req=$id->prepare($r);
$e=$req->execute();

echo'<table cellpadding="4" cellspacing="0" border="1" width="10"/>';
echo'<tr><td style="color:white;">codeE</td><td style="color:white;">type</td><td style="color:white;">nombre d`unitées</td><td style="color:white;">codeM</td><tr>';
$enreg=$req->fetch();
while($enreg){
	$A=$enreg["codeE"];
	$B=$enreg["type"];
	$C=$enreg["nombre_dunitees"];
	$D=$enreg["codeM"];
	?>
	<tr><td><?php echo"<p style='color:white;'>" . $A ."</p>";?></td><td><?php echo"<p style='color:white;'>" . $B."</p>";?></td><td><?php echo "<p style='color:white;'>" . $C."</p>";?></td><td><?php echo"<p style='color:white;'>" . $D."</p>";?></td></tr>';
    <?php
	$enreg=$req->fetch();
}
echo'</table>';
echo "<p>TABLE 3</p>";
echo "<p>$t3</p>";
$r="select * from `$t3`";
$req=$id->prepare($r);
$e=$req->execute();

echo'<table cellpadding="4" cellspacing="0" border="1" width="10"/>';
echo'<tr><td style="color:white;">codeFe</td><td style="color:white;">nom</td><td style="color:white;">codeE</td><tr>';
$enreg=$req->fetch();
while($enreg){
	$A=$enreg["codeFe"];
	$B=$enreg["nom"];
	$C=$enreg["codeE"];
	
	?>
	<tr><td><?php echo"<p style='color:white;'>" . $A ."</p>";?></td><td><?php echo"<p style='color:white;'>" . $B."</p>";?></td><td><?php echo "<p style='color:white;'>" . $C."</p>";?></td></tr>';
    <?php
	$enreg=$req->fetch();
}
echo'</table>';
echo "<p>TABLE 4</p>";
echo "<p>$t4</p>";
$r="select * from `$t4`";
$req=$id->prepare($r);
$e=$req->execute();

echo'<table cellpadding="4" cellspacing="0" border="1" width="10"/>';
echo'<tr><td style="color:white;">codeFi</td><td style="color:white;">nom</td><td style="color:white;">codeA</td><tr>';
$enreg=$req->fetch();
while($enreg){
	$A=$enreg["codeFi"];
	$B=$enreg["nom"];
	$C=$enreg["codeA"];
	
	?>
	<tr><td><?php echo"<p style='color:white;'>" . $A ."</p>";?></td><td><?php echo"<p style='color:white;'>" . $B."</p>";?></td><td><?php echo "<p style='color:white;'>" . $C."</p>";?></td></tr>';
    <?php
	$enreg=$req->fetch();
}
echo'</table>';
echo "<p>TABLE 5</p>";
echo "<p>$t5</p>";
$r="select * from `$t5`";
$req=$id->prepare($r);
$e=$req->execute();

echo'<table cellpadding="4" cellspacing="0" border="1" width="10"/>';
echo '<tr><td style="color:white;">codeM</td><td style="color:white;">nom du magasin</td><td style="color:white;">articles informatiques</td><td style="color:white;">articles électroménager</td><tr>';
$enreg=$req->fetch();
while($enreg){
	$A=$enreg["codeM"];
	$B=$enreg['nom_du_magasin'];
	$C=$enreg['articles_informatiques'];
	$D=$enreg['articles_electromenager'];
	?>
	<tr><td><?php echo"<p style='color:white;'>" . $A ."</p>";?></td><td><?php echo"<p style='color:white;'>" . $B."</p>";?></td><td><?php echo "<p style='color:white;'>" . $C."</p>";?></td><td><?php echo"<p style='color:white;'>" . $D."</p>";?></td></tr>';
    <?php
	$enreg=$req->fetch();
}
echo'</table>';
echo "<p>TABLE 6</p>";
echo "<p>$t6</p>";
$r="select * from `$t6`";
$req=$id->prepare($r);
$e=$req->execute();

echo'<table cellpadding="4" cellspacing="0" border="1" width="10"/>';
echo'<tr><td style="color:white;">date d`entrée</td><td style="color:white;">date de sortie</td><td style="color:white;">codeE</td><tr>';
$enreg=$req->fetch();
while($enreg){
	$A=$enreg["date_dentree"];
	$B=$enreg["date_de_sortie"];
	$C=$enreg["codeE"];
	
	?>
	<tr><td><?php echo"<p style='color:white;'>" . $A ."</p>";?></td><td><?php echo"<p style='color:white;'>" . $B."</p>";?></td><td><?php echo "<p style='color:white;'>" . $C."</p>";?></td></tr>';
    <?php
	$enreg=$req->fetch();
}
echo'</table>';
echo "<p>TABLE 7</p>";
echo "<p>$t7</p>";
$r="select * from `$t7`";
$req=$id->prepare($r);
$e=$req->execute();

echo'<table cellpadding="4" cellspacing="0" border="1" width="10"/>';
echo'<tr><td style="color:white;">date d`entrée</td><td style="color:white;">date de sortie</td><td style="color:white;">codeA</td><tr>';
$enreg=$req->fetch();
while($enreg){
	$A=$enreg["date_dentree"];
	$B=$enreg["date_de_sortie"];
	$C=$enreg["codeA"];
	
	?>
	<tr><td><?php echo"<p style='color:white;'>" . $A ."</p>";?></td><td><?php echo"<p style='color:white;'>" . $B."</p>";?></td><td><?php echo "<p style='color:white;'>" . $C."</p>";?></td></tr>';
    <?php
	$enreg=$req->fetch();
}
echo'</table>';
?>
</body>
</html>