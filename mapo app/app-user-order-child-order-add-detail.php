<?php
//세션 체크 기능 모든 페이지에 추가 필요
header("Pragma:no-cache");
header("Cache-Control:no-cache,must-revalidate");
include '../src/method_config.php';
session_check_app();
$_SESSION[snack] = $_GET[snack];
$_SESSION[snack_info] = $_GET[snack_info];
$s = "select * from order_info where m_no = '{$_SESSION[m_no]}' order by o_no desc limit 1";
$sr = sqlresult($s)[0];
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
    <script src="js/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="css/static-style.css">
    <link rel="stylesheet" href="css/app-user-order-step.css">
    <link rel="stylesheet" href="css/app-user-footer.css">
    <script>
        let getCurrentPageIdx = sessionStorage.getItem("pageIdx")
        let setPrevPageIdx = sessionStorage.setItem("prevPageIdx",getCurrentPageIdx);
        let setCurrentPageIdx = sessionStorage.setItem("pageIdx",6);
        console.log(getCurrentPageIdx)
</script>
</head>

<body>
    <header>
        <div class="header_container">
            <div class="header_title" >
                <p>아동돌봄 신청하기</p>    
            </div>
        </div>
    </header>
    <main>
        <div class="boxContainer_order_add_detail">
            <div class="title">
                <h2>돌봄신청서 작성하기</h2>
                <p>* 돌봄신청서는 서비스 이용신청시 작성합니다.</p>
            </div>
            <form action="app-user-order-child-accept" method="GET">
                <div class="care_select_cont">
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-default">
                            아동과의 관계<small>*</small>
                        </span>
                        <input type="text" class="form-control" id="name" name="relation" autocomplete="off" value="<?=$sr[o_relation]?>" required>
                        <div class="check_font" id="name_check"></div>
                    </div>
                    <div class="input-group mb-3 align">
                        <span class="input-group-text" id="inputGroup-sizing-default">
                            건강상태<small>*</small>
                        </span>
                        <div class="form_row">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="health" id="health_good" value="양호" <?=($sr[o_health]=="양호")?"checked":""?> required>
                                <label class="form-check-label" for="health_good">
                                    양호
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="health" id="health_normal" value="보통" <?=($sr[o_health]=="보통")?"checked":""?> >
                                <label class="form-check-label" for="health_normal">
                                    보통
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="health" id="health_bad" value="허약" <?=($sr[health]=="허약")?"checked":""?> >
                                <label class="form-check-label" for="health_bad">
                                    허약
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="health" id ="health_etc" value="기타" <?=($sr[o_health]=="기타")?"checked":""?> >
                                <label class="form-check-label" for="health_etc">
                                    기타
                                </label>
                            </div>
                        </div>
                        <div class="input_box_etc health_text">
                            <input type=text name="health_etc_comment" autocomplete="off" placeholder="구체적으로 기재하실 사항을 입력해 주세요." value="<?=$sr[o_health_etc_comment]?>">
                        </div>
                    </div>
                    <div class="input-group mb-3 align">
                        <span class="input-group-text" id="inputGroup-sizing-default">
                            가정환경<small>*</small>
                        </span>
                        <div class="form_row">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="condition" id="condition_good" value="맞벌이 가정" <?=($sr[o_condition]=="맞벌이 가정")?"checked":""?> required>
                                <label class="form-check-label" for="condition_good">
                                    맞벌이 가정
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="condition" id="condition_normal" value="다자녀 가정" <?=($sr[o_condition]=="다자녀 가정")?"checked":""?> >
                                <label class="form-check-label" for="condition_normal">
                                    다자녀 가정
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="condition" id="condition_bad" value="한부모 가정" <?=($sr[o_condition]=="한부모 가정")?"checked":""?>>
                                <label class="form-check-label" for="condition_bad">
                                    한부모 가정
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="condition" id="condition_etc" value="기타" <?=($sr[o_condition]=="기타")?"checked":""?>>
                                <label class="form-check-label" for="condition_etc">
                                    기타
                                </label>
                            </div> 
                        </div>
                        <div class="input_box_etc condition_text">
                            <input name="condition_etc_comment" autocomplete="off" placeholder="구체적으로 기재하실 사항을 입력해 주세요." value="<?=$sr[o_condition_etc_comment]?>">
                        </div>
                    </div>
                    <div class="input-group mb-3 align">
                        <span class="input-group-text" id="inputGroup-sizing-default">
                            귀가방법<small>*</small>
                        </span>
                        <div class="form_row">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="back_home" id="back_home_good" value="부모동행" required <?=($sr[o_back_home]=="부모동행")?"checked":""?>>
                                <label class="form-check-label" for="back_home_good">
                                    부모동행
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="back_home" id="back_home_normal"  value="대리인동행" <?=($sr[o_back_home]=="대리인동행")?"checked":""?>>
                                <label class="form-check-label" for="back_home_normal">
                                    대리인동행
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="back_home" id="back_home_bad" value="자율귀가" <?=($sr[o_back_home]=="자율귀가")?"checked":""?>>
                                <label class="form-check-label" for="back_home_bad">
                                    자율귀가
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="back_home" id="back_home_etc" value="기타" <?=($sr[o_back_home]=="기타")?"checked":""?>>
                                <label class="form-check-label" for="back_home_etc">
                                    기타
                                </label>
                            </div> 
                        </div>
                        <div class="input_box_etc back_home_text">
                            <input name="back_home_etc_comment" autocomplete="off" placeholder="구체적으로 기재하실 사항을 입력해 주세요." value="<?=$sr[o_back_home_etc_comment]?>">
                        </div>
                    </div>
                    <div class="input-group mb-3 align">
                        <span class="input-group-text" id="inputGroup-sizing-default">
                            응급처치 <br>절차 동의<small>*</small>
                        </span>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="emergency" id="emergency_agree"  value="동의" required  <?=($sr[o_emergency]=="동의")?"checked":""?>>
                            <label class="form-check-label" for="emergency_agree">
                                동의
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="emergency" id="emergency_disagree"  value="미동의" <?=($sr[o_emergency]=="미동의")?"checked":""?>>
                            <label class="form-check-label" for="emergency_disagree">
                                미동의
                            </label>
                        </div>
                    </div>
                    <div class="emergency_info">
                        <p>1. 위급상황시 보호자의 연락처로 연락드립니다.</p>
                        <p>2. 필요한 경우 119 구조대에 연락하여 가까운 의료기관이나 보호자가 정하신 의료기관으로 응급 수송할 것입니다.</p>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-default">
                            (선택)참고사항
                        </span>
                        <textarea name="textarea" autocomplete="off" placeholder="특이사항 또는 요청사항이 있을 경우 입력해주세요.(최대 100자)" onKeyUp="javascript:fnChkByte(this,'100')"><?=$sr[o_textarea]?></textarea>
                    </div>
                </div>
                <div class="progress_cont">
                    <div class="progress">
                        <div class="progress-bar bg-warning" role="progressbar" style="width: 90%" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
                <div class="selectBox">
                    <button class="selectButton btn_div1" type="button" onclick="history.back()">
                        <p>이전</p>
                    </button>
                    <button class="selectButton btn_div2" type="submit">
                        <p>확인</p>
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
    <script src="js/app-user-order-child-order-step.js"></script>
    <script src="js/app-user-order-child-order-step1-add.js"></script>
    <script src="js/app-user-order-child-order-add-detail.js"></script>
    <script>
        $(document).ready(function(){
            $("input[name='health']:radio").change(function(){
                let status = this.value;
                console.log(status)
                if(status=='기타'){
                    $('.health_text').show()
                }else{
                    $('.health_text').hide()
                }
            })
            $("input[name='condition']:radio").change(function(){
                let status = this.value;
                console.log(status)
                if(status=='기타'){
                    $('.condition_text').show()
                }else{
                    $('.condition_text').hide()
                }
            })
            $("input[name='back_home']:radio").change(function(){
                let status = this.value;
                console.log(status)
                if(status=='기타'){
                    $('.back_home_text').show()
                }else{
                    $('.back_home_text').hide()
                }
            })
        })
        var reg_name = /^[가-힣]{2,6}$/;
        $("#name").blur(function() {
            if (reg_name.test($(this).val())) {
                    console.log(reg_name.test($(this).val()));
                    $("#name_check").text('');
            } else {
                $('#name_check').text('한글 2-6자 이내로 작성해주세요.');
                $('#name_check').css('color', 'red');
                $('#name').focus();
            }
        });

        // $('#health_etc').change(function(){
        //         if($('#health_etc').val()=='health_etc'){
        //             $('.input_box_etc').show();
        //         }
        // })


        // if($('#health_etc').prop('checked')){
        //             $('.input_box_etc').show()
        //         }else{
        //             alert('체크해재댐')
        //         }
    </script>
</body>
</html>