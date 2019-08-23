<?php
session_start();
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
    
     $sO = $_GET['searchObj'];
    
     if(strlen($sO) > 0) {
         $sql="select * from movie where Name LIKE '%$sO%'";
     }else{
        $sql="select * from movie";
     }
     $result=mysqli_query($mysqli, $sql);
     $resultN= mysqli_num_rows($result);
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
            for($i=0; $i<$resultN; $i++)
                {
                    $row = mysqli_fetch_assoc($result);
                    $Key=(int)$row['MovieKey'];
                    $sql1="select AVG(Rate) as average from rating where MovieKey=$Key";
                    $res= mysqli_query($mysqli,$sql1);
                    $rate=mysqli_fetch_assoc($res)['average'];
                    $mK=$row['MovieKey'];
                    $type="movie";
                    $link="movieView.php?type=".$type."&number=".$mK;
                    $n=$row['Name'];
                    $linking="<a href=".$link.">".$n."</a>";
                    
                    echo "<tr>";
                    echo "<td align='center'>".$linking."</td>";
                    echo "<td align='center'>".$row['Director']."</td>";
                    echo "<td align='center'>".$row['Genre']."</td>";
                    echo "<td align='center'>".$rate."</td>";
                    echo "</tr>";
                    
                    mysqli_close($mysqli);}
            ?>
        <br>
        <input type = "button" name = "table" value ="추가" onclick = "location.href='movieInsert.php'">
        <input type="button" value="뒤로 가기" onclick="location.href='returnLogin.php'">
            
        </tbody>
    </table>
 
</body>
</html>
