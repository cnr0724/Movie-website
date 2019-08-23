<?php
session_start();
$_SESSION['state']="movieInsert";
?>
<doctype html>
<html>
    
<head>
<meta charset="utf-8">
<title>sign up page</title>
</head>

<body style="background-color:#F7CAC9">
<form name="movieNew" method="post" action="newInfo.php">
    <h1 style='color:white'>추가할 영화에 대한 정보를 입력하세요.</h1>
    <table border="1" style="background-color:whitesmoke">
        <tr>
            <td>제목</td>
            <td><input type="text" size="50" name="name"></td>
        </tr>
        <tr>
            <td>감독</td>
            <td><input type="text" size="50" name="director"></td>
        </tr>
        <tr>
            <td>장르</td>
            <td><input type="text" size="50" maxlength="10" name="genre"></td>
        </tr>
    </table>
    <input type=submit value="제출">
    <input type="button" value="뒤로가기"onclick="javascripｔ:history.go(-1)">
</form>
</body>

</html>