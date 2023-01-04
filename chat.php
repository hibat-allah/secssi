<!DOCTYPE html>

<html>

<head>
<title>Chat</title>
<meta charset="UTF-8">
<link href="Pages/Style/home.css" rel="stylesheet">
<script
  src="https://code.jquery.com/jquery-3.6.3.js"
  integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM="
  crossorigin="anonymous"></script>
<script type="text/javascript" src="AjaxPush.js"></script>

</head>
<body>
<script type="text/javascript">
	var comet = new AjaxPush('chat2.php','sender.php');
	var n = new Function("return (Math. random()*190).toFixed(0)");
	var c = "rgb(" + n() + ", " + n() + "," + n() + ")";
	var template = "<strong style='color:" +c + "'>" + 'user_' + n() + "</strong>";

	comet.connect(function(data) { $("#history").append(data.message) + "<br>"; });
	var send = function() {
	comet.doRequest({ message: template + $("#message").val() + "<br>" }, function(){
	$("#message").val('').focus();
	})
}
</script>

</body>
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
    
	<form class="form" method="get">
		<textarea id="message" name="subject" placeholder="Write something.." style="height:200px"></textarea>
		
		<button onClick="send()" class="botton">Send</button><br><br>
		<div id="history" class="history"></div>

	</form>
	<section class="pics">
	<form action="chat.php" method="POST" class="form2" enctype="multipart/form-data">
		<div class="container">
		<p><input type="file" name="fileToUpload" ></p>
		</div>
		<div class="container">
		<button type="submit" name="submit" class="botton2" >UPLOAD</button>
		</div>
	</form>


		<?php
		if(isset($_POST["submit"])){
		$target_dir = "uploads/";
		$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
		$uploadOk = 1;
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
		
		// Check if image file is a actual image or fake image
		$filetype = $_FILES["fileToUpload"]["type"];
		if ($filetype!=="image/png" && $filetype!=="image/jpeg"){
			echo "<p class='messages'>vous ne pouver envoyer que des images</p>";
			$uploadOk = 0;
		}
		else{
			/*
			if(isset($_POST["submit"])) {
			$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
			if($check["mime"] == "image/png") {
				echo "File is an image - " . $check["mime"] . ".";
				$uploadOk = 1;
			}else {
				echo "File is not an image.";
				$uploadOk = 0;
			}
			}
			*/
			// Check if file already exists
			if (file_exists($target_file)) {
				echo "<p class='messages'>Sorry, file already exists.</p>";
				$uploadOk = 0;
			}
			else{
				// Check file size
				if ($_FILES["fileToUpload"]["size"] > 500000) {
					echo "<p class='messages'>Sorry, your file is too large.</p>";
					$uploadOk = 0;
				}
				else{
					// Check if $uploadOk is set to 0 by an error
					if ($uploadOk == 0) {
						echo "<p class='messages'>Sorry, your file was not uploaded.</p>";
						// if everything is ok, try to upload file
					} else {
						if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
							echo "<p class='messages'>The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.</p>";
						} else {
							echo "<p class='messages'>Sorry, there was an error uploading your file.</p>";
						}
					}
				}
			}
		}
	}
		?>
	</section>
</body>
</html>
