<html>
   <meta charset="utf-8">
   <body style='background-color:#F7CAC9;color:white'></body>
<?php

$mysqli = new mysqli('localhost', 'root', '', 'moviesitedb');

 $id=$_POST['id'];
 $password=$_POST['password'];
 $name=$_POST['name'];
 $age=$_POST['age'];
 $sql="select * from user where ID='".$id."'";
 $userExist=mysqli_num_rows(mysqli_query($mysqli, $sql));
 if($userExist==0){
    $userkey= mysqli_num_rows(mysqli_query($mysqli, "SELECT * FROM user"));
    $sql = "insert into user (ID, Password, Nickname, Age, UserKey)";
    $sql = $sql. "values('$id','$password','$name','$age','$userkey')";
     if($mysqli->query($sql)){
       echo $name.'님 가입 되셨습니다.<p/>';
     }else{  
        echo 'fail to insert sql';     
    }
 }else{
     echo "이미 존재하는 ID 입니다. 다른 ID로 가입해주세요.";
 }
 
mysqli_close($mysqli);
 
 
?>
<input type="button" value="초기 화면으로 돌아가기" onclick="location='index1.php'">
</html>
