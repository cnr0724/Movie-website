<?php
session_start();
$_SESSION['state']="actorInsert";
?>
<doctype html>
<html>
    
<head>
<meta charset="utf-8">
<title>sign up page</title>
</head>

<body style="background-color:#F7CAC9">
<form name="actorNew" method="post" action="newInfo.php">
    <h1 style='color:white'>추가할 배우에 대한 정보를 입력하세요.</h1>
    <table border="1" style="background-color:whitesmoke">
        <tr>
            <td>이름</td>
            <td><input type="text" size="50" name="name"></td>
        </tr>
        <tr>
            <td>생일(YYYY-MM-DD)</td>
            <td><input type="text" size="50" name="birth"></td>
        </tr>
        <tr>
            <td>성별</td>
            <td><input type="text" size="50" name="sex"></td>
        </tr>
        <tr>
            <td>국적</td>
            <td><input type="text" size="50" name="nationality"></td>
        </tr>
    </table>
    <input type=submit value="제출">
    <input type="button" value="뒤로 가기" onclick="javascripｔ:history.go(-1)">
</form>
</body>

</html>