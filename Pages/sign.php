<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <link href="Style/home.css" rel="stylesheet">
  <title>Sign Up</title>
  
</head>
<body>
    <header>
        <nav class="navbar">
            <ul>
                <li class="navbar-item1"><a class="navbar-link" href="/secssi/Pages/index.html">Accueil</a></li>
                <li class="navbar-item2"><a class="navbar-link" href="/secssi/Pages/index.html#about">About</a></li>
                <li class="navbar-item3"><a class="navbar-link" href="/secssi/Pages/index.html#contact">Contact</a></li>
                
                <img src="images/logo.svg" class="logonav">
            
            </ul>
        </nav>

    </header>
    
    <img src="images/gradient.svg"  class="gradient3">
    <img src="images/gradient.svg"  class="gradient4">
    
    <form action="/secssi/Pages/sign.php " method="get" class="form">
              
        <div class="container">
          <label for="uname"><b>Username</b></label>
          <input type="text" name="user" placeholder="Enter Username"  required>
      
          <label for="psw"><b>Password</b></label>
          <input type="password" name="pwd" placeholder="Enter Password"  required>
              
          <button type="submit" class="botton" id="button" value="Submit">Sign In</button>

        </div>
      
        <div class="container">
          <button type="button" class="cancelbtn">Cancel</button>
        </div>

    </form>

<?php 
if (isset($_GET["user"])&&!empty($_GET["user"])){
$x=$_GET["user"];
$y=$_GET["pwd"];
$user="root";
$pwd="";
$db="test";
$chain_connex="mysql:host=localhost;dbname=$db";
$id=new PDO($chain_connex,$user,$pwd);
if($id) echo" <p>acces reussit</p>";
else echo" <p>acces echoue</p>";
$t="users";
$r="insert into `$t` (`username`,`password`) values ('$x','$y')";
$req=$id->prepare($r);
$e=$req->execute();
if($e) {
  echo" <p style='color:#FFFFFF;'>ajout reussit</p>";
  header("Location: /secssi/Pages/menu.html");
}
else echo "<p style='color:#FFFFFF;'> ajout echoue</p>";
}

?>
</body>
</html>