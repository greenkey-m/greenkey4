var level = 1;

$(document).ready(function () {

    var popupCenter = function (url, title, w, h) {
        // Fixes dual-screen position                         Most browsers      Firefox
        var dualScreenLeft = window.screenLeft !== undefined ? window.screenLeft : screen.left;
        var dualScreenTop = window.screenTop !== undefined ? window.screenTop : screen.top;

        var width = window.innerWidth ? window.innerWidth : document.documentElement.clientWidth ? document.documentElement.clientWidth : screen.width;
        var height = window.innerHeight ? window.innerHeight : document.documentElement.clientHeight ? document.documentElement.clientHeight : screen.height;

        var left = ((width / 2) - (w / 2)) + dualScreenLeft;
        var top = ((height / 3) - (h / 3)) + dualScreenTop;

        var newWindow = window.open(url, title, 'scrollbars=yes, width=' + w + ', height=' + h + ', top=' + top + ', left=' + left);

        // Puts focus on the newWindow
        if (newWindow && newWindow.focus) {
            newWindow.focus();
        }
    };

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

    $("ul.nav-child > li > a").click(function (e) {
        e.preventDefault();
        e.stopPropagation();
        window.location = this.href;
    });


    $(".category_wall a.closeme").click(function () {
        $(this).parent().removeClass("normal");
    });
    $(".category_wall").mouseleave(function () {
        $(this).addClass("normal");
    });

    $(".hopen").hover(function () {
        $(this).addClass("show");
        $(this).children(".dropdown-menu").addClass("show");
        $(this).children("button").attr("aria-expanded", true);
    }, function () {
        $(this).removeClass("show");
        $(this).children(".dropdown-menu").removeClass("show");
        $(this).children("button").attr("aria-expanded", false);
    });

    $(".sharepopup").click(function (e) {
        e.preventDefault();
        var self = $(this);
        popupCenter(self.attr('href'), "test", 580, 470);
    })


    var wimg = $(".item-page .item-image img").parents(".maindata").width() - 30;
    $(".item-page .item-image img").css("width", wimg);

    var bwidth = $(window).width();
    var bheight = $(window).height();

    $(".fly_container").height(bheight - 32);

    //$("#bgndVideo").YTPlayer();

    $(window).resize(function () {
        $(".fly_container").height($(window).height() - 2);
    });

    // Вернуться к варианту jquery? и переписать анонимную функцию, т.к. она не доступна по имени вне себя
    window.addEventListener("resize", function () {
        //create_sky()
    });

});

