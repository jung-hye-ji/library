<?php
    include "dbconn.php";
    session_start();

    $idx = $_GET['idx'];

    $query= "select * from book_board where idx='$idx'";
    $result = mysqli_query($conn, $query);
    $data = mysqli_fetch_array($result);


?>
<!doctype html>
    <head>
        <title>DJ 도서관 : 이야기 마당</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width-device-width, initial-scale-1">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+KR&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <script src="http://code.jquery.com/jquery-latest.js"></script>
        <script type="text/javascript" src="common.js"></script>
    </head>

    <style>
        body {
            background-color:white;
            height: 100vh;     
        }
        .wrapper {
            background-color :#dccbed; 
            height: 350px;
            margin: 0;
        }
        .content {
            min-height: 100vh;
            width: 1200px;
            margin: 0 auto;
        }
        .header img {
            vertical-align: bottom;
            width: 250px;
            height: 250px;
            margin-top: 160px;
        }
        .caution {
            margin-top: 30px;
            padding:10px; 
            border:3px solid #c2c2c2; 
            background:#ffffff;
        }
        span {
            font-family: 'Noto Sans KR', sans-serif;
            font-size: 25px;
            font-weight: 300;
            font-weight: bold;
            margin-left: 20px;
        }
        ul.arr {
            list-style-type: circle;
        }
        #plus-menu, #main-menu {
            list-style: none;
            margin-top: 0;
            margin-right: 10px;
            margin-bottom: 10px;
            padding: 0;
            text-align: right;
            font-family: 'Noto Sans KR', sans-serif;
        }
        #plus-menu > li {
            display: inline;
            margin:5px;
            border: 1px solid #eee;
            background: #eee;
            border-radius: 100px;
            padding: 5px 10px;
        }
        #main-menu > li {
            display: inline;
            list-style: none;
            font-size: 20px;
            padding: 10px;
        }
        #serchbar{
				padding-left: 200px;
			  
			}
        a:link {
            text-decoration: none;
            color: black;
        }
        a:visited {
            text-decoration: none;
            color: black;
        }
        #plus-menu > li > a:hover {
            text-decoration: underline;
        }
        footer {
                display: block;
                height: 200px;
                margin-top: 200px;
                bottom: 0;
                background-color: #dccbed;
				text-align: center;
				padding:40px;
				
        }
        .board_list {
            width: 100%;
            border-top: 2px solid rgb(65, 2, 102);
        }
        .board_list tr {
            border-bottom: 1px solid #999;
        }
        .board_list th {
            width: 200px;
        }
        .board_list td {
            padding: 10px;
            font-size: 16px;
        }
        /* 댓글 */
        .reply_view {
            width:100%;
            margin-top:100px; 
            word-break:break-all;
            background-color: #f2f2f2;
            padding: 20px;
        }
        .dap_lo {
            font-size: 14px;
            padding:10px 0 15px 0;
            border-bottom: solid 1px gray;
        }
        .dap_to {
            margin-top:5px;
        }
        .rep_me {
            font-size:12px;
        }
        .rep_me ul li {
            float:left;
            width: 30px;
        }
        .dat_delete {
            display: none;
        }	
        .dat_edit {
            display:none;
        }
        .dap_sm {
            position: absolute;
            top: 10px;
        }
        .dap_edit_t{
            width:520px;
            height:70px;
            position: absolute;
            top: 40px;
        }
        .re_mo_bt {
            position: absolute;
            top:40px;
            right: 5px;
            width: 90px;
            height: 72px;
        }
        #re_content {
            width:700px;
            height: 56px; 
        }
        .dap_ins {
            margin-top:50px;
        }
        .re_bt {
            position: absolute;
            width:100px;
            height:56px;
            font-size:16px;
            margin-left: 10px;
            border: 1px solid #eee;
            background: rgb(65, 2, 102);
            border-radius: 100px;
            color: white;
        }
        #foot_box {
            height: 50px; 
}
    .container {
        margin-bottom: 80px;
    }
    .space {
            padding: 80px;
        }
        .logo {
            margin-left: 10px;
        }
        .button {
            margin:10px;
            border: 1px solid #eee;
            background: #eee;
            border-radius: 100px;
            padding: 5px 10px;
        }
