<?php     
	include_once 'Includes/conn.php';
    session_start();
    if(!(isset($_SESSION['loggeduser'])))
    {
        header("location:login.php");
    }
    if (isset($_POST['submit'])){
    	header("Location:test.php?q=quiz&uid=".$_SESSION['userid']."");
    	return;
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
    <link rel="stylesheet"  href="css/inspection.css">
    <link rel="stylesheet"  href="css/ahmed.css">

    <title>EVGP</title>
</head>
<body>
	<div class="container-fluid mainContainer col-12 col-lg-8 col-md-11 mt-3">
		<div class="container-fluid E1">
			<div class="row mx-0">	
				<div class="col-2 logo1-div text-left pl-0">
					<img class=" img-fluid logo" src="Images/logo.jpg">
				</div>
				<div class="col-8 middle-div text-center px-4 py-1 ">
					<h3> TECHNICAL INSPECTION</h3>
					<p > <?= $_SESSION['carnumber']?></p>
					<p > <?= $_SESSION['name']?></p>
				</div>
				<div class="col-2 text-right logo2-div pr-0">
					<img class=" img-fluid logo" src="Images/DOEE logo.png">
				</div>
			</div>
		</div>

		<div class="container-fluid E2 mt-4 ">
			<form method="POST" style="height: 100%;">
				<div class="I1 p-4">
					<!--<p class="warning red text-right" >TECH INSPECTION CLOSES IN <span class="time">20 MINUTES 25 SECONDS</span> </p>-->
					<p class="info px-3">
					&nbsp &nbsp &nbsp &nbsp This is the technical inspection phase of the competition. You will go through the four stations Mechanical, Electrical, Car Safety and Driver in which you will be asked questions pertaining to the regulations. Once you answer all the questions you will see your overall score and the breakdown per station. If you do not get a perfect score you will be given one more opportunity to repeat the questions that had the incorrect answers. To pass technical inspection you must obtain a perfect score. If not you will be given provisional approval to compete today and your car will start the race with a time delay based on the number of incorrect answers.
					</p>
					<div class="text-right"><button type="submit" name="submit" class="px-2 py-2 btn btn-success " >BEGIN INSPECTION</button></a></div>
				</div>
			</form>
		</div>

		<div class="container-fluid E3 py-4 ">
			<div class="I2 p-4 text-center">
				<h3 class="red">
					STATION
				</h3>
				<table class="table">
					<tr>
						<td>MECHANICAL</td>
						<td>ELECTRICAL</td>
						<td>CAR SAFETY</td>
						<td>DRIVER</td>
					</tr>
				</table>	
			</div>

		</div>

	</div>
</body>
</html>