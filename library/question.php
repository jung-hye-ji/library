<?php
include_once('dbconn.php');
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>DJ 도서관 : FAQ 게시판</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width-device-width, initial-scale-1">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+KR:wght@400;700&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Noto+Serif+KR:wght@600&family=Song+Myung&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Song+Myung&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
        ul {
            list-style: none;
            margin-top: 0;
            margin-right: 10px;
            margin-bottom: 10px;
            padding: 0;
            text-align: right;
            font-family: 'Noto Sans KR', sans-serif;
        }
        #serchbar{
            padding-left: 200px;
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
        .space {
            padding: 80px;
        }
        .logo {
            margin-left: 10px;
        }
        section {
            min-height: 100vh;
            width: 900px;
            margin: 0 auto;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .faq {
            max-width: 1200px;
            margin-top: 2rem;
            padding-bottom: 1rem;
            border-bottom: 2px solid #fff;
            cursor: pointer;
        }
        .container {
            max-width : 1200px;
            margin-top: 80px;
        }
        .qusetion {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .qusetion h3 {
            font-size: 1.8rem;
        }

        .answer {
            max-height: 0;
            overflow: hidden;
            transition: max-height 1.4s ease;
        }

        .answer p {
            padding-top: 1rem;
            padding: 1rem 1rem;
            line-height: 1.6;
            font-size: 1.4rem;
            background-color: #f2f2f2;
        }

        .faq.active .answer {
            max-height: 300px;
            animation: fade 1s ease-in-out;
        }

        .faq.active svg {
            transform: rotate(180deg);
        }

        svg {
            transition: transform 0.5s ease-in;
        }

        @keyframes fade {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }
            to {
                opacity: 1;
                transform: translateY(0px);
            }
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
        .qa {
				background: linear-gradient(to top, #f2f2f2 50%, transparent 50%);
				color : $9979c1;
				font-family: 'east sea dokdo', cursive;
				font-size: 110px;
			}
		h2 {
				background: linear-gradient(to top, #f2f2f2 50%, transparent 50%);
				color : #9979c1;
				font-family: 'East Sea Dokdo', cursive;
				font-size : 110px;
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
        
    </style>
    <body>
        <div class="wrapper">
            <ul id="plus-menu">
                <?php 
						
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
                    <a href="notice.php" class="w3-bar-item w3-button w3-xlarge ">공지사항</a>
                        <a href="showbook.php" class="w3-bar-item w3-button w3-xlarge ">소장도서</a>
                        <a href="list.php" class="w3-bar-item w3-button w3-xlarge">이야기 마당</a>
                        <a href="question.php" class="w3-bar-item w3-button w3-xlarge w3-purple">자주 묻는 질문</a>
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
        </div>
        <!---메뉴바-->
        
        <section>
        <div class=container>
        <h2 class="qa">F&Q</h2>
        <div class="faq">
            <div class="question">
                <h3>도서관 프로그램에 참가하고 싶은데 어떻게 신청해야 하나요?</h3>

                <svg width="15" height="10" viewbox="0 0 42 25">
                    <path d="M3 3L21 21L39 3" stroke="white" stroke-width="7" stroke-linecap="round"/>
                </svg>
                </div>
                <div class="answer">
                    <p>
                        프로그램과 관련한 공지사항과 유의사항을 잘 숙지하고 접수하세요. <br>변경사항이 있을 수도 있으니 반드시 최종버전을 확인하고 신청하세요. <br> 기본적으로 DJ도서관에서 진행하는 모든 프로그램은 인터넷으로만 접수 받습니다.<br> ※ 신청 후 출석률이 저조할 경우는 다음 프로그램 참여에 제한이 있습니다. <br>
                    </p>
                </div>
            </div>
            
            <div class="faq">
                <div class="question">
                    <h3>보고 싶은 책이 도서관에 있는지 알고 싶을 때는 어떻게 해야 하나요?</h3>
    
                    <svg width="15" height="10" viewbox="0 0 42 25">
                        <path d="M3 3L21 21L39 3" stroke="white" stroke-width="7" stroke-linecap="round"/>
                    </svg>
                    </div>
                    <div class="answer">
                        <p>
                            상단에 검색창을 통해 책의 서명, 저자, 출판사 등을 입력하여 찾아볼 수 있습니다. <br> 도서관 메인에서 베스트, 신간을 따로 찾아볼 수도 있습니다.
                        </p>
                    </div>
                </div>

                <div class="faq">
                    <div class="question">
                        <h3>도서관 운영 시간은 어떻게 되나요?</h3>
        
                        <svg width="15" height="10" viewbox="0 0 42 25">
                            <path d="M3 3L21 21L39 3" stroke="white" stroke-width="7" stroke-linecap="round"/>
                        </svg>
                        </div>
                        <div class="answer">
                            <p>
                                DJ 도서관은 평일·주말(토·일) 아침 9시에 문을 열고 오후 6시에 문을 닫습니다.<br> 그리고 매주 월요일, 법정공휴일, 그 밖에 도서관 사정에 의해 관장이 정한 날은 도서관이 쉬는 날입니다.<br> * 도서관이 문을 닫은 시간 (오후 6시~ 다음날 오전 9시)에는 후문에 위치한 관외반납함을 이용할 수 있습니다. 반납일 하루 전에 넣으면 다음날 처리 됩니다.
                            </p>
                        </div>
                    </div>

                    <div class="faq">
                        <div class="question">
                            <h3>도서관에서 책을 빌리려면 어떻게 해야 하나요?</h3>
            
                            <svg width="15" height="10" viewbox="0 0 42 25">
                                <path d="M3 3L21 21L39 3" stroke="white" stroke-width="7" stroke-linecap="round"/>
                            </svg>
                            </div>
                            <div class="answer">
                                <p>
                                    * 대상 : 서울, 경기 시민 <br>
                                    홈페이지에서 회원가입을 한 후, 아래 필요 서류를 가지고<br> 도서관 2층 사서 데스크에서 대출카드를 발급받으세요. <br><br>

                                    * 필요 서류 <br>
                                    어린이 : 보호자 신분증 + 최근 3개월 이내 주민등록등본 <br>
                                    성인 : 신분증 <br><br>

                                    성인은 본인이 오셔야 하며, 서류는 사진이나, 이미지는 인정되지 않습니다. <br><br>
                                    회원카드는 현장 발급되며, 바로 이용할 수 있습니다.
                                </p>
                            </div>
                        </div>

                        <div class="faq">
                            <div class="question">
                                <h3>도서를 분실했는데 어떻게 하나요?</h3>
                
                                <svg width="15" height="10" viewbox="0 0 42 25">
                                    <path d="M3 3L21 21L39 3" stroke="white" stroke-width="7" stroke-linecap="round"/>
                                </svg>
                                </div>
                                <div class="answer">
                                    <p>
                                        같은 제목의 새 책을 구입하여 2층 사서데스크로 가져와주세요.<br> 품절이나 절판, 전집에 포함된 자료라 구입이 어려운 경우는 도서관에 문의하세요.
                                    </p>
                                </div>
                            </div>

                            <div class="faq">
                                <div class="question">
                                    <h3>책은 한번에 몇 권씩 빌릴 수 있나요?</h3>
                    
                                    <svg width="15" height="10" viewbox="0 0 42 25">
                                        <path d="M3 3L21 21L39 3" stroke="white" stroke-width="7" stroke-linecap="round"/>
                                    </svg>
                                    </div>
                                    <div class="answer">
                                        <p>
                                            회원증을 소지한 정회원은 5권까지 빌릴 수 있습니다. <br> 한 개의 카드 당 다섯 권씩 가능합니다. 대출 할 때는 회원증이 반드시 필요합니다.
                                        </p>
                                    </div>
                                </div>
                    </div>
    </section>
    </div>
        <footer class="footer">
				11159 경기도 포천시 호국로 1007(선단동) 대진대학교<br>
				DAEJIN UNIVERSITY, 1007 HOGUK-RO, POCHEON-SI, GYEONGGI-DO 11159, KOREA<br><br>
				<i class="material-icons">call</i> 031)0000-0000 &nbsp 
				<i class="material-icons">print</i> 031)0000-0001<br><br>
				<i class="material-icons">facebook</i>페이스북 &nbsp &nbsp 
				<i class="material-icons">share</i> 공유하기
				</footer>
    
    <script>
        const faqs = document.querySelectorAll(".faq");

        faqs.forEach((faq) => {
            faq.addEventListener("click", ( ) => {
                faq.classList.toggle("active");
            })
            
        });
    </script>
</body>
</html>