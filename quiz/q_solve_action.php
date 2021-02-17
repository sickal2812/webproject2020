<?php
			$number = $_POST[number];
            $connect = mysqli_connect("localhost", "root", "dlfgns12", "quiz") or die("fail");
            $query = "select * from quizboard where number={$number}";
            $result = $connect->query($query);
			
			if($result){
				$rows = mysqli_fetch_assoc($result);
				
                $name = $_POST[name];                    //Solver
                $content1 = $rows[answer1];            //DB Answer
                $content2 = $rows[answer2];
                $content3 = $rows[answer3];
                $content4 = $rows[answer4];              
                $content5 = $rows[answer5];            
                $answer1 = $_POST[s_answer1];          //POST Answer
                $answer2 = $_POST[s_answer2];
                $answer3 = $_POST[s_answer3]; 
                $answer4 = $_POST[s_answer4]; 
                $answer5 = $_POST[s_answer5];
                $date = date('Y-m-d H:i:s');            //Date
				$userId = $_POST[userId];
 
                $URL = '../quiz.html';                   //return URL
				
				$query = "select * from answersheet where quiznumber='{$number}' and userid='{$userId}'";
                $result = $connect->query($query);
				$count = mysqli_num_rows($result);
				if($count == 0){
					echo "1";
					$query = "insert into answersheet(s_answer1, s_answer2, s_answer3, s_answer4, s_answer5, quiznumber, userid, username, date) values('{$answer1}', '{$answer2}', '{$answer3}', '{$answer4}', '{$answer5}', '{$number}', '{$userId}', '{$name}', '{$date}')";
					$result = $connect->query($query);
				}
				else{
					echo "2";
					$query = "update answersheet set s_answer1='{$answer1}', s_answer2='{$answer2}', s_answer3='{$answer3}', s_answer4='{$answer4}', s_answer5='{$answer5}', date='{$date}' where quiznumber='{$number}' and userid='{$userId}'";
					$result = $connect->query($query);
				}
					
				
				$query = "select * from answersheet where quiznumber='{$number}' and userid='{$userId}'";
				$result = $connect->query($query);
				$rows = mysqli_fetch_assoc($result);
				$answer1 = $rows[s_answer1];          //POST Answer
                $answer2 = $rows[s_answer2];
                $answer3 = $rows[s_answer3]; 
                $answer4 = $rows[s_answer4]; 
                $answer5 = $rows[s_answer5];
 
				$correct = 0;
				if( $content1 == $answer1 ){
					$correct += 1;
					$correct1 = "O";
				}
				else{
					$correct1 = "X";
				}
				if($content2 == $answer2){
					$correct += 1;
					$correct2 = "O";
				}
				else{
					$correct2 = "X";
				}
				if($content3 == $answer3){
					$correct += 1;
					$correct3 = "O";
				}
				else{
					$correct3 = "X";
				}
				if($content4 == $answer4){
					$correct += 1;
					$correct4 = "O";
				}
				else{
					$correct4 = "X";
				}
				if($content5 == $answer5){
					$correct += 1;
					$correct5 = "O";
				}
				else{
					$correct5 = "X";
				}
				
				$query = "update answersheet set correct='{$correct}', correct1='{$correct1}', correct2='{$correct2}', correct3='{$correct3}', correct4='{$correct4}', correct5='{$correct5}' where quiznumber='{$number}' and userid='{$userId}'";
                $result = $connect->query($query);
                if($result){
?>                  <script>
                        alert("<?php echo "답변이 등록되었습니다."?>");
                        location.replace("<?php echo $URL?>");
                    </script>
<?php
				}
				else{
                        echo "FAIL";
						echo mysqli_error($connect);
                }
 
                mysqli_close($connect);
				
            }
            else{
                echo "FAIL";
				echo mysqli_error($connect);
            }
				
				
?>