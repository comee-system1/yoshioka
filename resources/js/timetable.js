import { post } from "jquery";
import select2 from "select2";

let place_master_id;
let timetable_id;
let timetable_enabled;
$(function () {

    $("a.placebutton").on("click",function(){
        $(".placebutton").removeClass("active");
        $(this).addClass("active");
        let _id = $(this).attr("id").split("-");
        place_master_id = _id[1];
        $("#place").val(place_master_id)
        return false;
    });

    $(".timetable_enable").on("click",function(){
        $(".timetable_enable").removeClass("active");
        timetable_enabled = $(this).attr("id").split("-")[1];
        $(this).addClass("active");
        $("#enabled").val(timetable_enabled);
        return false;
    });

    $("#setting_save").on("click",function(){
        let place;
        $(".placebutton").each(function(k, val){
            if($(this).hasClass('active')){
                place = $(this).text();
            }
        });
        if(confirm($("#date").val()+"\n"+place+"\nのデータが更新されます。")){
            return true;
        }else{
            return false;
        }
    });

    $('.js-attachSelect2-tag').select2({
        width: '100%',
        tags: true,
    }).on('change',function(){
        var key = $(this).attr("id").split("-")[1];
        var endai_id = $(this).val();
        var seminer_id = $("#seminer_id").val();
        $("#links-"+key).html("");

        $.ajaxSetup( {
            headers: {
                'X-CSRF-TOKEN': $( 'meta[name="csrf-token"]' ).attr( 'content' )
            }
        } );
        $.ajax( {
            type: "get",
            url: "/admin/time/endai/"+seminer_id+"/"+endai_id, //リクエストURL
        } )
        .done(function(data) {
            $("#endai_name-"+key).val(data['note']);
            var div = "";
            if(data[ 'file1' ]){
                div += "<div class='mt-1'><a href='/storage/file/"+data['file1']+"' class='w-100 btn btn-sm btn-outline-primary'>"+data['file1_name']+"</a></div>";
            }
            if(data[ 'file2' ]){
                div += "<div class='mt-1'><a href='/storage/file/"+data['file2']+"' class='w-100 btn btn-sm btn-outline-primary'>"+data['file2_name']+"</a></div>";
            }
            if(data[ 'file3' ]){
                div += "<div class='mt-1'><a href='/storage/file/"+data['file3']+"' class='w-100 btn btn-sm btn-outline-primary'>"+data['file3_name']+"</a></div>";
            }
            $("#links-"+key).html(div);
        })
        .fail(function() {
            alert("error");
        });
        return false;
    });

    $("#setting_program").on("click",function(){
        if(confirm("入力内容の更新を行います。\n入力中の内容は、画面右下部の「プログラム保存」ボタンを押してから更新を行ってください。")){
            var date = $("select[name='date']").val();
            var seminer_id = $("#seminer_id").val();
            var place_master_id = $("#place").val();
            if(!place_master_id){
                alert("設定会場を選択してください。");
                return false;
            }
            location.href = "./"+seminer_id+"?date="+date+"&place="+place_master_id;
            return false;
        }
        return false;
    });

});

