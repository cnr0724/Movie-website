<?php
session_start();
$_SESSION['state']='movie';
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
     $sql="select * from movie where MovieKey=".$num;
     $result=mysqli_query($mysqli,$sql);
    ?>
    <table border='1' align="center" style="background-color:ivory">
        <thead>
            <tr>
                <th width="100">제목</th>
                <th width="100">감독</th>
                <th width="100">장르</th>
                <th width="100">별점</th>
            </tr>
        </thead>
        <tbody>
            <?php
                    $row = mysqli_fetch_assoc($result);
                    $sql1="select AVG(Rate) as average from rating where MovieKey=".$num;
                    $res= mysqli_query($mysqli,$sql1);
                    $rate=mysqli_fetch_assoc($res)['average'];
                    
                    echo "<tr>";
                    echo "<td align='center'>".$row['Name']."</td>";
                    echo "<td align='center'>".$row['Director']."</td>";
                    echo "<td align='center'>".$row['Genre']."</td>";
                    echo "<td align='center'>".$rate."</td>";
                    echo "</tr>";
            ?>
        </tbody>
    </table>
    <br><br>
    <table border='1' align="center" style="background-color:ivory">
        <thead>
            <tr>
                
                <th width="100">출연 배우</th>
                <th width="100">역할명</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql1="select * from role where MovieKey=".$num;
            $res=mysqli_query($mysqli,$sql1);
            $tNum= mysqli_num_rows($res);
            
            if($tNum!=0){
                for($i=0; $i<$tNum; $i++)
                {$row=mysqli_fetch_assoc($res);
                $aK=$row['ActorKey'];
                $sql2="select * from actor where ActorKey=".$aK;
                $res2=mysqli_query($mysqli,$sql2);
                $aN=mysqli_fetch_assoc($res2)['Name'];
                
                echo "<tr>";
                echo "<td align='center'>".$aN."</td>";
                echo "<td align='center'>".$row['Rolename']."</td>";
                echo "</tr>";
                
            }}
            ?>
        </tbody>
    </table>
    <br><br>
    <table border='1' align="center" style="background-color:ivory">
        <thead>
            <tr>
                
                <th width="100">작성자</th>
                <th width="100">별점</th>
                <th width="500">리뷰</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql1="select * from rating where MovieKey=".$num;
            $res=mysqli_query($mysqli,$sql1);
            $tNum= mysqli_num_rows($res);
            
            if($tNum!=0){
                for($i=0; $i<$tNum; $i++)
                {$row=mysqli_fetch_assoc($res);
                $wK=$row['UserKey'];
                $sql2="select * from user where UserKey=".$wK;
                $res2=mysqli_query($mysqli,$sql2);
                $wK=mysqli_fetch_assoc($res2)['Nickname'];
                
                echo "<tr>";
                echo "<td align='center'>".$wK."</td>";
                echo "<td align='center'>".$row['Rate']."</td>";
                echo "<td align='center'>".$row['Review']."</td>";
                echo "</tr>";
                
            }}
            ?>
        </tbody>
    </table>
    <br><br>
     <br><br>
    <table border='1' align="center" style="background-color:ivory">
        <thead>
            <tr>
                
                <th width="100">작성자</th>
                <th width="100">유형</th>
                <th width="500">트리비아</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql1="select * from trivia where MovieKey=".$num;
            $res=mysqli_query($mysqli,$sql1);
            $tNum= mysqli_num_rows($res);
            
            if($tNum!=0){
                for($i=0; $i<$tNum; $i++)
                {$row=mysqli_fetch_assoc($res);
                $wK=$row['WriterKey'];
                $sql2="select * from user where UserKey=".$wK;
                $res2=mysqli_query($mysqli,$sql2);
                $wK=mysqli_fetch_assoc($res2)['Nickname'];
                if($row['Type']==1){
                    $type='movie';
                }else if($row['Type']==2){
                    $type='actor';
                }
                
                echo "<tr>";
                echo "<td align='center'>".$wK."</td>";
                echo "<td align='center'>".$type."</td>";
                echo "<td align='center'>".$row['Trivia']."</td>";
                echo "</tr>";
                
            mysqli_close($mysqli);
            }}
            ?>
        </tbody>
    </table>
        <input type = "button" name = "rate" value ="별점 주기" onclick = "location='movieRating.php'">
        <input type="button" name='trivia' value="트리비아 적기" onclick="location='writeTrivia.php'">
        <input type="button" name="love" value='좋아하는 영화로 추가하기' onclick="location='newFav.php'"> 
        <input type="button" value="뒤로 가기" onclick="javascripｔ:history.go(-1)">
</body>
</html>