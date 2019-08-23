<html>
   <meta charset="utf-8">
<?php
 
$host = 'localhost';
$user = 'root';
$pw = '111111';
$dbName = 'opentutorials';
$mysqli = new mysqli($host, $user, $pw, $dbName);
 
 $id=$_POST['id'];
 $password=($_POST['pwd']);
 $name=$_POST['name'];
 $position=$_POST['position'];
 
 
 $sql = "insert into member (id, pwd, name, position)";             // (입력받음)insert into 테이블명 (column-list)
 $sql = $sql. "values('$id','$password','$name','$position')";         // calues(column-list에 넣을 value-list)
 if($mysqli->query($sql)){                                                              //만약 sql로 잘 들어갔으면
  echo 'success inserting <p/>';                                                            //success inserting 으로 표시
  echo $name.'님 가입 되셨습니다.<p/>';                                   // id님 안녕하세요.
 }else{                                                                                //아니면
  echo 'fail to insert sql';                                                            //fail to insert sql로 표시
 }
mysqli_close($mysqli);
 
 
?>
<input type="button" value="로그인하러가기" onclick="location='index.php'">
</html>
