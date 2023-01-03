<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="Style/home.css" rel="stylesheet">
    <title>Login</title>
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
    <form action="/secssi/Pages/login.php " method="get" class="form">
              
        <div class="container">
          <label for="uname"><b>Username</b></label>
          <input type="text" name="user" placeholder="Enter Username"  required>
      
          <label for="psw"><b>Password</b></label>
          <input type="password" name="pwd" placeholder="Enter Password"  required>
              
          <button type="submit" class="botton" id="button" value="Submit">Login</button>

        </div>
      
        <div class="container">
          <button type="button" class="cancelbtn">Cancel</button>
        </div>

    </form>
    <?php
    echo '$_GET["user"] $_GET["pwd"]';
    if(isset($_GET["user"])&&!empty($_GET["pwd"])){
    $x=1;
    $nom=$_GET["user"];
    $mdp=$_GET["pwd"];
    $user="root";
    $pwd="";
    $db="test";
    $chain_connex="mysql:host=localhost;dbname=$db";
    $id=new PDO($chain_connex,$user,$pwd);
    if($id) echo"acces reussit";
    else echo"acces echoue";
    $t="users";
    $r="select `username`,`password` from `$t`";
     $req=$id->prepare($r);
    $e=$req->execute();
    if($e) echo"<p style='color:#FFFFFF;'> succes select</p>";
    else echo "<p style='color:#FFFFFF;'> erreur select</p>";
    $enreg=$req->fetch();
    $h=0;
    while($enreg){
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
      // echo'<a href="menu.php" style=" color: #FFFFFF;">Acceder au menu</a></br>';
      // echo'<a href="motdp.php" style=" color: #FFFFFF;"> changer de mot de passe</a>';
    }
      $enreg=$req->fetch();
    }
  
    ?>
</body>
</html>