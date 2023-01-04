<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="Style/home.css" rel="stylesheet">
    <title>Login</title>
</head>
<body>
    <header>
        <nav class="navbar">
            <ul>
                <li class="navbar-item1"><a class="navbar-link" href="/secssi">Accueil</a></li>
                <li class="navbar-item2"><a class="navbar-link" href="/secssi/index.html#about">About</a></li>
                <li class="navbar-item3"><a class="navbar-link" href="/secssi/index.html#contact">Contact</a></li>
                <img src="images/logo.svg" class="logonav">
            
            </ul>
        </nav>

    </header>
    
    <img src="images/gradient.svg"  class="gradient3">
    <img src="images/gradient.svg"  class="gradient4">
    
    <form action="/secssi/Pages/login.php " method="get" class="form">
              
              <div class="container">
                <label for="uname"><b>Username</b></label>
                <input type="text" name="user" placeholder="Enter Username">
            
                <label for="psw"><b>Password</b></label>
                <input type="password" name="pwd" placeholder="Enter Password">
                    
                <button type="submit" class="botton" id="button" name = "Submit" value="Submit">Login</button>
      
              </div>
            
              <div class="container">
                <button type="button" class="cancelbtn">Cancel</button>
              </div>
      
          </form>
<?php
// connect to data base:
$user="root";
$pwd="";
$db="test";
$chain_connex="mysql:host=localhost;dbname=$db";
$id=new PDO($chain_connex,$user,$pwd);
if($id == FALSE) echo"acces echoue";
// -------------------------------------------------//

// fetch data:
if(isset($_GET["Submit"])){
$nom=$_GET["user"];
$mdp=$_GET["pwd"];

$requete = "SELECT * FROM users WHERE username='$nom' AND password='$mdp'"; //la requete SQL
$req=$id->prepare($requete);
$e=$req->execute(); // execution de la requete
if($e){

  $enreg=$req->fetch(); // fetching data
  $number_Of_Rows = $req->rowCount();

  if ($number_Of_Rows == 0){ //if username or password not found
    echo" username ou mot de passe invalid";

  }elseif($number_Of_Rows == 1){ //if one user is found
    $A=$enreg["username"];
	  $B=$enreg["password"];

	  if ($A==$nom && $B==$mdp ){
	  $h=1;
	  if($A=='admin'){
      header("Location: /secssi/Pages/admin.html");
    }
    else{
      header("Location: /secssi/Pages/menu.html");
      echo" identification acomplie avec succes</br>";
    }
  }
    else{
      echo"<div>
    <p> Email : ".$enreg["username"]." Password : ".$enreg["password"]."</p>
    </div>";
    }
  }elseif($number_Of_Rows > 1){ //if multiple users are found (sql injection)
    while($enreg){
      echo"<div>
      <p> Email : ".$enreg["username"]." Password : ".$enreg["password"]."</p>
      </div>";
      $enreg=$req->fetch();
    }
  }
}
else echo " erreur select";


}
?>
</body>
</html>