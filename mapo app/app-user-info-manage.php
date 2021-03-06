<?php
//세션 체크 기능 모든 페이지에 추가 필요
header("Pragma:no-cache");
header("Cache-Control:no-cache,must-revalidate");
include '../src/method_config.php';
session_check_app();
$sql = "select * from order_info o 
left join partner p on p.p_no = o.p_no
where o_status!= '취소' and m_no = '{$_SESSION[m_no]}' order by o_order_date asc";
$r = sqlresult($sql);
$rr = sqlrow($sql);
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>돌봄이음</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="css/static-style.css">
    <link rel="stylesheet" href="css/app-user-info-manage.css">
    <link rel="stylesheet" href="css/app-user-footer.css">
    <script src="/src/jquery.js"></script>
    <script>
        function sms(){
            var request = $.ajax({
                type: "POST",
                url: "/api/order_join",
                data: { method : 'get', phone : $('#fix_tel').val() },
            });
            request.done(function( msg ) {
                alert(msg);
            });
        }
        function check(){
            var request = $.ajax({
                type: "POST",
                url: "/api/order_join",
                data: { method : 'check', code : $('#code').val() },
            });
            request.done(function( msg ) {
                alert(msg);
            });
        }
        function notice(){
            var request = $.ajax({
                type: "POST",
                url: "/api/order_join",
                data: { method : 'notice', code : $('#btnradio1').is(":checked") },
            });
            request.done(function( msg ) {
                alert(msg);
            });
        }
        function unregister(){
            var request = $.ajax({
                type: "POST",
                url: "/api/order_join",
                data: { method : 'unregister'},
            });
            request.done(function( msg ) {
                alert(msg);
                location.href="/app/app-user-login";
            });
        }
    </script>
