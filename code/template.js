import 'bootstrap';
import $ from 'jquery';
// Uncomment this, if you prefer compile CSS into js bundle
//import '../scss/template.scss';

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

