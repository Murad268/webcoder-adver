$(function() {
    "use strict";

    function e(e) {
        return e = e.match(/^rgba?[\s+]?\([\s+]?(\d+)[\s+]?,[\s+]?(\d+)[\s+]?,[\s+]?(\d+)[\s+]?/i), e && 4 === e.length ? "#" + ("0" + parseInt(e[1], 10).toString(16)).slice(-2) + ("0" + parseInt(e[2], 10).toString(16)).slice(-2) + ("0" + parseInt(e[3], 10).toString(16)).slice(-2) : ""
    }

    function s() {
        $.each(T, function(e, s) {
            var a = $(this),
                l = a.data("animation");
            if (!a.hasClass(l)) {
                var o = a.offset().top,
                    c = t.scrollTop(),
                    r = t.height() - 100;
                c >= o - r && (a.addClass(l), setTimeout(function() {
                    a.css("opacity", 1)
                }, 1e3))
            }
        })
    }

    function a() {
        if (_.length && !_.hasClass("done")) {
            var e = _.offset().top,
                s = t.scrollTop(),
                a = t.height() - 100;
            s >= e - a && (_.addClass("done"), $.prototype.countTo && $(".timer").countTo({
                speed: 2300,
                refreshInterval: 50
            }))
        }
    }

    function l(e) {
        if (z.length && !z.hasClass("done")) {
            var s = z.offset().top,
                a = t.scrollTop(),
                l = t.height() - 160;
            a >= s - l && (z.addClass("done"), $.each(S, function(e, s) {
                var a = $(this),
                    l = a.data("percent"),
                    o = $(a).closest(".progress-bar-linear").find(".progress-cont span");
                a.css("width", l + "%"), o.html(l + "%")
            }))
        }
    }

    function o() {
        s(), a(), l()
    }

    function c() {
        if ($(this).is("#email")) {
            var e = $(this).val(),
                s = q.test(e);
            if (!s) return $(".email-error").html("please enter a valid email."), !1;
            $(".email-error").html("")
        } else {
            var a = $(this).attr("id"),
                l = $("." + a + "-error");
            if ("" === $(this).val()) return l.html("please enter a valid " + a + "."), !1;
            l.html(" ")
        }
    }
    var t = $(window),
        r = $("body"),
        i = $(".nav-list"),
        n = $(".menu-btn");
    r.append(''), t.on("load", function() {
        var e = $(".loader-con ");
        e.fadeOut("slow")
    });
    var h = !1,
        m = "animation",
        d = "",
        f = "Webkit Moz O ms Khtml".split(" "),
        g = "",
        u = document.createElement("div");
    if (void 0 !== u.style.animationName && (h = !0), h === !1)
        for (var b = 0; b < f.length; b++)
            if (void 0 !== u.style[f[b] + "AnimationName"]) {
                g = f[b], m = g + "Animation", d = "-" + g.toLowerCase() + "-", h = !0;
                break
            }
    n.on("click", function(e) {
        e.preventDefault(), $(this).toggleClass("active"), r.toggleClass("navbar-open")
    }), i.find("li a").on("click", function(e) {
        n.removeClass("active"), r.removeClass("navbar-open")
    }), $("a.scroll-btn").not('[href="#"]').on("click", function(e) {
        if (location.pathname.replace(/^\//, "") === this.pathname.replace(/^\//, "") && location.hostname === this.hostname) {
            var s = $(this.hash),
                a = $(this).data("speed") || 800;
            s = s.length ? s : $("[name=" + this.hash.slice(1) + "]"), s.length && (e.preventDefault(), $("html, body").animate({
                scrollTop: s.offset().top
            }, a))
        }
    }), $(".top-btn").on("click", function(e) {
        e.preventDefault(), $("html, body").animate({
            scrollTop: 0
        }, 800)
    });
    var p = $(".main-color").css("color"),
        v = e(p);
   
    var C = $(".work-item"),
        k = $("#work-list"),
        y = $(".filter"),
        w = function(e) {
            var s = $(this);
            if (e.preventDefault(), s.hasClass("filter-active")) return !1;
            var a = k.find(".filter-active");
            a.removeClass("filter-active"), s.addClass("filter-active"), $.each(C, function(e, a) {
                var l = $(this);
                "all" === s.data("filter") ? (l.removeClass("filtered"), setTimeout(function() {
                    l.css("display", "block")
                }, 500)) : l.hasClass(s.data("filter")) ? (l.removeClass("filtered"), setTimeout(function() {
                    l.css("display", "block")
                }, 500)) : (l.addClass("filtered"), setTimeout(function() {
                    l.css("display", "none")
                }, 500))
            })
        };
    $.each(y, function(e, s) {
        $(this).on("click", w)
    });
    var T = $(".animate-on-scroll");
    $.each(T, function(e, s) {
        var a = $(this),
            l = a.data("animation");
        h && !a.hasClass(l) && a.css("opacity", 0)
    });
    var _ = $(".timer-con"),
        z = $(".skills-section"),
        S = $(".progress-bar-line");
    t.on("scroll", function() {
        o()
    }), $.prototype.owlCarousel && ($(".testimonial-slider").owlCarousel({
        loop: !0,
        nav: !0,
        navText: ["<div class='main-color-bg testimonial-slider-btn effect hor-center'><span class='main-color effect'><i class='fa fa-angle-left center'></i></span></div>", "<div class='main-color-bg testimonial-slider-btn effect hor-center'><span class='main-color effect'><i class='fa fa-angle-right center'></i></span></div>"],
        margin: 20,
        responsive: {
            0: {
                items: 1
            },
            780: {
                items: 2
            }
        }
    }), $(".pf-details-slider").owlCarousel({
        dots: !0,
        items: 1,
        loop: !0
    })), $("#color-scheme-btn").click(function(e) {
        e.preventDefault(), $(".color-scheme-panel-con").toggleClass("color-scheme-panel-open")
    });
    var O, D, A = $(".change-color"),
        E = $(".main-color"),
        x = $(".main-color-bg"),
        I = $(".dl-btns");
    $.each(I, function(e, s) {
        $(this).on("click", function(e) {
            e.preventDefault();
            var s = $(this).attr("class").split(" "),
                a = s[1];
            r.hasClass(a) ? e.preventDefault() : r.hasClass("light") ? (r.removeClass("light"), r.addClass("dark")) : (r.removeClass("dark"), r.addClass("light"))
        })
    }), $.each(A, function(e, s) {
        $(this).on("click", function(e) {
            e.preventDefault();
            var s = $(this).attr("class").split(" "),
                a = s[0],
                l = s[1];
            $.each(E, function(e, s) {
                $(this).hasClass("main-color") ? ($(this).removeClass("main-color"), $(this).addClass(l)) : $(this).hasClass("change-color") || ($(this).removeClass(O), $(this).addClass(l))
            }), $.each(x, function(e, s) {
                $(this).hasClass("main-color-bg") ? ($(this).removeClass("main-color-bg"), $(this).addClass(a)) : $(this).hasClass("change-color") || ($(this).removeClass(D), $(this).addClass(a))
            }), E = $("." + l), x = $("." + a), O = l, D = a
        })
    });
    var j = $("#contact-form"),
        q = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{3,4})$/,
        L = $(".input-field");
    $.each(L, function(e, s) {
        $(this).on("blur", c)
    });
    var M = $("#form-message");
    $(j).on("submit", function(e) {
        e.preventDefault();
        var s = $(j).serialize();
        $.ajax({
            type: "POST",
            url: j.attr("action"),
            data: s
        }).done(function(e) {
            M.removeClass("error"), M.addClass("success"), M.text(e), $("#name").val(""), $("#email").val(""), $("#message").val("")
        }).fail(function(e) {
            M.removeClass("success"), M.addClass("error"), "" !== e.responseText ? M.text(e.responseText) : M.text("Sorry! An error occured and your message could not be sent.")
        })
    })
});