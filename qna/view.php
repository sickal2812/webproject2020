<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Q&A 게시판</title>
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
        width: 1000px;
    }
    .view_id {
        text-align: center;
        background-color: #EEEEEE;
        width: 30px;
    }
    .view_id2 {
        background-color: white;
        width: 60px;
    }
    .view_hit {
        background-color: #EEEEEE;
        width: 30px;
        text-align: center;
    }
    .view_hit2 {
        background-color: white;
        width: 60px;
    }
    .view_content {
        padding-top: 20px;
        border-top: 1px solid #444444;
        height: 500px;
    }
    .view_btn {
        width: 700px;
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
	.contentme{
		width: 90%;
		z-index: 1;
		margin-left: 5%;
		padding: 40px;
		background: white;
		border-radius: 15px;
	}
</style>
<body>
<div id="wrapper" class="divided">

				<!-- One -->
					<section class="banner style2 orient-left content-align-left image-position-right fullscreen onload-image-fade-in onload-content-fade-right">
						<div class="contentme">
<?php
                $connect = mysqli_connect("localhost", "root", "dlfgns12", "test");
                $number = $_GET['number'];
                session_start();
                $query = "select * from board where number = {$number}";
                $result = $connect->query($query);
                $rows = mysqli_fetch_assoc($result);
				
				$hitting = $rows['hit'] + 1;
				mysqli_query($connect,"UPDATE board SET hit='{$hitting}' where number='{$number}'");
        ?>
 
        <table class="view_table" align=center>
        <tr>
                <td colspan="4" class="view_title"><?php echo $rows['title']?></td>
        </tr>
        <tr>
                <td class="view_id">작성자</td>
                <td class="view_id2"><?php echo $rows['name']?></td>
                <td class="view_hit">조회수</td>
                <td class="view_hit2"><?php echo $hitting?></td>
        </tr>
		
		<tr>
                <td class="view_id">첨부 파일</td>
                <td colspan="3" class="view_id2"><a href="../upload_qna/<?php echo $rows['file'];?>" download><?php echo $rows['file']; ?></a></td>
        </tr>
 
 
        <tr>
                <td colspan="4" class="view_content" valign="top">
                <?php echo $rows['content']?></td>
        </tr>
        </table>
 
        
        <!-- MODIFY & DELETE -->
        <div class="view_btn">
                <button class="view_btn1" onclick="location.href='../qna.html'">목록으로</button>
                <button class="view_btn1" onclick="location.href='./modify.php?number=<?=$number?>&id=<?=$_SESSION['userId']?>'">수정</button>
                <button class="view_btn1" onclick="location.href='./delete.php?number=<?=$number?>&id=<?=$_SESSION['userId']?>'">삭제</button>
        </div>
		</div>
		</section>
		</div>
</body>
</html>