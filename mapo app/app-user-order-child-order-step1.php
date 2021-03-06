<?php
//세션 체크 기능 모든 페이지에 추가 필요
header("Pragma:no-cache");
header("Cache-Control:no-cache,must-revalidate");
include '../src/method_config.php';
session_check_app();
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
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/static-style.css">
    <link rel="stylesheet" href="css/app-user-order-step.css">
    <link rel="stylesheet" href="css/app-user-footer.css">
    <script src="js/jquery-3.6.0.min.js"></script>

<body>
    <header>
        <div class="header_container">
            <div class="header_title" >
                <p>아동돌봄 신청하기</p>    
            </div>
        </div>
    </header>
    <main>
        <div class="boxContainer_order_step1">
            <div class="title">
                <h2>아동을 선택해주세요.</h2>
                <p>아동정보는 최대 3명까지 추가할 수 있습니다.</p>
            </div>
            <form name="child_select" action="app-user-order-child-order-step2" method="GET" onsubmit="return check()">
                <!-- <input type='hidden' value=""> -->
                <div class="care_select_cont">
                </div>
                    <div id="add_child" class="add_child" onclick="location.href='app-user-order-child-order-step1-add'">
                        + 아이 추가하기
                    </div>
                <input type="hidden" id="selected_child" name ="selected_child" value="">
                <div class="progress_cont">
                    <div class="progress">
                        <div class="progress-bar bg-warning" role="progressbar" style="width: 15%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100">                    </div>
                    </div>
                </div>
                <div class="selectBox">
                    <!-- <button class="selectButton btn_div1" type="button" onclick="location.href='app-user-order-child-order-step1'"> -->
                    <button class="selectButton btn_div1" type="button" onclick="location.href='app-user-order'">
                        <p>이전</p>
                    </button>
                    <!-- <button class="selectButton btn_div2" type="button" onclick="location.href='app-user-order-child-order-step2' , check()"> -->
                    <button id="submitBtn"class="selectButton btn_div2" type="submit">
                        <p>다음</p>
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
    <script>
        // console.log(dataList[0].name)
        // console.log(Object.keys(dataList[1]))
        // console.log(Object.values(dataList[0]))

        var addBtn = document.querySelector("#add_child");
        // addBtn.onclick = () => {
        //     showList()
        // }


        // var dataList = [
        //     {
        //         "no" : 1,
        //         "name" : "이소윤",
        //         "birth" : "2016.1.1",
        //         "sex" : "여자"
        //     },
        //     {
        //         "no" : 2,
        //         "name" : "아동",
        //         "birth" : "2015.1.1",
        //         "sex" : "남자"
        //     },
        //     {
        //         "no" : 3,
        //         "name" : "어르신",
        //         "birth" : "2014.1.1",
        //         "sex" : "남자"
        //     }
        // ]
        
        // -- DATA init 
        ;(function(){
            showList();
        })()
        function showList() {
                var dataList;
                var request = $.ajax({
                type: "POST",
                url: "/api/app_child",
                async:false,
                datatype : "json",
                data: { method : 'get', m_no : '<?=$_SESSION[m_no]?>' },
                success : function(data) {
                        // console.log(data)
                        if(data == null || data == 0 || data == ""){
                            console.log('error : noData')
                        }else{
                            dataList = JSON.parse(data);
                            dataWrite()
                        }
                }
            });
            function dataWrite(){
                let list = "<div class='care_select_cont'>";
                for(let i = 0; i < dataList.length ; i ++){
                    list += 
                    "<ul class='care_selectBtn'>"+
                        "<input type='hidden' id='select_"+dataList[i].no+"' name='select_"+dataList[i].no+"' value='' disabled>" +
                        "<div class='row'>" +
                            "<li class='text_row'>" +
                                "<span class='textBold'>"+
                                    dataList[i].name + 
                                "</span>" +
                            "</li>" +
                            "<li class='text_row'>" +
                                "<span>"+ dataList[i].birth + " / " +  dataList[i].sex+ "</span>" +
                        "</div>" +
                        "<div class='icon_area'>" + 
                            "<i class='far fa-trash-alt'></i>"+
                        "</div>"+
                    "</ul>";
                }
                list +="</div>";

                document.querySelector('.care_select_cont').innerHTML += list;  // list 내용 표시

                if(dataList.length > 2){
                    addBtn.style.display = 'none';
                };
            }
        };

        // -- 현재 선택한 아동에 대한것
        let selected_child = document.querySelector('#selected_child');
        let selected_child_list = []
        let submitBtn = document.querySelector('#submitBtn')
        // selected_child_list.push('a')
        // selected_child_list.forEach(el => console.log(el))
        function check(){
            let check = selected_child.value
            // console.log(check.outerText)
            // console.log(check)
            var dataList;
                var request = $.ajax({
                type: "POST",
                url: "/api/app_child",
                async:false,
                datatype : "json",
                data: { method : 'get', m_no : '<?=$_SESSION[m_no]?>' },
                success : function(data) {
                    if(data == null || data == 0 || data == ""){
                            console.log('error : noData')
                    }else{
                        dataList = JSON.parse(data);
                    }
                }
            });
            if(dataList == "" || dataList == null ){
                alert('아동을 추가해 주세요.')
                return false;
            }else if(dataList != false){
                if(check == "" || false){
                    alert('최소 한명의 아동을 선택해 주세요.')
                    return false;
                }else{
                    // location.href='app-user-order-child-order-step2'
                    const html = '<input type="hidden" value="'+selected_child.value+'" name="child" />';
                    $('#child_select').append(html);
                    submitBtn.submit;
                }
            }
        }
        
        let select_child_list = [];
        let care_selectBtn = document.querySelectorAll('.care_selectBtn');
        // querySelectAll은 배열(nodeList)을 리턴함, 개인적으로 선택하려면 forEach를 사용해야함.
        
        for(let i = 0; i <care_selectBtn.length; i++){
            select_child_list.push(care_selectBtn[i])
            // console.log(child_select_list)
            care_selectBtn[i].addEventListener('click', add_list)
        }

        // -- 아동 선택하기
        function add_list(){ 

            let select_this = document.getElementById('#select_this');
            // console.log(this.children[0])
            // console.log(this.children[0].value)
            
            let check = this.children[0].value
            // console.log(this.children[0].value)
            // console.log(selected_child.value)
            if(check == ""){
                this.children[0].setAttribute("value", "check")
                this.classList.add('on')
                
                // console.log(this.firstChild.id)
                let temp = selected_child_list.push(this.firstChild.id)
                // console.log(temp)
                // console.log(selected_child.value)
            }else{
                this.children[0].setAttribute("value", "")
                this.classList.remove('on')
                // console.log(this.firstChild.id)
                let temp = selected_child_list.splice(selected_child_list.indexOf(this.firstChild.id),1)
                // console.log(temp)
            }
            selected_child.setAttribute("value", selected_child_list)

            // let temp2 = this.classList.contains('on')
            // console.log(temp2)
            // if(check="check" && temp2 == true)
        }
        // -----------------

        // -- 아동 삭제하기
        let deleteBtn = document.querySelectorAll('.fa-trash-alt');
        deleteBtn.forEach(list => {
            list.addEventListener("click", remove);
        })
        function remove(){
            let btn = this.parentNode.parentNode
            // selected_child.value
            btn.children[0].setAttribute("value", "removed")
            btn.style.display = 'none'
            selected_child_list.splice(selected_child_list.indexOf(btn.firstChild.id),1)
            selected_child.setAttribute("value", selected_child_list)
            console.log(this.parentNode.parentNode.firstChild.id)
            var remove = $.ajax({
                type: "POST",
                url: "/api/app_child",
                async:false,
                datatype : "json",
                data: { method : 'remove', mc_no : this.parentNode.parentNode.firstChild.id },
                success : function(data) {
                    alert(data);

                    var request =  $.ajax({
                        type: "POST",
                        url: "/api/app_child",
                        async:false,
                        datatype : "json",
                        data: { method : 'get', m_no : '<?=$_SESSION[m_no]?>'},
                        success : function(data) {
                            if(data == null || data == 0 || data == ""){
                                console.log('Removed : noData!')
                            }else{
                                dataList = JSON.parse(data);
                                console.log(dataList + "삭제값 확인")
                            }
                            if(dataList.length > 0 || dataList.length < 3){
                                addBtn.style.display = 'block';
                            }
                        }
                    })
                },  
                error : function(){
                    console.log("ajax Error!")
                }
            });
        }


        // function select(temp){
        //     document.getElementById('selected_child').value = temp;
        //     console.log(temp)
        // }
    </script>
</body>
</html>