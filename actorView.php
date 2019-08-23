<?php
session_start();
$_SESSION['state']='actor';
$num=$_REQUEST['number'];
$_SESSION['objNumber']=$num;
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
    ?>
    <table border='1' align="center" style="background-color:ivory">
        <thead>
            <tr>
                <th width="100">이름</th>
                <th width="100">생일</th>
                <th width="100">성별</th>
                <th width="100">국적</th>
            </tr>
        </thead>
        <tbody>
            
            <?php
                    $row = mysqli_fetch_assoc($result);
                    echo "<tr>";
                    echo "<td align='center'>".$row['Name']."</td>";
                    echo "<td align='center'>".$row['DateOfBirth']."</td>";
                    echo "<td align='center'>".$row['Sex']."</td>";
                    echo "<td align='center'>".$row['Nationality']."</td>";     
                    echo "</tr>";
                    
            ?>
        </tbody>
    </table>
    <br><br>
    <table border='1' align="center" style="background-color:ivory">
        <thead>
            <tr>
                <th width="100">영화</th>
                <th width="100">역할명</th>
            </tr>
        </thead>
        <tbody>
            
            <?php
            $sql="select * from role where ActorKey=".$num;
            $result= mysqli_query($mysqli, $sql);
            $tNum= mysqli_num_rows($result);
            
            if($tNum!=0){
                for($i=0; $i<$tNum; $i++)
                {$row=mysqli_fetch_assoc($result);
                $mK=$row['MovieKey'];
                $sql2="select * from movie where MovieKey=".$mK;
                $res2=mysqli_query($mysqli,$sql2);
                $mN=mysqli_fetch_assoc($res2)['Name'];
                
                echo "<tr>";
                echo "<td align='center'>".$mN."</td>";
                echo "<td align='center'>".$row['Rolename']."</td>";
                echo "</tr>";
                
            }}                    
                    mysqli_close($mysqli);
            ?>
        </tbody>
    </table>
    <br><br>
        <input type="button" name="love" value='좋아하는 배우로 추가하기' onclick="location='newFav.php'">
        <input type="button" name="role" value="출연작 추가하기" onclick="location='newRole.php'">
        <input type="button" value="뒤로 가기" onclick="javascripｔ:history.go(-1)">
</body>
</html>