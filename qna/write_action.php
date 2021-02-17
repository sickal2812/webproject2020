<?php
				session_start();
                $connect = mysqli_connect("localhost", "root", "dlfgns12", "test") or die("fail");
                
                $name = $_POST['name'];                    //Writer
                $title = $_POST['title'];                  //Title
                $content = $_POST['content'];              //Content
                $date = date('Y-m-d H:i:s');            //Date
 
                $URL = './board.php';                   //return URL
				
				$o_name = $_FILES['userfile']['name'];   //File
				$tmpfile = $_FILES['userfile']['tmp_name'];
                $filename = iconv("UTF-8", "EUC-KR", $_FILES['userfile']['name']);
                $folder = "../upload_qna/".$filename;
                move_uploaded_file($tmpfile, $folder);
 
                $query = "insert into board(title, content, date, hit, id, name, file) values('{$title}', '{$content}', NOW(), 0, '{$_SESSION['userId']}', '{$name}', '{$o_name}')";

                $result = mysqli_query($connect, $query);
				mysqli_close($connect);
                if($result){
?>             <script>
                    alert("글이 등록되었습니다.")
					location.href = "../qna.html";
				</script>
<?php
                }
                else{
                        echo "FAIL";
						echo mysqli_error($connect);
                }
?>