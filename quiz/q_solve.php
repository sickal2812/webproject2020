<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Quiz 게시판</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
	<link rel="stylesheet" href="../assets/css/main.css?3" />
	<noscript><link rel="stylesheet" href="../assets/css/noscript.css?" /></noscript>
</head>
<style>
    .view_table {
        border: 1px solid #444444;
        margin-top: 30px;
    }
    .view_title {
        height: 30px;
        text-align: center;
        background-color: #cccccc;
        color: white;
        width: 500px;
    }
    .view_id {
        text-align: center;
        background-color: #EEEEEE;
        width: 60px;
		height: 30px;
    }
    .view_id2 {
        background-color: white;
        width: 120px;
    }
    .view_content {
        padding-top: 20px;
        border-top: 1px solid #444444;
    }
    .view_btn {
        width: 500px;
        height: 200px;
        text-align: center;
        margin: auto;
        margin-top: 50px;
    }
    .view_btn1 {
        height: 50px;
        width: 100px;
        font-size: 20px;
        text-align: center;
        background-color: white;
        border: 2px solid black;
        border-radius: 10px;
    }
    .view_comment_input {
        width: 700px;
        height: 500px;
        text-align: center;
        margin: auto;
    }
    .view_text3 {
        font-weight: bold;
        float: left;
        margin-left: 20px;
    }
    .view_com_id {
        width: 100px;
    }
    .view_comment {
        width: 500px;
    }
	.view_contentanswer{
		border-top: 1px solid #444444;
	}
	.contentme{
		width: 90%;
		z-index: 1;
		margin-left: 5%;
		padding: 40px;
		background: white;
		border-radius: 15px;
	}
</style>

<body class="is-preload">
		
		<!-- Wrapper -->
			<div id="wrapper" class="divided">

				<!-- One -->
					<section class="banner style2 orient-left content-align-left image-position-right fullscreen onload-image-fade-in onload-content-fade-right">
						<div class="contentme">
                        <?php
                        $connect = mysqli_connect('localhost', 'root', 'dlfgns12', 'quiz');
                        $number = $_GET['number'];
                        session_start();
                        $query = "select title, file, id from quizboard where number={$number}";
                        $result = $connect->query($query);
                        $rows = mysqli_fetch_assoc($result);
                        ?>
					<form method = "post" action = "q_solve_action.php">
                        <table class="view_table" align=center>
                            <tr>
                                <td colspan="8" class="view_title"><?php echo $rows['title']?></td>
                            </tr>
                            <tr>
                                <td colspan="2" class="view_id">작성자</td>
                                <td colspan="6" class="view_id2"><?php echo $rows['id']?></td>
                            </tr>
 
							<tr>
								<td colspan="4" class="view_content" valign="top">
									첨부 파일 : </td>
                                <td colspan="4" class="view_contentanswer">
									<a href="../upload_quiz/<?php echo $rows['file'];?>" download><?php echo $rows['file']; ?></a>
								</td>
							</tr>
							
                            <tr>
                                <td colspan="4" class="view_content" valign="top">
                                A1.</td>
                                <td colspan="4" class="view_contentanswer"><input type = text name = s_answer1 size=30></td>
                            </tr>
                            <tr>
                                <td colspan="4" class="view_content" valign="top">
                                A2.</td>
                                <td colspan="4" class="view_contentanswer"><input type = text name = s_answer2 size=30></td>
                            </tr>
                            <tr>
                                <td colspan="4" class="view_content" valign="top">
                                A3.</td>
                                <td colspan="4" class="view_contentanswer"><input type = text name = s_answer3 size=30></td>
                            </tr>
                            <tr>
                                <td colspan="4" class="view_content" valign="top">
                                A4.</td>
                                <td colspan="4" class="view_contentanswer"><input type = text name = s_answer4 size=30></td>
                            </tr>
                            <tr>
                                <td colspan="4" class="view_content" valign="top">
                                A5.</td>
                                <td colspan="4" class="view_contentanswer"><input type = text name = s_answer5 size=30></td>
                            </tr>
                        </table>
 
        
                    <!-- MODIFY & DELETE -->
                        <div class="view_btn">
							<input type="hidden" name="userId" value="<?=$_SESSION['userId']?>">
							<input type="hidden" name="name" value="<?=$_SESSION['userName']?>">
							<input type="hidden" name="number" value="<?=$number?>">
							<input type = "submit" value="등록">
                        </div>
					</form>
						</div>
						
						<div class="image">
							<img src="../images/spotlight03.jpg" alt="" />
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