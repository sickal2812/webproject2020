<?php
$conn = mysqli_connect("127.0.0.1", "root", "dlfgns12", "test");
//                            ip주소, 계정명, 비밀번호, DB명
//아이디 비교와 비밀번호 비교가 필요한 시점이다.
// 1차로 DB에서 비밀번호를 가져온다 
// 평문의 비밀번호와 암호화된 비밀번호를 비교해서 검증한다.
$email = $_POST['loginId'];
$password = $_POST['password'];

// DB 정보 가져오기 
$sql = "SELECT * FROM user WHERE email = '{$email}' ";
$result = mysqli_query($conn, $sql);

$row = mysqli_fetch_array($result);
$hashedPassword = $row['password'];
$row['id'];

foreach($row as $key => $r){
    echo "{$key} : {$r} <br>";
}
// echo $row['id'];
// DB 정보를 가져왔으니 
// 비밀번호 검증 로직을 실행하면 된다.
if ( password_verify($password, $hashedPassword) ) {
    // 로그인 성공
    // 세션에 id 저장
    session_start();
    $_SESSION['userId'] = $row['id'];
	$_SESSION['userName'] = $row['name'];
	$_SESSION['userPhone'] = $row['phone'];
    print_r($_SESSION);
    echo $_SESSION['userName'];
    
?>
    <script>
        alert("로그인에 성공하였습니다.")
        location.href = "../index.html";
    </script>
<?php
} else {
    // 로그인 실패 
?>
    <script>
        alert("로그인에 실패하였습니다");
		location.href = "../login.html";
    </script>
<?php
}
?>