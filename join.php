<doctype html>
<html>
    
<head>
<meta charset="utf-8">
<title>sign up page</title>
</head>

<body style="background-color:#F7CAC9">
<form name="join" method="post" action="newMember.php">
    <h1 style='color:white'>회원가입을 위한 정보를 입력하세요</h1>
    <table border="1" style="background-color:whitesmoke">
        <tr>
            <td>아이디</td>
            <td><input type="text" size="30" name="id"></td>
        </tr>
        <tr>
            <td>비밀번호</td>
            <td><input type="password" size="30" name="password"></td>
        </tr>
        <tr>
            <td>별명</td>
            <td><input type="text" size="12" maxlength="10" name="name"></td>
        </tr>
        <tr>
            <td>나이</td>
            <td><input type="text" size="30" name="age"></td>
        </tr>
    </table>
    <input type=submit value="제출">
    <input type="button" value="뒤로가기"onclick="javascripｔ:history.go(-1)">
</form>
</body>

</html>

