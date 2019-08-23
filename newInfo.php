<?php
session_start();
?>
<html>
   <meta charset="utf-8">
   <body style='background-color:#F7CAC9;color:white'></body>
<?php
$mysqli = new mysqli('localhost', 'root', '', 'moviesitedb');
if($_SESSION['state']=="movieInsert"){
    $name=$_POST['name'];
    $dir=$_POST['director'];
    $gen=$_POST['genre'];
    $sql="select * from movie";
    $movieK=mysqli_num_rows(mysqli_query($mysqli,$sql));
    
    $sql="insert into movie (MovieKey,Name,Director,Genre)";
    $sql=$sql."values('$movieK','$name','$dir','$gen')";
    if($mysqli->query($sql)){
        echo '성공적으로 영화 '.$name.'에 대한 정보를 추가하였습니다!';
    }else{
        echo 'fail to insert sql'; 
    }
}else if($_SESSION['state']=="actorInsert"){
    $name=$_POST['name'];
    $bir=$_POST['birth'];
    $sex=$_POST['sex'];
    $nat=$_POST['nationality'];
    $sql="select * from actor";
    $actorK=mysqli_num_rows(mysqli_query($mysqli,$sql));
    echo $name.$bir.$sex.$nat.$actorK;
    
    $sql="insert into actor (ActorKey,Name,DateOfBirth,Sex,Nationality)";
    $sql=$sql."values('$actorK','$name','$bir','$sex','$nat')";
    if($mysqli->query($sql)){
        echo '성공적으로 배우 '.$name.'에 대한 정보를 추가하였습니다!';
    }else{
        echo 'fail to insert sql'; 
    }
}
 
mysqli_close($mysqli);
 
 
?>
   <br>
<input type="button" value="초기 화면으로 돌아가기" onclick="location='returnLogin.php'">
</html>