</head>
<body>
    <div class="title_area">
        <h3>마포형 커뮤니티케어 일자리플랫폼</h3>
        <h1>돌봄이음</h1>
    </div>
    <header>
        <button class="returnButton_cont" type ="button" onclick="location.href='app-user-info'">
            <div class="returnButton_icon" >
                <svg width="13" height="21" viewBox="0 0 13 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M0.778809 10.8916C0.778809 11.2847 0.924805 11.6216 1.23926 11.9136L9.97656 20.4712C10.2236 20.7183 10.5381 20.853 10.9087 20.853C11.6499 20.853 12.2451 20.269 12.2451 19.5166C12.2451 19.146 12.0879 18.8203 11.8408 18.562L3.96826 10.8916L11.8408 3.22119C12.0879 2.96289 12.2451 2.62598 12.2451 2.2666C12.2451 1.51416 11.6499 0.930176 10.9087 0.930176C10.5381 0.930176 10.2236 1.06494 9.97656 1.31201L1.23926 9.8584C0.924805 10.1616 0.778809 10.4985 0.778809 10.8916Z" fill="black"/>
                </svg>
            </div>
            <p>돌아가기</p>    
        </button>
    </header>
    <main class="mainContainer">
        <div class="title">
            <h1>내 정보 관리</h1>
        </div>
        <div class="boxContainer">
            <p>이름</p>
            <input type="text" disabled value="<?=$_SESSION[m_name]?>">
            <p>주소</p>
            <input type="text" value="<?=$_SESSION[m_addr]?>" disabled>
            <button id="change_addr" class="buttonStyle" type="button">주소 변경</button>
            <p>전화번호</p>
            <input type="text" value="<?=$_SESSION[m_tel]?>" disabled>
            <button id="change_tel" class="buttonStyle" type="button">전화번호 변경</button>
            <p>정보수신알림</p>
            <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                <input type="radio" class="btn-check" name="btnradio" id="btnradio1" autocomplete="off" <?=($_SESSION[m_notice] == 'Y')?"checked":""?> onclick="notice();" value="Y">
                <label class="btn btn-outline-primary" for="btnradio1">켜기</label>
                <input type="radio" class="btn-check" name="btnradio" id="btnradio2" autocomplete="off" <?=($_SESSION[m_notice] == 'N')?"checked":""?> onclick="notice();" value="N">
                <label class="btn btn-outline-primary" for="btnradio2" >끄기</label>
                </div>
            <div class="selectBox">
                <button id="logout" class="btn btn-primary selectButton" type="button">로그아웃</button>
                <button id="out" class="btn btn-danger selectButton" type="button">회원탈퇴</button>
            </div>
        </div>
    </main>
    <!-- Layer popup app-user-info-manage-addr -->
    <div class="app-user-info-manage-addr">
        <div class="layer_popup_cont">
            <div class="popup_title">
                <h1>주소 변경</h1>
            </div>
            <div class="popup_selectListContianer">
                <form method="post" action="/api/app_process">
                <input type="hidden" name="method" value="fix_addr">
                <div class="input-group mb-3">
                    <input class="form-control addrBtn" type="button" onclick="sample3_execDaumPostcode(); block()" value="주소 검색하기">
                </div>
                <div class="addr_box">
                    <input class="form-control" type="hidden" id="sample3_postcode" placeholder="우편번호">
                    <input name="fix_addr" class="form-control" type="text" id="sample3_address" placeholder="주소" readonly>
                    <div class="input-group mb-3">
                        <input  name="fix_addr_detail" class="form-control" type="text" id="sample3_detailAddress" placeholder="상세주소">
                        <input class="form-control" type="text" id="sample3_extraAddress" placeholder="">
                    </div>
                </div>
                <div class="addr_iframe_wrap">
                    <div id="wrap" style="display:none;border:1px solid;width:100%;height:10rem;margin:5px 0;position:relative">
                        <img src="//t1.daumcdn.net/postcode/resource/images/close.png" id="btnFoldWrap" style="cursor:pointer;position:absolute;right:0px;top:-1px;z-index:1" onclick="foldDaumPostcode()" alt="접기 버튼">
                    </div>
                </div>
            </div>
            <div class="selectBox">
                <button type="submit" class="btn btn-primary btn-sm">변경하기</button>
            </form>
                <button type="button" class="goBack btn btn-light btn-sm" onclick=goBack();>
                    돌아가기
                </button>
            </div>
        </div>
    </div>
    <!-- Layer popup app-user-info-manage-tel -->
    <div class="app-user-info-manage-tel">
        <div class="layer_popup_cont">
            <div class="popup_title">
                <h1>전화번호 변경</h1>
            </div>
            <div class="popup_selectListContianer">
                <div class="inputBox">
                    <form action="/api/app_process" method="post">
                        <input type="hidden" name="method" value="fix_tel">
                    <input class="inputStyle" type="tel" name="fix_tel" id="fix_tel" placeholder="전화번호를 입력해 주세요.">
                    <button class="btn btn-primary btn-sm telBox_button" type="button" onclick="sms();">
                        인증
                    </button>
                </div>
                <div class="inputBox">
                    <input class="inputStyle" type="text" name="code" id="code" placeholder="인증번호를 입력해 주세요.">
                    <button class="btn btn-primary btn-sm telBox_button" type="button" onclick="check();">
                        인증하기
                    </button>
                </div>
            </div>
            <div class="selectBox">
                <button type="submit" class="btn btn-primary btn-sm">변경하기</button>
            </form>
                <button type="button" class="goBack btn btn-light btn-sm" onclick=goBack();>돌아가기</button>
            </div>
        </div>
    </div>
    <!-- Layer popup app-user-info-manage-logout -->
    <div class="app-user-info-manage-logout">
        <div class="layer_popup_cont">
            <h2>로그아웃 되었습니다.</h2>
            <button type="button" class="btn btn-primary" onclick="location.href='/api/app_logout'">메인화면</button>
        </div>
    </div>
    <!-- Layer popup app-user-info-manage-out -->
    <div class="app-user-info-manage-out">
        <div class="layer_popup_cont">
            <h2>정말 탈퇴하시겠습니까?</h2>
            <div class="popup_selectListContianer">
                <button type="button" class="btn btn-danger btn-sm" onclick="unregister();">탈퇴하기</button>
                <button type="button" class="btn btn-bordrer btn-sm" onclick=goBack();>취소</button>
            </div>
        </div>
    </div>
    <!-- footer-->
    <footer>
        <nav id ="navBar">
            <div class="navButton" onclick="location.href='app-user-main'">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M2 13L11.293 3.707C11.6835 3.31662 12.3165 3.31662 12.707 3.707L22 13H20V21C20 21.5523 19.5523 22 19 22H14V15H10V22H5C4.44772 22 4 21.5523 4 21V13H2Z" fill="#2E3A59"/>
                </svg>
                <span>홈</span>   
            </div>
            <div class="navButton" onclick="location.href='app-user-biz'">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M19 19H13V13H19V19ZM11 19H5V13H11V19ZM19 11H13V5H19V11ZM11 11H5V5H11V11Z" fill="#2E3A59"/>
                </svg>
                <span>사업소개</span>    
            </div>
            <div class="navButton" class="box" onclick="location.href='app-user-order'">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M19 22H5C3.89543 22 3 21.1046 3 20V6C3 4.89543 3.89543 4 5 4H7V2H9V4H15V2H17V4H19C20.1046 4 21 4.89543 21 6V20C21 21.1046 20.1046 22 19 22ZM5 10V20H19V10H5ZM5 6V8H19V6H5ZM13 18H11V16H9V14H11V12H13V14H15V16H13V18Z" fill="#2E3A59"/>
                </svg>
                <span>돌봄신청</span>    
            </div>
            <div class="navButton" class="box" onclick="location.href='app-user-info'">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M12 22C10.4881 22.0043 8.99522 21.6622 7.636 21C7.13855 20.758 6.66193 20.4754 6.211 20.155L6.074 20.055C4.83382 19.1396 3.81987 17.9522 3.11 16.584C2.37574 15.1679 1.99491 13.5952 1.99995 12C1.99995 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12C22.005 13.5944 21.6246 15.1664 20.891 16.582C20.1821 17.9494 19.1696 19.1364 17.931 20.052C17.4638 20.394 16.9679 20.6951 16.449 20.952L16.369 20.992C15.0089 21.6577 13.5143 22.0026 12 22ZM12 17C10.5015 16.9971 9.12766 17.834 8.443 19.167C10.6844 20.2772 13.3156 20.2772 15.557 19.167V19.162C14.8715 17.8305 13.4976 16.9954 12 17ZM12 15C14.1661 15.0028 16.1634 16.1701 17.229 18.056L17.244 18.043L17.258 18.031L17.241 18.046L17.231 18.054C19.76 15.8691 20.6643 12.3423 19.4986 9.21011C18.333 6.07788 15.3431 4.00032 12.001 4.00032C8.65891 4.00032 5.66899 6.07788 4.50335 9.21011C3.33771 12.3423 4.242 15.8691 6.771 18.054C7.83726 16.169 9.83436 15.0026 12 15ZM12 14C9.79086 14 8 12.2091 8 10C8 7.79086 9.79086 6 12 6C14.2091 6 16 7.79086 16 10C16 11.0609 15.5786 12.0783 14.8284 12.8284C14.0783 13.5786 13.0609 14 12 14ZM12 8C10.8954 8 10 8.89543 10 10C10 11.1046 10.8954 12 12 12C13.1046 12 14 11.1046 14 10C14 8.89543 13.1046 8 12 8Z" fill="#2E3A59"/>
                </svg>
                <span>내정보</span>    
            </div>
        </nav>
    </footer>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/app-user-info-manage.js"></script>
    <script src="//t1.daumcdn.net/mapjsapi/bundle/postcode/prod/postcode.v2.js"></script>
    <script src="js/daum_api.js"></script>
    <script src="js/custom_daum_api_control.js"></script>
</body>
</html>