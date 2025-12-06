function copy(n) {
    var t = document.createElement("input");
    (t.value = n || window.location.href), document.body.appendChild(t), t.select(), document.execCommand("Copy"), (t.className = "oInput"), (t.style.display = "none"), alert("复制成功,请去其它浏览器粘贴");
}

!(function() {
    $(".js-copy").click(copy);

    var o = $(".nav-c .item");

    function n(n) {
        if (isNaN(n) || n < 0) return !1;
        window.scrollTo({
            top: 0
            //   behavior: "smooth",
        });
        o.removeClass("active"), o.eq(n).addClass("active");
        window.sessionStorage.setItem("_i", String(n));
    }


    $("#swiper-banner .swiper-slide") &&
        new Swiper("#swiper-banner", {
            loop: !0,
            autoplay: !0,
            observer: !0,
            slidesPerView: "auto",
            pagination: {
                el: ".swiper-pagination"
            }
        });

    n(window.sessionStorage.getItem("_i"));

    let aIndex = o.index($(".nav-c .item.active"));

    c = new Swiper(".swiper-c", {
        autoHeight: !0,
        initialSlide: aIndex,
        on: {
            slideChange: function() {
                n(this.activeIndex);
            }
        }
    });

    o.on("click", function() {
        var t = o.index(this);
        n(t), c.slideTo(t);
    });

    $("#swiper-banner a").click(function() {
        let index = $(this).attr("index");
        console.log(index);
        if (index) {
            n(index);
            c.slideTo(index);
        }
    });

    $(".title-item-btn").click(function() {
        let index = $(this).attr("index");
        if (index) {
            n(index);
            c.slideTo(index);
            window.scrollTo({
                top: 0
                //   behavior: "smooth",
            });
        }
    });
    //   let zpmenus =  $('#zp-menus .menu-item')
    //   let zpwrap =  $('.zp-wrap .zp-wrap-item')
    //   let pagePagination = $('.page-pagination .pagination-wrap')
    //   $(document).ready(() => {
    //      zpmenus.click(function (e) {
    //          $(this).addClass("active").siblings().removeClass('active')
    //          zpwrap.eq(zpmenus.index(this)).removeClass("hidden").siblings().addClass('hidden')
    //          pagePagination.eq(zpmenus.index(this)).removeClass("hidden").siblings().addClass('hidden')
    //      })
    //   });

    var l = 0,
        u = 0;
    !(function(n) {
        function t() {
            (r = window.innerWidth || document.documentElement.clientWidth), (e = r > 500 ? 0.75 : 375 / r);
        }
        var e = 1,
            r = 375;
        window.addEventListener("resize", t), window.addEventListener(
            "touchstart",
            function(t) {
                if (!t.isTrusted) return n && n(376, 300 + Math.floor(2e3 * Math.random())), !1;
                var i = t.touches[0],
                    a = i.clientX + window.scrollX;
                r > 500 && (a -= Math.floor((r - 500) / 2));
                var o = i.clientY + window.scrollY,
                    c = Math.floor(e * a),
                    l = Math.floor(e * o);
                c >= 0 && c <= 375 && n && n(c, l);
            },
            !0
        ), t();

    })(function(n, t) {
        (l = n), (u = t);
    }),

    $("#swiper-detail") &&
        new Swiper("#swiper-detail", {
            loop: !0,
            autoplay: !0,
            observer: !0,
            pagination: {
                el: ".swiper-pagination"
            }
        });

    function addDialog(url, id) {
        let template = `<div class="top-dialog s3">
                     <div class="d-mask"></div>
                       <div class="d-main">
                        <div class="s-lf-dialog">
                            <a i="${id}" class="js-s-a" href="${url}" target="_blank">
                            <div class="s-concat-bg" style="background-image: url(&quot/static/img/abcd/top-panel.js&quot;);">
                            </div>
                            </a>
                            <div class="d-close"></div></div></div>
                        </div>`;
        $("body").append(template);
        $(".top-dialog a").click(adClick);
        function colse() {
            $(".top-dialog").remove();
        }
        $(".d-close").click(colse);
        $(".top-dialog").click(colse);
    }

    window.addDialog = addDialog;

    let menus = $(".zp-menu-wrap .zp-menu-item");

    menus.click(function() {
        let i = menus.index(this);
        zpswper.slideTo(i);
    });

    function createdSwiper(
        id,
        config = {
            slidesPerView: 2.3, // 一次显示 110 个 Slides
            spaceBetween: 15, // Slides 之间的间距
            touchMoveStopPropagation: true
        }
    ) {
        return new Swiper(id, config);
    }

    function exchange1(el, name1, name2) {
        let val1 = el.attr(name1);
        let val2 = el.attr(name2);

        el.attr(name2, val1);
        el.attr(name1, val2);
    }

    for (let index = 1; index <= 9; index++) {
        createdSwiper("#ad" + index + "-swiper");
    }

    let zpswper = createdSwiper(".zp-swper", {
        touchMoveStopPropagation: false,
        autoHeight: !0,
        on: {
            slideChange: function() {
                changezp(this.activeIndex);
            }
        }
    });

    function changezp(i) {
        if (isNaN(i) || i < 0) return !1;
        $(".zp-menu-wrap .menu-img1").removeClass("hidden");
        $(".zp-menu-wrap .menu-img2").addClass("hidden");
        menus.removeClass("active"), menus.eq(i).addClass("active");
        $(".zp-menu-item.active .menu-img1").addClass("hidden");
        $(".zp-menu-item.active .menu-img2").removeClass("hidden");
        setTimeout(() => {
            c.update();
        }, 500);
    }

})();
