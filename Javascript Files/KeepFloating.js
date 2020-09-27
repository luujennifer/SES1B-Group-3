// Script for keeping floating labels
$(document).ready(function() {
    var $input = $("input");
    var $selector = $("select");
    $input.focusout(function() {
        var value = $.trim($(this).val());
        if (value) {
            $(this).next(".floating-label").addClass("input-focus-label");
        } else {
            $(this).next(".floating-label").removeClass("input-focus-label");
        }
    });
    $selector.focusout(function() {
        var value = $.trim($(this).val());
        if (value) {
            $(this).next(".floating-label").addClass("input-focus-label");
        } else {
            $(this).next(".floating-label").removeClass("input-focus-label");
        }
    });
});
