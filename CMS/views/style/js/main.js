$(document).ready(function() {
    $("#showOptional").click(function() {
        $("#pageOptions").fadeToggle("slow");   
        return false;
    });

    $("#addCategory").click(function() {
       var allSelects = $('select[id^="category"]').size();
       $("#category0").clone().attr("id", "category" + allSelects).attr("name", "category" + allSelects).
           insertAfter("#category" + (allSelects - 1)).before('<br />');
        return false;
    });
});