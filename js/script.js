/* klikom na hamburger menu (na malim zaslonima) se spušta navigacija (jQuery)*/
/* kad se klikne na element koji ima tag #menuIcon a to je hamburger menu,.... */
$("#menuIcon").click(function() {
    /* ...div se spusti dolje za 60px i to s animacijom... */
    $("div").animate({down: '60px'});
    /* ...svi elementi list se pokažu ili sakriju */
    $("#list-nav").slideToggle("slow", function() {
    });
});


/* !!! prikaz passworda !!! */
function eyeOfTheTiger() {
    /* idPass je input za password, x je vrsta typea (password ili text) */
    var idPass = document.getElementById('id-password');
    var x = idPass.getAttribute("type");
    /* ikonica oko */
    var ikonica = document.getElementById("ikonica");
    /* ako je input type za password postavljen na password,
    promjeni ga u input type text, i promjeni ikonicu u prekriženo oko,
    a ako nije password (nego text), vrati u prvo stanje */
    if (x == "password") {
        idPass.setAttribute("type", "text");
        ikonica.className = "fa fa-eye-slash fa-lg";
    }
    else{
        idPass.setAttribute("type", "password");
        ikonica.className = "fa fa-eye fa-lg";
    }
}
