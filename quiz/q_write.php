<!DOCTYPE html>

<html>
<head>
    <meta charset = 'utf-8' />
    <title>quiz 등록하기</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
	<link rel="stylesheet" href="assets/css/main.css?3" />
	<noscript><link rel="stylesheet" href="assets/css/noscript.css?" /></noscript>
</head>
<style>
        table.table2{
                border-collapse: separate;
                border-spacing: 1px;
                text-align: left;
                line-height: 1.5;
                border-top: 1px solid #ccc;
                margin : 20px 10px;
        }
        table.table2 tr {
                 width: 50px;
                 padding: 10px;
                font-weight: bold;
                vertical-align: top;
                border-bottom: 1px solid #ccc;
        }
        table.table2 td {
                 width: 100px;
                 padding: 10px;
                 vertical-align: top;
                 border-bottom: 1px solid #ccc;
        }
 
</style>
<body class="is-preload">

	<!-- Wrapper -->
		<div id="wrapper" class="divided">
                        <!-- One -->
				<section class="banner style1 orient-left content-align-left image-position-right fullscreen onload-image-fade-in onload-content-fade-right">
					<div class="content">
                                        <?php
                                        session_start();
                                        $URL = "../login.html";
                                        if(!isset($_SESSION['userId'])) {
                                        ?>
 
                                        <script>
                                                alert("로그인이 필요합니다");
                                                location.replace("<?php echo $URL?>");
                                        </script>
                                        <?php
                                        }
										if($_SESSION['userId'] != 1) {
										?>
 
                                        <script>
                                                alert("권한이 없습니다");
                                                location.replace("<?php echo "../quiz.html"?>");
                                        </script>
                                        <?php
                                        }
                                        ?>
                                        <form method = "POST" action = "q_write_action.php" enctype="multipart/form-data">
                                        <table  style="padding-top:50px" align=center width=700 border=0 cellpadding=2>
                                                <tr>
                                                <td height=20 align= center bgcolor=#ccc><font color=white> 글쓰기</font></td>
                                                </tr>
                                                <tr>
                                                <td bgcolor=white>
                                                <table class = "table2">
                                                        <tr>
                                                                <td>작성자</td>
                                                                <td><input hidden type=text name=name value="<?=$_SESSION['userName']?>" /> <?=$_SESSION['userName']?> </td>
                                                        </tr>
 
                                                        <tr>
                                                                <td>제목</td>
                                                                <td><input type=text name=title size=60></td>
                                                        </tr>
														
														<tr>
														<td rowspan="6">정답</td>
                                                        <tr>
                                                                <td>1번 <input type=text name=answer1 size=30 /></td>
														</tr>
														<tr>
                                                                <td>2번 <input type=text name=answer2 size=30 /></td>
														</tr>
														<tr>
                                                                <td>3번 <input type=text name=answer3 size=30 /></td>
														</tr>
														<tr>
                                                                <td>4번 <input type=text name=answer4 size=30 /></td>
														</tr>
														<tr>
                                                                <td>5번 <input type=text name=answer5 size=30 /></td>
                                                        </tr>
														</tr>
                                                </table>
												
												<div class="filebox"> 
													<label for="ex_file">업로드</label> <input type="file" name="userfile" /> 
												</div>
 
                                                <center>
													<input type = "submit" value="등록">
                                                </center>
                                                </td>
                                                </tr>
                                        </table>
                                        </form>
					<div class="image">
						<img src="images/new/01.jpg" alt="" />
					</div>
			        </section>
		</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>