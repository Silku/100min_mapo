$.datepicker.setDefaults({
    dateFormat: 'yy-mm-dd',
    prevText: '이전 달',
    nextText: '다음 달',
    monthNames: ['1월', '2월', '3월', '4월', '5월', '6월', '7월', '8월', '9월', '10월', '11월', '12월'],
    monthNamesShort: ['1월', '2월', '3월', '4월', '5월', '6월', '7월', '8월', '9월', '10월', '11월', '12월'],
    dayNames: ['일', '월', '화', '수', '목', '금', '토'],
    dayNamesShort: ['일', '월', '화', '수', '목', '금', '토'],
    dayNamesMin: ['일', '월', '화', '수', '목', '금', '토'],
    showMonthAfterYear: true,
    yearSuffix: '년'
});
$( function() { $( "#datepicker1").datepicker(); } ); 


$( function() { $( "#datepicker2").datepicker(); } ); 
// alert("테스트")



// https://kimsg.tistory.com/290




//timepicker
function fn_timePicker(obj) {
    var id = $(obj).attr("id");
    $("#" + id ).timepicker({
        timeFormat : "HH:mm ",
        interval : 30,
        minTime:'9',
        maxTime:'19:30',
        defaultTime:'13:00',
        dynamic : false,
        dropdown : true
        // scrollbar : true
    });
    $("#" + id).timepicker("open");
}