</style>
<body>
    <div class="wrapper">
        <ul id="plus-menu">
                <?php 			   
                       if(!isset($_SESSION['uid'])){
                           echo "<script>";
                           echo "alert('로그인을 한 다음 이용할 수 있습니다.');";
                           echo "history.back()";
                           echo "</script>";
               
                       }
                       else {


                        if(!isset($_SESSION['uid'])){
                            echo "<li><a href='login.html'>로그인</a></li>";
                            echo "<li><a href='signup.html'>회원 가입</a></li>";
                        }
                        else {
                            $name = $_SESSION['name'];	
                            echo "<li> $name 회원님 </li>";
                            echo "<li> <a href='logout.php'>로그아웃</a></li>";
                        }?>
            </ul>
            <table>
                    <tr><td> <a href="main.php"><img class="logo" src="images/logo2.png"></a></td>
                    
                    <td class="space"></td>
                    <td id="serchbar">
        <div>
                    <form action="search.php" method="POST">
                    <input type="text" style="height: 45px; width: 400px;"  placeholder="제목, 저자 검색" name="search" >
                    <button type="submit"><i class="material-icons" style="font-size:20px; height: 40px; padding: 7px;" value="search">search</i></button>
                </form>
                    </td></tr>
                    </table>
            <div class="dropmenu">
                <ul id="main-menu">
                <a href="notice.php" class="w3-bar-item w3-button w3-xlarge">공지사항</a>
                        <a href="showbook.php" class="w3-bar-item w3-button w3-xlarge">소장도서</a>
                        <a href="list.php" class="w3-bar-item w3-button w3-xlarge w3-purple">이야기 마당</a>
                        <a href="question.php" class="w3-bar-item w3-button w3-xlarge">자주 묻는 질문</a>
                        <div class="w3-dropdown-hover">
                            <button class="w3-button w3-xlarge">마이페이지</button>
                            <div class="w3-dropdown-content w3-bar-block w3-border">
                                <a href="change.php" class="w3-bar-item w3-button">내 정보수정</a>
                                <a href="likecart.php" class="w3-bar-item w3-button">찜한 도서</a>
                                <a href="showcart.php" class="w3-bar-item w3-button">대출 도서</a>
                                <?php
                $query2 = "select * from member";
                $result2 = mysqli_query($conn, $query2);
                while ($row = mysqli_fetch_array($result2)) {
                    if (isset($_SESSION['uid']) && $_SESSION['uid']==$row['uid'] && $row['role'] == 'admin') { ?><a href="admincare.php" class="w3-bar-item w3-button">도서 관리</a><?php  };
                 } ?>
                            </div>
                        </div>
                </ul>
            </div>
<!--------- 상단메뉴-------------->
<div class = "content">
        <div class="container">
                <div class="header"><img src="images/Wavy_Edu-03_Single-04.jpg" align="middle">
                        <span>DJ 도서관 이야기마당 : 다양한 의견을 나누어보세요.</span>
                </div>
            <div class="caution">
                                <ul class="arr">
                                    <li>개인정보가 불법적으로 이용되는 것을 막기 위해 이용자께서는 <strong>e-메일, 주소, 주민번호, 전화번호 등 개인정보에
                                        관한 사항을 게시하는 것을 주의</strong>하시기 바랍니다. </li>
                                    <li>또한, 개인정보, 도서관 사업과 관련 없는 사항, 광고성, 홍보성, 특정인의 명예훼손, 기타 불건전한 내용을 담고 있을
                                        경우, <strong>내용에 상관없이 삭제</strong>됩니다. </li>
                                </ul>
            </div>
        </div>
    <div class="list_board">
        <form action="listwritepost.php" method="post">
        <table class="board_list" width=800 border="1" cellpading=10>
                <tr>
                    <th> 이름 </th>
                    <td> <?=$data['name']?> </td>
                </tr>
                <tr>
                    <th> 제목 </th>
                    <td> <?=$data['subject']?> </td>
                </tr>
                <tr>
                    <th> 내용 </th>
                    <td style="height: 400px; text-align: left;"> <?=nl2br($data['memo'])?>
                        
                    </td>
                </tr>

            <tr>
                <td colspan="2">
                    <div class="button" style="float:right;" >
                        <a href="listdel.php?idx=<?=$idx?>" onclick="return confirm('정말 삭제할까요?')">삭제</a>
                    </div>
                    <div class="button" style="float:right;" >
                        <a href="listmodify.php?idx=<?=$idx?>">수정</a>
                    </div>
                    <div class="button" style="float:left;" >
                        <a href="list.php">목록</a>
                    </div>
                </td>
            </tr>
</table>
                    
</form>
<!-----댓글 불러오기-->

        <div class="reply_view">
                <h3 style="font-family: 'Noto Sans KR', sans-serif;">댓글목록</h3>
                <?php 
                
                $query = "select * from reply where con_num=".$idx." order by idx desc";
                $result = mysqli_query($conn, $query);


                while($reply= mysqli_fetch_array($result)) {?>
                            <div class="dap_lo">
                                <div><b><?php echo $reply['name'];?></b></div>
                                <div class="dap_to comt_edit"><?php echo nl2br("$reply[content]"); ?></div>
                                <div class="rep_me dap_to"><?php echo $reply['date']; ?></div>
                                <div class="rep_me rep_menu">
                                    <a class="dat_delete_bt" href="replydel.php?idx=<?=$idx?>">삭제</a>
                                </div>
                            
                            
                                <?php  } ?>  <!---/* while문-->
                                    <!--- 댓글 입력 폼 -->
                                        <div class="dap_ins">
                                            <form action="reply_ok.php?idx=<?php echo $idx; ?>" method="POST">
                                                <input type="text" name="dat_user" id="dat_user" class="dat_user" size="15" placeholder="아이디">
                                                <input type="password" name="dat_pw" id="dat_pw" class="dat_pw" size="15" placeholder="비밀번호">
                                                <div style="margin-top:10px; ">
                                                    <textarea name="content" class="reply_content" id="re_content" ></textarea>
                                                    <button value="확인" id="rep_bt" class="re_bt">확인</button>
                                                </div>
                                            </form>
                                        </div>
                            </div>
            </div>
            </div>
                

   
    

            

<footer class="footer">
				11159 경기도 포천시 호국로 1007(선단동) 대진대학교<br>
				DAEJIN UNIVERSITY, 1007 HOGUK-RO, POCHEON-SI, GYEONGGI-DO 11159, KOREA<br><br>
				<i class="material-icons">call</i> 031)0000-0000 &nbsp 
				<i class="material-icons">print</i> 031)0000-0001<br><br>
				<i class="material-icons">facebook</i>페이스북 &nbsp &nbsp 
				<i class="material-icons">share</i> 공유하기
				</footer>
    </div>
<?php } ?> <!--// if문-->


    </body>
</html>
