<?php
session_start();
include_once 'Includes/conn.php';

if(!(isset($_SESSION['loggeduser'])))
    {
        header("location:login.php");
    }
$sql="SELECT * FROM history WHERE uid=:i1";
$stmt=$pdo->prepare($sql);
$stmt->execute(array(
	":i1"=>$_SESSION['userid']
));
$row=$stmt->fetch(PDO::FETCH_ASSOC);
if ($row==false) {
	header("Location:index.php?You haven't take the quizz yet");
	return;
	# code...
}
	    $sql="SELECT attempts FROM history WHERE uid=:i1";
	    $stmt=$pdo->prepare($sql);
	    $stmt->execute(array(
	    	"i1"=>@$_SESSION['userid']
	    ));
	   if($attempts=$stmt->fetch(PDO::FETCH_ASSOC)){
	    $attempt=$attempts['attempts'];
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
    <link rel="stylesheet"  href="css/style.css">
    <link rel="stylesheet"  href="css/inspection_result.css">
    <title>EVGP</title>
</head>
<body>
	<div class="text-left px-4  mt-1 " style="position: absolute; top: 2px;">
		<a href="logout.php"><button class="btn btn-light" name="logout"> Logout</button></a>
	</div>
	<div class="container-fluid mainContainer col-12 col-lg-8 col-md-11 mt-3">

		<div class="container-fluid E1">
			<div class="row mx-0">	
				<div class="col-2 logo1-div text-left pl-0">
					<img class=" img-fluid logo" src="Images/logo.jpg">
				</div>
				<div class="col-8 middle-div text-center px-4 py-1 ">
					<h3> TECHNICAL INSPECTION</h3>
					<p > <?= @$_SESSION['carnumber']?></p>
					<p > <?= @$_SESSION['name']?></p>
				</div>
				<div class="col-2 text-right logo2-div pr-0">
					<img class=" img-fluid logo" src="Images/DOEE logo.png">
				</div>
			</div>
		</div>

		<div class="container-fluid E2 mt-4 ">
			<div class="I1 p-4">
				<!--<p class="warning red text-right" >TECH INSPECTION CLOSES IN <span class="time">20 MINUTES 25 SECONDS</span> </p>-->
				<div class="score-div container-fluid">
					<?php if(isset($_SESSION['err'])){
						echo "<p style='color:red;'>".$_SESSION['err']."</p>";
						unset($_SESSION['err']);
					}?>
					<p class="score-header ">Your Score is:<span class="score-number"> <?= $row['score']?>/20 </span></p>
					<div class="row station-row">
					<!--	<div class="col-5">
							<h3 class="station-header"> Breakdown by stations</h3>
							<ul class="stations">
								<li>
									Mechanical : <span class="station-score">5/5</span>
								</li>
								<li>
									Electrical : <span class="station-score">5/5</span>
								</li>
								<li>
									Car Safety : <span class="station-score">5/5</span>
								</li>
								<li>
									Driver : <span class="station-score">5/5</span>
								</li>
							</ul>
						</div>
					-->
						<!--<div class="col-6 note  offset-1"> Based on your score you will begin the race from the pit lane with a 10 sec delay</div>-->
					</div>
				</div>
				<?php if($attempt==1){
						echo"
						<div class\"text-right\">
							<a href='test.php'>
							<button name=\"submit\" type=\"submit\" class=\"px-2 py-2 btn btn-danger\" >Retake the quiz</button></a>
						</div>
					";

					}?>
				<div class="text-right">
					<a href="https://evgp.globaleee.org/">
					<button name="submit" type="submit" class="px-2 py-2 btn btn-success" >GO TO NEXT STAGE</button></a>
				</div>

			</div>
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