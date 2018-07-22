$(document).ready(function () {

    $("button.offcanvas").click(function (e) {
        $("body").toggleClass("hide");
        e.preventDefault();
        return false;
    });

    $(".offside").click(function (e) {
        $("body").toggleClass("hide");
        //e.preventDefault();
        //return false;
    });

    //$("#bgndVideo").YTPlayer();

    (()=>{
        let x = c.getContext("2d"),
            w = c.width = window.innerWidth,
            h = c.height = window.innerHeight,
            maxr = Math.max(w,h)*2,
            random = n=>Math.random()*n,
            stars = new Array(5000).fill().map(()=>{
                return {r: random(maxr), s: 0.001, a: random(Math.PI*2), c:0xFFFFFF, z:1};
            });

        function loop(){
            x.fillStyle = "rgba(0,0,100,1)";
            x.fillRect(0,0,w*2,h*2);
            stars.forEach(e=>{
                e.a+=e.s;
                x.beginPath();
                x.arc(Math.cos(e.a)*e.r + w/3, Math.sin(e.a)*e.r + h/2, 1,0,Math.PI*2);
                x.closePath();
                x.fillStyle = "white";
                x.fill();
            })

            //requestAnimationFrame(loop);
        }
        requestAnimationFrame(loop);
        window.addEventListener("resize", ()=>{
            w = c.width = window.innerWidth;
            h = c.height = window.innerHeight;
        })
    })();

});

