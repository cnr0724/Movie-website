<?php
session_start();
?>
<html>
   <meta charset="utf-8">
   <body style='background-color:#F7CAC9;color:white'></body>
<?php
$mysqli = new mysqli('localhost', 'root', '', 'moviesitedb');
$mName=$_POST['name'];
$rName=$_POST['rName'];

$sql="select * from movie where Name='".$mName."'";
$result= mysqli_query($mysqli, $sql);
if(mysqli_num_rows($result)==0){
    echo "현재 해당 영화에 대한 정보가 없습니다. 영화에 대한 정보부터 추가해주세요.";
    exit;
}else{
$mKey= mysqli_fetch_assoc($result)['MovieKey'];
$num=$_SESSION['objNumber'];
$sql="select * from actor where ActorKey=".$num;
$result=mysqli_query($mysqli,$sql);
$row= mysqli_fetch_assoc($result);
$aName=$row['Name'];
$sql="insert into role (MovieKey,ActorKey, RoleName)";
$sql=$sql."values('$mKey','$num','$rName')";
if($mysqli->query($sql)){
    echo '성공적으로 배우 '.$aName.'이(가) 출연한 영화 '.$mName.'에 대한 정보를 추가하였습니다!';
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