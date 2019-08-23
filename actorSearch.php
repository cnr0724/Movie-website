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
         $sql="select * from actor where Name LIKE '%$sO%'";
     }else{
        $sql="select * from actor";
     }
     $result=mysqli_query($mysqli, $sql);
     $resultN= mysqli_num_rows($result);
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
                for($i=0; $i<$resultN; $i++)
                {
                    $row = mysqli_fetch_assoc($result);
                    $aK=$row['ActorKey'];
                    $type='actor';
                    $link="actorView.php?type=".$type."&number=".$aK;
                    $n=$row['Name'];
                    $linking="<a href=".$link.">".$n."</a>";
                    echo "<tr>";
                    echo "<td align='center'>".$linking."</td>";
                    echo "<td align='center'>".$row['DateOfBirth']."</td>";
                    echo "<td align='center'>".$row['Sex']."</td>";
                    echo "<td align='center'>".$row['Nationality']."</td>";     
                    echo "</tr>";
                }
              mysqli_close($mysqli);
            ?>
        <br>
        <input type = "button" name = "table" value ="추가" onclick = "location.href='actorInsert.php'">
        <input type="button" value="뒤로 가기" onclick="location.href='returnLogin.php'">
            
             
        </tbody>
    </table>
 
</body>
</html>
