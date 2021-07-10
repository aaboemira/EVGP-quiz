<?php
	$attempt=0;
	empty($results);
	include_once ('Includes/conn.php');
    session_start();
    if(!(isset($_SESSION['loggeduser'])))
    {
        header("location:login.php");
    }
	    $sql="SELECT attempts FROM history WHERE uid=:i1";
	    $stmt=$pdo->prepare($sql);
	    $stmt->execute(array(
	    	"i1"=>@$_SESSION['userid']
	    ));
	    if($attempts=$stmt->fetch(PDO::FETCH_ASSOC)){
	    $attempt=$attempts['attempts'];
		}
    if ($attempt==1) {
		$sql="SELECT * FROM questions  ";
		$stmt=$pdo->prepare($sql);
		$stmt->execute(array(
			":i1"=>$_SESSION['userid']
		));
		$results=[];
		while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
			array_push($results, $row);
		}
		//$correct_ans=[];
		/*foreach ($results as $result) {
			if ($result['correct_answer']==$result['answer']) {
				array_push($correct_ans,$result);
			}
			# code...
		}
		json_encode($correct_ans);*/

    }
    else{
    	
	    /*$sql="SELECT * FROM history WHERE uid=:i1";
	    $stmt=$pdo->prepare($sql);
	    $stmt->execute(array(
	    	"i1"=>@$_SESSION['userid']
	    ));
	   	if($row=$stmt->fetch(PDO::FETCH_ASSOC)){*/
	   		if ($attempt==2) {
	   		   	$_SESSION['err']="You have no remaining attempts";
	   			header("Location:inspection_result.php");
	   			return;
	   		}

		else
		{
		    $stmt=$pdo->prepare("SELECT * FROM questions");
		    $stmt->execute();
		    $results=[];
		    while($result = $stmt->fetch(PDO::FETCH_ASSOC)){
		    	array_push($results,$result);
		    }
		    json_encode($results);
		}
	}
	

	if (isset($_POST['submit'])) {
		$answers=[];
		for ($i=1; $i <=20 ; $i++) {
			$answer=$_POST['q-'.$i.'-ans'];
			array_push($answers, $answer);
		}

		$correct_answers=[];
		$wrong_answers=[];
		$degree=0;
		$sql="SELECT * FROM questions ";
		$stmt=$pdo->prepare($sql);	
		$stmt->execute();
		$questions=[];
	    while($question = $stmt->fetch(PDO::FETCH_ASSOC)){
	    	array_push($questions,$question);
	    }
	    $x=0;
	    $sql="INSERT INTO `answers`( `uid`, `qid`, `answer`, `correct_ans`) VALUES (:i1,:i2,:i3,:i4) ";
		foreach ($answers as $ans) {
			$stmt=$pdo->prepare($sql);
			$stmt->execute(array(
				"i1"=>$_SESSION['userid'],
				"i2"=>$questions[$x]['qid'],
				"i3"=>$ans,
				"i4"=>$questions[$x]['correct_answer']
			));
			if ($questions[$x]["correct_answer"]==$ans) {
				array_push($correct_answers,$questions[$x]);
				# code...
			}
			else{
				array_push($wrong_answers,$questions[$x]);
			}
			$x++;
		}

		$degree=count($correct_answers);
		$sql="INSERT INTO `history`(`username`, `uid`, `score`) VALUES (:i1,:i2,:i3)";
		$stmt=$pdo->prepare($sql);
		$stmt->execute(array(
			'i1'=>$_SESSION['loggeduser'],
			'i2'=>$_SESSION['userid'],
			'i3'=>$degree
		));
		header("Location:inspection_result.php?degree=".$degree);
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
    <link rel="stylesheet"  href="css/test.css">
    <link rel="stylesheet"  href="css/inspection_test.css">
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
					<p > Car No. 185</p>
					<p > Your Team Name Goes Here</p>
				</div>
				<div class="col-2 text-right logo2-div pr-0">
					<img class=" img-fluid logo" src="Images/DOEE logo.png">
				</div>
			</div>
		</div>

		<div class="container-fluid E2 mt-4 ">
			<div class="I1 p-4">
				<!--<p class="warning red text-right" >TECH INSPECTION CLOSES IN <span class="time">20 MINUTES 25 SECONDS</span> </p>-->
				<?php if(($attempt)==1){
					echo "<form method='POST' action='update.php'>";
				}
				else{
					echo "<form method='POST' >";

				}?>
                <?php
               $questions=$results;
 		foreach ($questions as $question) {
                    echo("<p class=\"question\">".$question['qid']."- ".$question['q_head']."</p>
			<div class=\"form-group \">
				<div class=\"form-check\">
				  <input class=\"form-check-input\" type=\"radio\" name=\"q-".$question['qid']."-ans\" id=\"ansewer-a\" value='".$question['qid']."-a' >
				  <label class=\"form-check-label\" for=\"question-".$question['qid']."-ans\">
				    ".$question['choice_1']."
				  </label>
				</div>
				<div class=\"form-check\">
				  <input class=\"form-check-input \" type=\"radio\" name=\"q-".$question['qid']."-ans\" id=\"answer-b\" value='".$question['qid']."-b'>
				  <label class=\"form-check-label\" for=\"question-".$question['qid']."-ans\">
				   ".$question['choice_2']."
				  </label>
				</div>
				<div class=\"form-check\">
				  <input class=\"form-check-input \" type=\"radio\" name=\"q-".$question['qid']."-ans\" id=\"answer-c\"value='".$question['qid']."-c'>
				  <label class=\"form-check-label\" for=\"question-".$question['qid']."-ans\">
				  ".$question['choice_3']."
				  </label>
				</div>

				<div class=\"form-check\">
				  <input class=\"form-check-input  \" type=\"radio\" name=\"q-".$question['qid']."-ans\" id=\"answer-c\" value='".$question['qid']."-d'>
				  <label class=\"form-check-label\" for=\"question-".$question['qid']."-ans\">
				    ".$question['choice_4']."
				  </label>
				</div>
			</div>");
                }?>
				<div class="quiz-div" id="quiz">

				</div>	
				<div class="text-right"><button name="submit" type="submit" class="px-2 py-2 btn btn-success" value="how" >SUBMIT RESPONSE</button></div>	
				</form>
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
						<td class="active">DRIVER</td>
					</tr>
				</table>	
			</div>

		</div>

	</div>
</body>

</html>