<?php
//세션 체크 기능 모든 페이지에 추가 필요
header("Pragma:no-cache");
header("Cache-Control:no-cache,must-revalidate");
include '../src/method_config.php';
session_check_app();
$child = explode(',', str_replace("select_","",$_GET[selected_child]));
$_SESSION[select_child] = $child;
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
    <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>
    <link rel="stylesheet" href="css/static-style.css">
    <link rel="stylesheet" href="css/app-user-order-step.css">
    <link rel="stylesheet" href="css/app-user-footer.css">
    <script src="js/jquery-3.6.0.min.js"></script>
</head>
<body>
    <header>
        <div class="header_container">
            <div class="header_title">
                <p>아동돌봄 신청하기</p>    
            </div>
        </div>
    </header>
    <main>
        <div class="boxContainer_order_step2">
            <div class="title">
                <h2>돌봄 유형을 선택해 주세요.</h2>
            </div>
            <form action="" method="GET" name="select_time" onsubmit="return check()">
                <div class="care_select_cont">
                    <div class="care_selectBtn" onclick="select('정기')">
                        <div class="sub_title">
                            <p>정기 돌봄</p>
                        </div>
                        <p>2개월 이상 매달 정해진 요일에 꾸준한 돌봄이 필요한 경우 선택해 주세요.</p>
                        <!-- <span>
                            정기돌봄은 공간전체 운영시간 동안<br> 돌봄서비스를 이용합니다. 
                        </span> -->
                    </div>
                        <div class="care_selectBtn" onclick="select('시간제')">
                            <div class="sub_title">
                                <p>시간제 돌봄</p>
                            </div>
                            <p>단기로 정해진 날에 돌봄이 필요한 경우 선택해 주세요.</p>
                            <!-- <span>
                                시간제 돌봄은 공간 운영시간 중 원하는 시간대에 <br>돌봄 서비스를 이용합니다. 
                            </span> -->
    
                            <!-- <p>운영시간 : </p>
                            <p>   - 학기중 : 12:30 - 19:30</p>
                            <p>   - 방학중 : 12:30 - 19:30</p>
                            <p> 이용료 : 시간당 1,500원</p> --> 
                        </div>
                        <!-- <div class="care_footer_text">
                            <span>매달 정해진 요일에 선생님이 돌봐주세요.</span><br>
                            <span>정기돌봄은 공간전체 운영시간 동안 돌봄서비스를 이용합니다. </span>
                        </div> -->

                        <!-- <div class="care_footer_text">
                            <span> 이용료 : 시간당 1,500원</span><br>
                            <span>단기로 정해진 날에 선생님이 돌봐주세요.</span><br>
                            <span>시간제 돌봄은 공간 운영시간 중 원하는 시간대에 돌봄 서비스를 이용합니다. </span>
                        </div> -->
                        <input type="hidden" id="care_type" name ="care_type" value="">
                </div>
                <div class="progress_cont">
                    <div class="progress">
                        <div class="progress-bar bg-warning" role="progressbar" style="width: 30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
                <div class="selectBox">
                    <button class="selectButton btn_div1" type="button" onclick="location.href='app-user-order-child-order-step1'">
                        <p>이전</p>
                    </button>
                    <button id= submitBtn class="selectButton btn_div2" type="submit">
                        <p>다음</p>
                    </button>
                </div>
                <div class="selectBox">
                    <!-- <button class="selectButton btn_div2" type="button" onclick="location.href='app-user-order-child-order-step3-1'">
                        <p>정기돌봄 버튼(추후삭제)</p>
                        <input type="hidden" value="">
                    </button> -->
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
    <script src="js/app-user-order-child-order-step.js"></script>
    <script>
        function select(temp){
            care_type_val = temp;
            console.log(temp)
            $('#care_type').val(temp);
        }

        
        let care_type_val = document.getElementById('care_type').value;
        let submitBtn = document.querySelector('#submitBtn');

        function check(){
            // console.log(check.outerText)
            if(care_type_val == "" || false){
                alert('돌봄유형을 선택해주세요.')
                return false
            }else{
                if(care_type_val == "정기"){
                    $("form").attr("action", "app-user-order-child-order-step3-3")  
                    // ocation.href = 'app-user-order-child-order-step3-3'
                }else if(care_type_val == "시간제"){
                    $("form").attr("action", "app-user-order-child-order-step3-2")  
                    // location.href = 'app-user-order-child-order-step3-2'
                }
                // location.href='app-user-order-child-order-step2'
                return true
                // submitBtn.submit;
            }
        }

    // function select(temp){
    //     document.getElementById('care_type').value = temp;
    //     console.log(temp)
    // }

    </script>
</body>
</html>