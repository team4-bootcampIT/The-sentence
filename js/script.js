$("#menuIcon").click(function() {

    $("div").animate({down: '60px'});
    $("#list-nav").slideToggle("slow", function() {
    });
});