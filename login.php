<?php
session_start();
	require("Includes/conn.php");
	if(isset($_SESSION["loggeduser"]))
	{
		session_destroy();
		/*header("Location:inspection.html");*/
	}
	if (isset($_POST['submit'])){
	$user=$_POST['username'];
	$pass=$_POST['password'];
	$sql="SELECT * FROM  users WHERE username=:user and password=:pass";
	$stmt=$pdo->prepare($sql);
	$stmt->execute(array(
		':user'=>$user,
		':pass'=>$pass
	));
	$row=$stmt->fetch(PDO::FETCH_ASSOC);
		if ($row== true) {
		$_SESSION['loggeduser']=$row['username'];
		$_SESSION['userid']=$row['id'];
		$_SESSION['name']=$row['name'];
		$_SESSION['carnumber']=$row['carnumber'];
		header("Location:index.php?".$_SESSION['account']);
		return;
		}
		else{
		$_SESSION['err']="Incorrect password";
		header('Location:login.php?');
		return;	
		}	
 	 }
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <link rel="stylesheet"  href="css/ahmed.css">

    <title>EVGP</title>
    <style type="text/css">
    	label{
    		color: black;
    	}
    	.form-div{
    		top: 20%;
    		background-color: white;
    		border-radius: 4px;
    	}

    </style>
</head>
<body>
	<div class="container-fluid mainContainer col-12 col-lg-8 col-md-11 mt-3 justify-content-center">
		<div class="form-div col-6 mx-auto my-auto p-4">
			<form method="POST">
			  <div class="form-group">
			    <label for="username">Username</label>
			    <input type="text"  name="username" class="form-control" id="usenname" aria-describedby="emailHelp" required>
			  </div>
			  <div class="form-group">
			    <label for="password">Password</label>
			    <input type="password" class="form-control" name="password" id="password" required>
			  </div>
			  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
			</form>
		</div>
	</div>
</body>
</html>