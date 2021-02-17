<?php
$conn = mysqli_connect("localhost", "root", "dlfgns12", "test");
//                            ip주소, 계정명, 비밀번호, DB명
$hashedPassword = password_hash($_POST['password'], PASSWORD_DEFAULT);
echo $hashedPassword;
echo "<br/>";
$sql = "INSERT INTO user(email, password, created, name) VALUES('{$_POST['email']}', '{$hashedPassword}', NOW(), '{$_POST['name']}' )";
echo $sql;
echo "<br/>";
$result = mysqli_query($conn, $sql);

if ($result === false) {
    echo "저장에 문제가 생겼습니다. 관리자에게 문의해주세요.";
    echo mysqli_error($conn);
} else {
?>
    <script>
        alert("회원가입이 완료되었습니다");
        location.href = "../index.html";
    </script>
<?php
}
?>