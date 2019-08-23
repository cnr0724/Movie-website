<?php
session_start();
$num=$_SESSION['objNumber'];
?>
<html>
<head>
    <meta charset="utf-8"/>
    <title>DB Search</title>
</head>
<body style="background-color:#F7CAC9">
<?php
     $mysqli = new mysqli('localhost', 'root', '', 'moviesitedb');
     if(mysqli_connect_errno()){
        echo "DB connect error";
     }
     $sql="select * from actor where ActorKey=".$num;
     $result=mysqli_query($mysqli,$sql);
     $row=mysqli_fetch_assoc($result);
     echo ' 출연작을 추가할 배우의 이름 : '.$row['Name'];
?>
    <form name="role" method="post" action="roleInsert.php">
    <h1 style='color:white'>역할과 관련된 정보를 입력하세요</h1>
    <table border="1" style="background-color:whitesmoke">
        <tr>
            <td>영화 제목</td>
            <td><input type="text" name="name"></td>
        </tr>
        <tr>
            <td>역할명</td>
            <td><input type="text" name="rName"></td>
        </tr>
    </table>
    <br>
    <input type="submit" vale="저장">
    <input type="button" value="뒤로 가기" onclick="javascripｔ:history.go(-1)">
    </form>
</body>
</html>