<?php
                $connect = mysqli_connect("localhost", "root", "dlfgns12", "quiz") or die("fail");
                
                $id = $_POST[name];                      //Writer
                $pw = "1";                               //Password
                $title = $_POST[title];                  //Title
                $o_name = $_FILES['userfile']['name'];   //File
				$tmpfile = $_FILES['userfile']['tmp_name'];
                $filename = iconv("UTF-8", "EUC-KR", $_FILES['userfile']['name']);
                $folder = "../upload_quiz/".$filename;
                move_uploaded_file($tmpfile, $folder);         
                $answer1 = $_POST[answer1];              //Answer
                $answer2 = $_POST[answer2];
                $answer3 = $_POST[answer3]; 
                $answer4 = $_POST[answer4]; 
                $answer5 = $_POST[answer5];
                $date = date('Y-m-d H:i:s');            //Date
 
                $URL = '../quiz.html';                   //return URL
 
 
                $query = "insert into quizboard(title, file, answer1, answer2, answer3, answer4, answer5, date, id, password) 
                        values('{$title}', '{$o_name}', '{$answer1}', '{$answer2}', '{$answer3}', '{$answer4}', '{$answer5}', '{$date}', '{$id}', '{$pw}')";
                $result = $connect->query($query);
                if($result){
?>                  <script>
                        alert("<?php echo "퀴즈가 등록되었습니다."?>");
                        location.replace("<?php echo $URL?>");
                    </script>
<?php
                }
                else{
                        echo "FAIL";
						echo mysqli_error($connect);
                }
 
                mysqli_close($connect);
?>