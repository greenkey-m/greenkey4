var level = 1;

$(document).ready(function () {

    $("button.offcanvas").click(function (e) {
        if (level > 1) {
            e.preventDefault();
            e.stopPropagation();
            $(".offside .nav-child.opened").removeClass("opened");
            $(".offside").toggleClass("inmenu");
            level--;
        } else {
            $("body").toggleClass("hide");
            e.stopPropagation();
            return false;
        }
    });

    $(".offside").click(function (e) {
        if (level > 1) {
            e.preventDefault();
            e.stopPropagation();
            $(".offside .nav-child.opened").removeClass("opened");
            $(".offside").toggleClass("inmenu");
            level--;
        } else {
            $("body").toggleClass("hide");
            e.stopPropagation();
            return false;
        }
    });

    $(".nav.menu > li.parent > *").click(function (e) {
        e.preventDefault();
        e.stopPropagation();
        $(this).siblings(".nav-child").toggleClass("opened");
        $(".offside").toggleClass("inmenu");
        level++;
    });

    $(".nav-child").click(function (e) {
        e.preventDefault();
        e.stopPropagation();
        $(this).removeClass("opened");
        $(".offside").removeClass("inmenu");
        level--;
    })

    //$("#bgndVideo").YTPlayer();

    (function create_sky () {
        let x = c.getContext("2d"),
            w = window.innerWidth,
            h = window.innerHeight,
            canv = Math.ceil(2*Math.sqrt(w**2 + h**2)),
            px = -canv,
            py = h - canv,
            maxr = Math.max(w,h)*2,
            random = n => Math.floor(Math.random()*n);

        $('#c').css("left", px);
        $('#c').css("top", py);
        $('#c').css("width", 2*canv);
        $('#c').css("height", 2*canv);
        c.width = 2*canv;
        c.height = 2*canv;

        let milky = new Image();
        milky.src = '/templates/greenkey4/images/space/milkyway.png';
        milky.onload = function() {
            x.drawImage(milky, canv - 300, canv-2000, 600, 2000);
            x.drawImage(milky, canv - 300, canv, 600, 2000);
        }

        x.fillStyle = "rgba(0,0,100,0)";
        x.fillRect(0,0,2*canv,2*canv);
        for (i=1;i<canv*50;i++) {
            x.beginPath();
            x.arc(random(2*canv), random(2*canv), 1+random(1), 0, 2 * Math.PI, false);
            x.fillStyle = "rgba("+(216+random(30))+","+(216+random(3))+","+(216+random(30))+","+Math.random()+")";
            x.fill();
        }

        window.addEventListener("resize", ()=>{
            create_sky();
        })
    })();

});

