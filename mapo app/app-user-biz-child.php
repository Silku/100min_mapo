<?php
//세션 체크 기능 모든 페이지에 추가 필요
header("Pragma:no-cache");
header("Cache-Control:no-cache,must-revalidate");
include '../src/method_config.php';
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>돌봄이음</title>
    <link rel="stylesheet" href="css/static-style.css">
    <link rel="stylesheet" href="css/app-user-biz-detail.css">
    <link rel="stylesheet" href="css/app-user-footer.css">
</head>
<body>
    <main>
        <div class="title_area">
            <h3>마포형 커뮤니티케어 일자리플랫폼</h3>
            <h1>돌봄이음</h1>
        </div>
        <header>
            <button class="returnButton_cont" type ="button" onclick="window.history.back()">
                <div class="returnButton_icon" >
                    <svg width="13" height="21" viewBox="0 0 13 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M0.778809 10.8916C0.778809 11.2847 0.924805 11.6216 1.23926 11.9136L9.97656 20.4712C10.2236 20.7183 10.5381 20.853 10.9087 20.853C11.6499 20.853 12.2451 20.269 12.2451 19.5166C12.2451 19.146 12.0879 18.8203 11.8408 18.562L3.96826 10.8916L11.8408 3.22119C12.0879 2.96289 12.2451 2.62598 12.2451 2.2666C12.2451 1.51416 11.6499 0.930176 10.9087 0.930176C10.5381 0.930176 10.2236 1.06494 9.97656 1.31201L1.23926 9.8584C0.924805 10.1616 0.778809 10.4985 0.778809 10.8916Z" fill="black"/>
                    </svg>
                </div>
                <p>돌아가기</p>    
            </button>
        </header>
        <div class="biz_childcare_container">
            <div class="title">
                <p>아동돌봄</p>
            </div>
            <div class="info">
                <span>돌봄공백이 있는 초등학생을 대상으로 마포구 내 거점공간을 통해 
                    아이들의 학습지원과 돌봄 서비스를 전문적으로 제공합니다. 
                </span>
                <p>이용대상</p>
                <hr class="pretty_line" contenteditable="false">
                <span>돌봄이 필요한 초등학생이면 누구나 이용가능합니다.</span>
                <p>이용방법</p>
                <hr class="pretty_line" contenteditable="false">
                <span>APP 또는 전화로 돌봄신청 후 이용가능합니다. 
                    돌봄신청은 이용일 전날까지 가능하며, 
                    당일 이용은 전화로 문의해주세요. 
                </span>
                <p>돌봄서비스 제공과정</p>
                <hr class="pretty_line" contenteditable="false">
                    <div class="image_info">
                        <img src="image/child_care_info.PNG">
                    </div>
                <p>돌봄서비스 구성</p>
                <hr class="pretty_line" contenteditable="false">
                    <div class="image_info2">
                        <img src="image/child_care_info2_1.png" alt="돌봄서비스" onclick="window.open('about:blank').location.href='app-user-blog?url=https://m.blog.naver.com/mapojaram/222685262049'">
                        <img src="image/child_care_info2_2.png" alt="학습지도" onclick="window.open('about:blank').location.href='app-user-blog?url=https://m.blog.naver.com/mapojaram/222685262697'">
                        <img src="image/child_care_info2_3.png" alt="특화프로그램" onclick="window.open('about:blank').location.href='app-user-blog?url=https://m.blog.naver.com/mapojaram/222685263256'">
                    </div>
                <p>이용요금</p>
                <hr class="pretty_line" contenteditable="false">
                <span>돌봄은 시간당 1,500원이며, 간식은 1회 3,000원 입니다.</span>
                <p>공간안내</p>
                <hr class="pretty_line" contenteditable="false">
                <ul class="footer">
                    <li>
                        <p>마포자람</p>
                        <ul class="list">
                            <li>마포구 월드컵북로 353-3 1층 (상암초 정문 옆)</li>
                            <li>Tel. 070-7730-0771</li>
                            <li>E-mail. mapojaram@naver.com</li>
                            <li>운영시간. 월~금 09:00~19:30 (주말 및 공휴일 휴무)</li>
                        </ul>
                    </li>
                </ul>
                <!-- <span>마포자람 ㅣ  마포구 월드컵북로 353-3 1층 (상암초 정문 옆)
                    Tel .  070-7730-0771
                    E-mail .  mapojaram@naver.com
                    운영시간 .  월~금 09:00~19:30 (주말 및 공휴일 휴무)
                </span> -->
            </div>
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
</body>
</html>