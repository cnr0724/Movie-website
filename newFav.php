<?php
session_start();
$state=$_SESSION['state'];
?>
<html>
   <meta charset="utf-8">
   <body style='background-color:#F7CAC9;color:white'></body>
<?php
$mysqli = new mysqli('localhost', 'root', '', 'moviesitedb');
$uId=$_SESSION['sesId'];
$uPw=$_SESSION['sesPw'];
$sql="select * from user where ID='".$uId."' and Password=".$uPw;
$result= mysqli_query($mysqli, $sql);
if(!$result){
    echo 'MYSQL Error:'.mysqli_error();
    exit;
}
$uNum= mysqli_fetch_assoc($result)['UserKey'];
$num=$_SESSION['objNumber'];
if($state=="movie"){    
    $sql="insert into favorite (uKey,t,oKey)";
    $sql=$sql."values('$uNum','movie','$num')";
    $name=mysqli_fetch_assoc(mysqli_query($mysqli,"Select Name from movie where MovieKey=".$num))['Name'];
    if($mysqli->query($sql)){
        echo '성공적으로 좋아하는 영화 '.$name.'에 대한 정보를 추가하였습니다!';
    }else{
        echo 'fail to insert sql'; 
    }
}else if($state=="actor"){
    $sql="insert into favorite (uKey,t,oKey)";
    $sql=$sql."values('$uNum','actor','$num')";
    $name=mysqli_fetch_assoc(mysqli_query($mysqli,"Select Name from actor where ActorKey=".$num))['Name'];
    if($mysqli->query($sql)){
        echo '성공적으로 좋아하는 배우 '.$name.'에 대한 정보를 추가하였습니다!';
    }else{
        echo 'fail to insert sql'; 
    }
}
 
mysqli_close($mysqli);
 
 
?>
   <br>
<input type="button" value="초기 화면으로 돌아가기" onclick="location='returnLogin.php'">
<br>
</html>