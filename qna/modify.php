<?php    $connect = mysqli_connect("localhost", "root", "dlfgns12", "test") or die("connect fail");
                $id = $_GET[id];
                $number = $_GET[number];
                $query = "select * from board where number={$number}";
                $result = $connect->query($query);
                $rows = mysqli_fetch_assoc($result);
 
                $title = $rows['title'];
                $content = $rows['content'];
                $usrid = $rows['id'];
 
                session_start();
 
 
                $URL = "../qna.html";
 
                if(!isset($_SESSION['userId'])) {
        ?>              <script>
                                alert("권한이 없습니다.");
                                location.replace("<?php echo $URL?>");
                        </script>
        <?php   }
                else if($_SESSION['userId']==$usrid) {
        ?>
        <form method = "post" action = "modify_action.php" enctype="multipart/form-data">
        <table  style="padding-top:50px" align = center width=700 border=0 cellpadding=2 >
                <tr>
                <td height=20 align= center bgcolor=#ccc><font color=white> 글수정</font></td>
                </tr>
                <tr>
                <td bgcolor=white>
						<table class = "table2">
						<tr>
                        <td>작성자</td>
                        <td><input type="hidden" name=name value="<?=$rows['name']?>"><?=$rows['name']?></td>
                        </tr>
 
                        <tr>
                        <td>제목</td>
                        <td><input type=text name=title size=60 value="<?=$title?>"></td>
                        </tr>
 
                        <tr>
                        <td>내용</td>
                        <td><textarea name=content cols=85 rows=15><?=$content?></textarea></td>
                        </tr>
 
                       </table>
					   
					   <div class="filebox"> 
							<label for="ex_file">업로드</label> <input type="file" name="userfile" value="../upload_qna/<?php echo $rows['file'];?>"/> 
						</div>
 
                        <center>
                        <input type="hidden" name="number" value="<?=$number?>">
                        <input type = "submit" value="작성">
                        </center>
                </td>
                </tr>
        </table>
		 </form>
        <?php   }
                else {
        ?>              <script>
                                alert("권한이 없습니다.");
                                location.replace("<?php echo $URL?>");
                        </script>
        <?php   }
        ?>