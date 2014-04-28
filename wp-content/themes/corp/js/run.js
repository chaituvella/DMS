window.jQuery = window.$ = jQuery;

$(document).ready(function() {
    var comment_heading = $("#respond #reply-title").html();
    $("#respond #reply-title").wrap("<div class='bg_title'></div>");
    $("#respond #reply-title").parent().html("<h4 id='reply-title'>"+comment_heading+"</h4>");
    $(".mc_signup_submit .button").addClass("mc_submit");
});