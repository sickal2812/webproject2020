<?php
    $connect = mysqli_connect("localhost", "root", "dlfgns12", "test") or die ("connect fail");
    $number = $_POST['number'];
    $title = $_POST['title'];
    $content = $_POST['content'];
    //$date = date('Y-m-d H:i:s');
	
	$o_name = $_FILES['userfile']['name'];   //File
	$tmpfile = $_FILES['userfile']['tmp_name'];
    $filename = iconv("UTF-8", "EUC-KR", $_FILES['userfile']['name']);
    $folder = "../upload_qna/".$filename;
    move_uploaded_file($tmpfile, $folder);
	
	
    $query = "update board set title='{$title}', content='{$content}', file='{$o_name}', date=NOW() where number={$number}";
    $result = $connect->query($query);
	mysqli_close($connect);
	//$result = mysqli_query($connect, $query);
    if($result) {
?>
        <script>
            alert("수정되었습니다.")
			location.replace("./view.php?number=<?=$number?>");
        </script>
<?php    }
    else {
        echo "fail";
    }
?>