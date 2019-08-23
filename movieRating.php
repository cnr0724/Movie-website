<?php
session_start();
$_SESSION['state']='movie';
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
     $sql="select * from movie where MovieKey=".$num;
     $result=mysqli_query($mysqli,$sql);
     $row=mysqli_fetch_assoc($result);
     echo ' 별점을 줄 영화의 제목 : '.$row['Name'];
?>
    <form name="join" method="post" action="newRate.php">
    <h1 style='color:white'>평가를 입력하세요</h1>
    <table border="1" style="background-color:whitesmoke">
        <tr>
            <td>별점 (0~10) :</td>
            <td><input type="integer" name="rate"></td>
        </tr>
        <tr>
            <td>리뷰 :</td>
            <td><TEXTAREA name=review cols=65 rows=15></TEXTAREA></td>
        </tr>
    </table>
    <br>
    <input type="submit" vale="저장">
    <input type="button" value="뒤로 가기" onclick="javascripｔ:history.go(-1)">
    </form>
</body>
</html>