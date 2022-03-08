import select2 from "select2";

$(function () {
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

    $('.js-attachSelect2').select2({
        width: '100%',
    });

});
