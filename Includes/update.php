<?php
session_start();
	include_once ('conn.php');
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
	    $sql="UPDATE `answers` SET `answer`=:i1 WHERE qid=:i2";
	    $stmt=$pdo->prepare($sql);
		foreach ($answers as $ans) {
			$stmt->execute(array(
				"i1"=>$ans,
				"i2"=>$questions[$x]['qid']
			));
			if ($questions[$x]["correct_answer"]==$ans) {
				array_push($correct_answers,$questions[$x]);
				
			}
			else{
				array_push($wrong_answers,$questions[$x]);
			}
			$x++;
		}
		$x=2;
		$degree=count($correct_answers);
		$sql="UPDATE `history` SET `score`=:i1 ,`attempts`=:i3 WHERE uid=:i2";
		$stmt=$pdo->prepare($sql);
		$stmt->execute(array(
			'i1'=>$degree,
			'i2'=>$_SESSION['userid'],
			'i3'=>$x
		));
		header("Location:../inspection_result.php?degree=".$degree);
		return;  
		}
?>