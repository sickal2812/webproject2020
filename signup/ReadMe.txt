비트나미 WAMP Stack manager 실행
 ↓
Open phpMyAdmin 실행
 ↓
id: root
pw: 비트나미 설정시 pw
로그인
 ↓
새 DB : 기본이름=test
 ↓
새 테이블) user	4 col
id		int			null=false	Auto_Inclement=true
email		varchars	45
password	varchars	200
created		datetime
name		varchars	20
 ↓
loginProcess.php
signupPocess.php
내의 mysqli_connect("ip", "root", "pw", "test") 각 값 수정