<?php
//세션 체크 기능 모든 페이지에 추가 필요
header("Pragma:no-cache");
header("Cache-Control:no-cache,must-revalidate");
include '../src/method_config.php';
session_check_app();
$_SESSION[relation] = $_GET[relation];
$_SESSION[health] =  $_GET[health];
$_SESSION[health_etc_comment] = $_GET[health_etc_comment];
$_SESSION[condition] = $_GET[condition];
$_SESSION[condition_etc_comment] = $_GET[condition_etc_comment];
$_SESSION[back_home] = $_GET[back_home];
$_SESSION[back_home_etc_comment] = $_GET[back_home_etc_comment];
$_SESSION[emergency] = $_GET[emergency];
$_SESSION[textarea] = $_GET[textarea];
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
    <link rel="stylesheet" href="css/app-user-order-child-accept.css">
    <link rel="stylesheet" href="css/app-user-footer.css">
    <script src="/src/jquery.js"></script>
    <script>
        sessionStorage.clear();
    </script>
</head>
<body>
    <div id="container">
        <main>
            <div id="boxContainer_child_accept">
                <div class="title">
                    <h1>개인정보 수집 · 이용 및 제공 동의</h1>
                </div>
                <div>
                    <div class="bd-example">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th scope="col">
                                    <form method="get" action="app-user-order-child-order-register" onsubmit="return checkbox();">
                                    <div class="checkbox_group"> 
                                        <div class="subtitle">
                                            <label for="chk1">
                                                <input type="checkbox" id="chk1" name="agree">
                                                <i class="circle"></i>
                                                <span class="check_text left">개인정보 수집.이용 및 제공 동의 (필수)</span>
                                            </label>
                                        </div>
                                    </div>
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="agree_title">1. 개인정보 수집·이용 동의</td>
                                </tr>
                            <tr>
                                <td class="agree_contents">
                                    수집항목 : 아동 일반사항(성명, 생년월일, 휴대전화, 주소 등) 보호자(성명, 전화번호)
                                    <br>
                                    수집·이용 목적 : 돌봄이음 서비스 이용 신청에 따른 본인 확인 및 이용 관리
                                    <br>
                                    보유기간 : 서비스 이용 종결시까지
                                </td>
                            </tr>
                            <tr>
                                <td class="agree_title">2. 민감정보 처리 동의</td>
                            </tr>
                            <tr>
                                <td class="agree_contents">
                                    수집항목 : 건강(병원 및 알레르기 정보) 사진 및 영상(시설 내외부 CCTV 상시녹화) 
                                    <br>
                                    수집·이용 목적 : 회원가입 및 이용관리, 개인영상정보
                                    <br>
                                    보유기간 : 서비스 이용 종결시까지, 개인영상정보 2개월간 보관 후 삭제 
                                </td>
                            </tr>
                            <tr>
                                <td class="agree_title">3. 개인정보 제3자 제공 동의</td>
                            </tr>       
                            <tr>
                                <td class="agree_contents">
                                    수집항목 : 아동 일반사항(성명, 생년월일, 휴대전화, 주소, 학교 등) 보호자(성명, 전화번호)
                                    <br>
                                    수집·이용 목적 : 돌봄서비스 제공에 따른 행정기관, 기타 돌봄서비스 제공 유관기관 등
                                    <br>
                                    보유기간 : 서비스 이용 종결시까지 
                                </td>
                            </tr>
                            <tr>
                                <td class="agree_title">4. 법정대리인의 개인정보 수집·이용·제공 동의</td>
                            </tr>
                            <tr>
                                <td class="agree_contents">수집항목: 정보주체가 만14세 미만의 아동인 경우 법정대리인이 신청서에 작성한 내용과 같이 개인정보를 수집·이용·제공</td>
                            </tr>
                            </tbody>
                        </table>
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th scope="col">
                                    <div class="subtitle">
                                        <label for="chk2">
                                            <input type="checkbox" id="chk2" name="agree">
                                            <i class="circle"></i>
                                            <span class="check_text left">초상권 사용 동의 (선택)</span>
                                        </label>
                                    </div>
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                            <td hidden></td>
                            </tr>
                            <tr>
                                <td class="agree_contents">
                                    개인정보 보호 정책으로 홈페이지, 소식지 등 다양한 홍보매체 및 언론매체를 통해 정보를 공유함에 따라 공간 운영시 촬영된 대상자 사진 및 영상과 관련하여 초상권에 대한 동의를 받고자 합니다.
                                    <br>
                                    사용 목적: 돌봄이음 사업 홍보매체 및 인쇄물(브로셔, 소식지, 홈페이지 게시물 등), 언론매체(신문, 잡지 기사 등) 등 사업 홍보
                                    <br>
                                    사용 형태: 돌봄이음 사업 서비스 참여시 촬영된 사진 및 동영상 자료
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="agree_all">
                        <label for="chk">
                            <input type="checkbox" id="chk" name="agree" onclick="selectAll(this)">
                            <i class="circle"></i>
                            <span class="check_text">전체동의</span>
                        </label>
                    </div>
                    <div class="selectBox">
                        <button class="selectButton" type="submit">
                            <p>신청하기</p>
                        </button>
                    </div>
                    </form>
            </div>
        </main>
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
    </div>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/accept.js"></script>
</body>
</html>