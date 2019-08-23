<?php
session_start();
?>
<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <title>DB</title>
    <style>
     a:link {
     color: black;
     background-color: transparent;
     text-decoration: none;
     }
     a:visited {
     color: gray;
     background-color: transparent;
     text-decoration: none;
     }
     a:hover {
     color: gray;
     background-color: transparent;
     text-decoration: underline;
     }
     a:active {
     color: black;
     background-color: transparent;
     text-decoration: underline;
     }
      #jb-container {
          width: 940px;
          height: 490px;
          margin: 0px ;
          padding: 20px;
          border: 1px solid white;
          background-color:#F7CAC9;
      }
      #jb-header {
          color:#f16c69;
          padding: 20px;
          margin-bottom: 20px;
          border: 1px solid white;
      }
      #jb-sidebar-left {
          color:#f16c69;
          width: 680px;
          height: 300px;
          padding: 20px;
          margin-right: 10px;
          margin-bottom: 20px;
          float: left;
          border: 1px solid white;
      }
      #jb-content {
          width: 450px;
          padding: 20px;
          margin-bottom: 20px;
          float: left;
          border: 1px solid white;
      }
      #jb-sidebar-right {
          color:#f16c69;
          width: 160px;
          height: 300px;
          padding: 20px;
          margin-bottom: 20px;
          float: right;
          border: 1px solid white;
      }
      #jb-footer {
          clear: both;
          padding: 20px;
          border: 1px solid white;
      }
    </style>
  </head>
 
 
<body style="background-color:#F7CAC9">
    <div id="jb-container">
      <div id="jb-header">
        <h1>회원 전용 창입니다.</h1>
      </div>
      <div id="jb-sidebar-left">
        <h2>영화 검색</h2>
        <ul>
            <form name='search' method=get action='movieSearch.php'>
                <input type='text' name='searchObj' size=50>
                <input type='submit' value='검색'>
            </form>
        </ul>
        <h2>배우 검색</h2>
        <ul>
            <form name='search' method=get action='actorSearch.php'>
                <input type='text' name='searchObj' size=50>
                <input type='submit' value='검색'>
            </form>
        </ul>
        <h2>나와 같은 나이의 이용자가 좋아하는 영화 보기</h2>
        <input type = "button" name = "recommendation" value ="추천 영화" onclick = "location='recommendation.php'">
      </div>
 
      <div id="jb-sidebar-right">

<?php
     $mysqli = new mysqli('localhost', 'root', '', 'moviesitedb');
     $logId=$_SESSION["sesId"];
     $logPw=$_SESSION["sesPw"];
     if(($logId!=null)&&($logPw!=null)){
        $q="select * from user where Id='$logId' AND Password='$logPw'";
        $result=mysqli_query($mysqli,$q);
        $c = mysqli_num_rows($result);
        if ($c!=0) {
           echo $_SESSION['sesName'].'님 안녕하세요<p/>';
           echo '<a href="./index1.php">로그아웃 하기</a>';   
        }else{
            echo("<script>location.href='RSDB_starterror.php';</script>");
        }
     }else{
        echo 'error<br /><br />';
        echo '로그인이 완료되지 않았습니다.<br />';
        echo '기능 이용에 어려움이 있을 수 있으니 초기 화면으로 돌아가 로그인을 다시 해주세요.';
     }
    
 
 
?>


 
      </div>
 
    </div>
  </body>
</html>