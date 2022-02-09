import { post } from "jquery";
import select2 from "select2";

let place_master_id = 1;
let timetable_id;
let timetable_enabled;
$(function () {
    $("#placebutton-1").addClass("active");
    $("a.placebutton").on("click",function(){
        $(".placebutton").removeClass("active");
        $(this).addClass("active");
        let _id = $(this).attr("id").split("-");
        place_master_id = _id[1];
        $(this).timetable();
        return false;
    });


    $('.js-attachSelect2-tag').select2({
        width: '100%',
        tags: true
    });

    $(".timetable_enable").on("click",function(){
        $(".timetable_enable").removeClass("active");
        timetable_enabled = $(this).attr("id").split("-")[1];
        $(this).addClass("active");
    });

    $("#program_setting").on("click",function(){
        $(this).timetable();
    });

    $("select[name=date]").on("change",function(){
        $(this).timetable();
    });

    $(this).timetable();

    $("#setting_program").on("click",function(){
        var chk = [];
        $(".timetable_key").each(function(k,v){
            var key = $(this).attr("id").split("-")[1];
            chk[key] = $("#check-"+key).prop("checked");

        });
        $("#showloading").show();
        let postData = {
            "timetable_id":timetable_id,
            "weburl":$("[name='weburl']").val(),
            "timetable_enabled":timetable_enabled,
            "enabled":chk
        };
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: "post",
            url:'/admin/setTimeTable',
            data:postData,
        })
        .done((res)=>{
            console.log(res);
            alert("データの更新を行いました。");
            $("#showloading").hide();
        })
        .fail((error)=>{
            console.log(error.statusText)
        })
    });

});
$.fn.timetable = function(){
    $("#showloading").show();
    var date = $("select[name='date']").val();
    let postData = {
        "seminer_id":$("#seminer_id").val(),
        "place_master_id":place_master_id,
        "date":date,
    };
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: "post",
        url:'/admin/getTimeTable',
        data:postData,
        dataType: 'json'
    })
    //通信が成功したとき
    .done((res)=>{
        $("#showloading").hide();
        $("[name='weburl']").val(res['weburl']);
        $(".timetable_enable").removeClass("active");
        timetable_enabled = res[ 'enabled' ];
        $("#timetable_enable-"+res[ 'enabled' ]).addClass("active");
        $('select option.addoption').remove();
        $.each(res['programs'], function(index, value){
            $("#check-"+index).prop('checked', value[ 'enabled' ]);
            $("#start_time-"+index).val(value[ 'start_time' ]);
            $("#end_time-"+index).val(value[ 'end_time' ]);
            $("#endai_name-"+index).val(value[ 'endai_name' ]);
            if(value[ 'account_name' ]){
                $('#selectpos-'+index).append($('<option class="addoption">').html(value[ 'account_name' ]).val(value[ 'account_name' ]));
                $('#selectpos-'+index).val(value[ 'account_name' ]).trigger("change");
            }
            if(value[ 'account_id' ]){
                $('#selectpos-'+index).val(value[ 'account_id' ]).trigger("change");
            }
        });
        timetable_id = res[ 'id' ];
    })
    //通信が失敗したとき
    .fail((error)=>{
        alert("error");
        console.log(error.statusText)
    })



};
