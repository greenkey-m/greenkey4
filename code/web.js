
$(document).ready(function () {

    $("button.offcanvas").click(function (e) {
        $(".offside").toggleClass("open");
        e.preventDefault();
        return false;
    });

    $(".offside").click(function (e) {
        $(".offside").toggleClass("open");
        //e.preventDefault();
        //return false;
    });


});

