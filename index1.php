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
         color: grey;
         background-color: transparent;
         text-decoration: none;
     }
     a:hover {
         color: grey;
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
          height: 390px;
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
          height: 200px;
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
          height: 200px;
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
        <h1>영화 사이트</h1>
      </div>
      <div id="jb-sidebar-left">
        <h2>이 사이트는 회원제 사이트입니다.</h2>
 
        <ul>
            로그인 뒤 검색이 가능합니다.
        </ul>
      </div>
        
      <div id="jb-sidebar-right">
          <h2>로그인</h2>
          <form name='login' method=post action="https://localhost/login.php">
              아이디 : <input type="text" name="id">
              비밀번호 : <input type="password" name="password">
              <input type=submit value="로그인">
              <input type="button" name ="버튼" value="회원가입" onclick="location='join.php'">
          </form>
      </div>
    </div>
  </body>
</html>