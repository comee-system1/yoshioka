$(function () {
    // $("#registbutton").on("click", function () {
    //     if (confirm("上記内容で登録を行います。よろしいですか？")) {
    //         return true;
    //     } else {
    //         return false;
    //     }
    // });
    $("#back_button").on("click", function() {
        history.back();
    });
    $('.label').on("click",function(){
        var _id = $(this).attr("id").split("-")[2];
        if( $("#check-id-"+_id).prop("checked"))
        {
            $("#check-id-"+_id).prop("checked", false);
            $(this).addClass("opacity-25");
        }else{
            $("#check-id-"+_id).prop("checked", true);
            $(this).removeClass("opacity-25");
        }
    });
});
