import select2 from "select2";

$(function () {
    $('.js-attachSelect2').select2({
        width: '100%',
    });
    $('.js-attachSelect2-tag').select2({
        width: '100%',
        tags: true
    });
});
