var level = 1;

$(document).ready(function () {

    $(".offside ul.nav-child").prepend('<li class="back"><span>' + backword + '</span></li>');

    $(".offside button.offcanvas").click(function (e) {
        if (level > 1) {
            e.preventDefault();
            e.stopPropagation();
            $(".offside .nav-child.opened").removeClass("opened").removeClass("l1 l2 l3 l4");
            $(".offside").removeClass("level1 level2 level3 level4");
            $("ul.menu.nav").removeClass("inactive").removeClass("l1 l2 l3 l4");
            level = 1;
        } else {
            $("body").toggleClass("hide");
            e.stopPropagation();
            return false;
        }
    });

    $(".offside .cover").click(function (e) {
        if ($(".offside").hasClass("level2") || $(".offside").hasClass("level3") || $(".offside").hasClass("level2")) {
            e.preventDefault();
            e.stopPropagation();
            $(".offside .nav-child.opened").removeClass("opened").removeClass("l1 l2 l3 l4");
            $(".offside").removeClass("level1 level2 level3 level4");
            $("ul.menu.nav").removeClass("inactive").removeClass("l1 l2 l3 l4");
            level = 1;
        }
    });

    $(".nav.menu li.parent > span, .nav.menu li.parent > a").click(function (e) {
        e.preventDefault();
        e.stopPropagation();
        // Устанавливаем настоящее меню и все, которые выше - неактивными
        var overmenu = $(this).parents("ul");
        overmenu.map(function (i, val) {
            $(val).addClass("inactive").removeClass("l1 l2 l3 l4").addClass("l" + (i + 2));
        })
        // Делаем неактивным главное меню, устанавливая уровень
        $(".offside").removeClass("level1 level2 level3 level4").addClass("level" + (overmenu.length + 1));

        // Делаем активным следующее по уровню дочернее меню из данного пункта
        $(this).siblings("ul").removeClass("inactive").removeClass("l1 l2 l3 l4").addClass("opened");
        // Увеличиваем текущий уровень
        level++;
    });

    $("ul.nav-child").click(function (e) {
        e.preventDefault();
        e.stopPropagation();
        if ($(this).hasClass("inactive")) {
            // Если неактивен, то надо сделать его активным и переключиться на него
            $(".offside .nav-child.opened").removeClass("opened");
            $(this).removeClass("inactive").removeClass("l1 l2 l3 l4").addClass("opened");
            // Вычислить level, и соответственно расставить классы
            var overmenu = $(this).parents("ul");
            //alert(overmenu.length);
            level = overmenu.length + 1;
            overmenu.map(function (i, val) {
                $(val).addClass("inactive").removeClass("l1 l2 l3 l4").addClass("l" + (i + 1));
            });
            $(".offside").removeClass("level1 level2 level3 level4").addClass("level" + level);
        } else {
            // Если активен, то закрыть и перейти к предыдущему уровню
            $(this).removeClass("opened");
            level--;
            if (level == 1) {
                $(".offside").removeClass("level1 level2 level3 level4");
                $("ul.menu.nav").removeClass("inactive").removeClass("l1 l2 l3 l4");
            } else {
                //сделать пред уровень активным
                // в соответствии с level сдвинуть неактивные
                var overmenu = $(this).parents("ul");
                overmenu.map(function (i, val) {
                    if (i == 0) {
                        $(val).removeClass("inactive").removeClass("l1 l2 l3 l4");
                    } else {
                        $(val).addClass("inactive").removeClass("l1 l2 l3 l4").addClass("l" + (i + 1));
                    }
                });
                $(".offside").removeClass("level1 level2 level3 level4").addClass("level" + level);
            }

        }
    });




    var bwidth = $(window).width();
    var bheight = $(window).height();

    $(".fly_container").height(bheight - 2);

    var flies = $(".fly");
    flies.map(function (i, f) {
        //$(f).css({'transform': 'rotateX(' + (Math.random() * 30 - 15) + 'deg) rotateY(' + (Math.random() * 30 - 15) + 'deg) rotateZ(' + (Math.random() * 30 - 15) + 'deg)'});
        //$(f).css({'transform': 'rotateX(30deg) rotateZ(' + (Math.random() * 30 - 15) + 'deg)'});
        //$(f).css({'left': ((Math.random() * (bwidth - 700)) + 300) + 'px'});
        //$(f).css({'top': Math.random() * (bheight - 300) + 'px'});
    });

    //$("#bgndVideo").YTPlayer();

    /*(function create_sky() {
        let x = c.getContext("2d"),
            w = window.innerWidth,
            h = window.innerHeight,
            canv = Math.ceil(2 * Math.sqrt(w ** 2 + h ** 2)),
            px = -canv,
            py = h - canv,
            maxr = Math.max(w, h) * 2,
            random = n => Math.floor(Math.random() * n);

        $('#c').css("left", px);
        $('#c').css("top", py);
        $('#c').css("width", 2 * canv);
        $('#c').css("height", 2 * canv);
        c.width = 2 * canv;
        c.height = 2 * canv;

        let milky = new Image();
        milky.src = '/templates/greenkey4/images/space/milkyway.png';
        milky.onload = function () {
            x.drawImage(milky, canv - 300, canv - 2000, 600, 2000);
            x.drawImage(milky, canv - 300, canv, 600, 2000);
        }

        x.fillStyle = "rgba(0,0,100,0)";
        x.fillRect(0, 0, 2 * canv, 2 * canv);
        for (i = 1; i < canv * 50; i++) {
            x.beginPath();
            x.arc(random(2 * canv), random(2 * canv), 1 + random(1), 0, 2 * Math.PI, false);
            x.fillStyle = "rgba(" + (216 + random(30)) + "," + (216 + random(3)) + "," + (216 + random(30)) + "," + Math.random() + ")";
            x.fill();
        }

        window.addEventListener("resize", () => {
            create_sky();
        })
    })();*/
});

