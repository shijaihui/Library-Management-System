$("input").focus(function() {
    $(this).parent("span").addClass("active");
});
$("input").blur(function() {
    if ($(this).val() == "") {
        $(this).parent("span").removeClass("active");
    }
})