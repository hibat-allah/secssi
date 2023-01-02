<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="Pages/Style/home.css" rel="stylesheet">
<title>Etats de sortie</title>
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
	<section class="List2">
		<ol>
			<li><h2>Afficher que les articles d'informatiques entrée au magasin aprés le 2020-10-15 et 
les articles d'électoménager entrée au magasin aprés le 2019-02-02</h2></li>
			<li><h2>afficher les articles informatique de la marque asus (codeA:99x) et les articles électroménager de la marque Brandt (codeE:44x)</h2></li>
		</ol>
	</section>

<?php
$d1="2020-10-15";
$d2="2019-02-02";
$t1="mouvements de stocks elec";
$t2="mouvements de stocks info";
$t3="articles informatique";
$t4="articles électroménager";

$user="root";
$pwd="";
$db="test";
$chain_connex="mysql:host=localhost;dbname=$db";
$id=new PDO($chain_connex,$user,$pwd);
if($id) echo" acces reussit";
else echo" acces echoue";

$r="select `$t2`.`codeA`,`$t1`.`codeE` from `$t1`,`$t2` where `$t2`.`date d'entrée`>'$d1' and `$t1`.`date d'entrée`>'$d2' ";
$req=$id->prepare($r);
$e=$req->execute();
if($e) echo" succes select";
else echo " erreur select";
echo'<table cellpadding="4" cellspacing="0" border="1" width="10"/>';
echo'<tr><td>codeE</td><td>codeA</td><tr>';
$enreg=$req->fetch();
while($enreg){
	$x=$enreg["codeE"];
	$y=$enreg["codeA"];
	?>
<tr><td><?php echo $x;?></td><td><?php echo $y;?></td></tr>';
<?php
	$enreg=$req->fetch();
	}
	echo'</table>';
echo'<br />';
	$r2="select `articles informatique`.`type` as `v`   , `articles informatique`.`nbr d'unités` , `articles électroménager`.`type` as `p` , `articles électroménager`.`nombre d'unitées`   from  `$t3`,`$t4` where `articles électroménager`.`codeE`='44x' and `articles informatique`.`codeA`='99x'  ";
$req=$id->prepare($r2);
$e=$req->execute();
if($e) echo" succes select";
else echo " erreur select";
echo'<table cellpadding="4" cellspacing="0" border="1" width="10"/>';
echo'<tr><td>type</td><td>nbr d`unitées</td><td>type</td><td>nbr d`unitées</td><tr>';
$enreg=$req->fetch();
while($enreg){
	$a=$enreg["v"];
	$b=$enreg["nbr d'unités"];
	$c=$enreg["p"];
	$d=$enreg["nombre d'unitées"];
	?>
<tr><td><?php echo $a;?></td><td><?php echo $b;?></td><td><?php echo $c;?></td><td><?php echo $d;?></td></tr>';
<?php
	$enreg=$req->fetch();
	}echo'</table>';
	
?>
</body>
</html>