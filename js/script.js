$("#menuIcon").click(function() {

    $("div").animate({down: '60px'});
    $("#list-nav").slideToggle("slow", function() {
    });
});



/* prikaz passworda!!! */

function eyeOfTheTiger() {
    /* idPass je input za password, x je vrsta typea (password ili text) */
    var idPass = document.getElementById('id-password');
    var x = idPass.getAttribute("type");
    /* ikonica oko */
    var ikonica = document.getElementById("ikonica");
    var y = ikonica.className;


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
