<?php
session_start();
?>
<html>
   <meta charset="utf-8">
   <body style='background-color:#F7CAC9;'></body>
   <table border='1' align="center" style="background-color:ivory">
        <thead>
            <tr>
                
                <th width="100">사용자</th>
                <th width="100">영화 이름</th>
            </tr>
        </thead>
        <tbody>
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
            $sql="select * from user where UserKey=".$uNum;
            $result= mysqli_query($mysqli, $sql);
            $age= mysqli_fetch_assoc($result)['Age'];
            $sql1="select u.NickName as NName, m.Name as MName from favorite f, user u, movie m where f.uKey=u.UserKey and f.oKey=m.MovieKey and f.t='movie' and u.Age=".$age;
            $res=mysqli_query($mysqli,$sql1);
            $tNum= mysqli_num_rows($res);
            
            if($tNum!=0){
                for($i=0; $i<$tNum; $i++)
                {
                    $row= mysqli_fetch_assoc($res);
                
                echo "<tr>";
                echo "<td align='center'>".$row['NName']."</td>";
                echo "<td align='center'>".$row['MName']."</td>";
                echo "</tr>";
                
            }}
 
mysqli_close($mysqli);
 
 
?>
   <br>
<input type="button" value="초기 화면으로 돌아가기" onclick="location='returnLogin.php'">
<br>
</html>