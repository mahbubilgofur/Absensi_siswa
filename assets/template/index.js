
! function(e) {
  e.fn.marquee = function(t) {
    return this.each(function() {
      var i, a, n, r, s, o = e.extend({}, e.fn.marquee.defaults, t),
        u = e(this),
        d = 3,
        p = "animation-play-state",
        f = !1,
        l = function(e, t, i) {
          for (var a = ["webkit", "moz", "MS", "o", ""], n = 0; n < a.length; n++) a[n] || (t = t.toLowerCase()), e.addEventListener(a[n] + t, i, !1)
        },
        c = function(e) {
          var t, i = [];
          for (t in e) e.hasOwnProperty(t) && i.push(t + ":" + e[t]);
          return i.push(), "{" + i.join(",") + "}"
        },
        m = {
          pause: function() {
            f && o.allowCss3Support ? i.css(p, "paused") : e.fn.pause && i.pause(), u.data("runningStatus", "paused"), u.trigger("paused")
          },
          resume: function() {
            f && o.allowCss3Support ? i.css(p, "running") : e.fn.resume && i.resume(), u.data("runningStatus", "resumed"), u.trigger("resumed")
          },
          toggle: function() {
            m["resumed" == u.data("runningStatus") ? "pause" : "resume"]()
          },
          destroy: function() {
            clearTimeout(u.timer), u.css("visibility", "hidden").html(u.find(".js-marquee:first")), setTimeout(function() {
              u.css("visibility", "visible")
            }, 0)
          }
        };
      if ("string" == typeof t) e.isFunction(m[t]) && (i || (i = u.find(".js-marquee-wrapper")), !0 === u.data("css3AnimationIsSupported") && (f = !0), m[t]());
      else {
        var g;
        e.each(o, function(e) {
          if (g = u.attr("data-" + e), "undefined" != typeof g) {
            switch (g) {
              case "true":
                g = !0;
                break;
              case "false":
                g = !1
            }
            o[e] = g
          }
        }), o.duration = o.speed || o.duration, r = "up" == o.direction || "down" == o.direction, o.gap = o.duplicated ? o.gap : 0, u.wrapInner('<div class="js-marquee"></div>');
        var h = u.find(".js-marquee").css({
          "margin-right": o.gap,
          "float": "left"
        });
        if (o.duplicated && h.clone(!0).appendTo(u), u.wrapInner('<div style="width:100000px" class="js-marquee-wrapper"></div>'), i = u.find(".js-marquee-wrapper"), r) {
          var v = u.height();
          i.removeAttr("style"), u.height(v), u.find(".js-marquee").css({
            "float": "none",
            "margin-bottom": o.gap,
            "margin-right": 0
          }), o.duplicated && u.find(".js-marquee:last").css({
            "margin-bottom": 0
          });
          var y = u.find(".js-marquee:first").height() + o.gap;
          o.duration *= (parseInt(y, 10) + parseInt(v, 10)) / parseInt(v, 10)
        } else s = u.find(".js-marquee:first").width() + o.gap, a = u.width(), o.duration *= (parseInt(s, 10) + parseInt(a, 10)) / parseInt(a, 10);
        if (o.duplicated && (o.duration /= 2), o.allowCss3Support) {
          var h = document.body || document.createElement("div"),
            w = "marqueeAnimation-" + Math.floor(1e7 * Math.random()),
            S = ["Webkit", "Moz", "O", "ms", "Khtml"],
            x = "animation",
            b = "",
            q = "";
          if (h.style.animation && (q = "@keyframes " + w + " ", f = !0), !1 === f)
            for (var j = 0; j < S.length; j++)
              if (void 0 !== h.style[S[j] + "AnimationName"]) {
                h = "-" + S[j].toLowerCase() + "-", x = h + x, p = h + p, q = "@" + h + "keyframes " + w + " ", f = !0;
                break
              } f && (b = w + " " + o.duration / 1e3 + "s " + o.delayBeforeStart / 1e3 + "s infinite " + o.css3easing, u.data("css3AnimationIsSupported", !0))
        }
        var I = function() {
            i.css("margin-top", "up" == o.direction ? v + "px" : "-" + y + "px")
          },
          C = function() {
            i.css("margin-left", "left" == o.direction ? a + "px" : "-" + s + "px")
          };
        o.duplicated ? (r ? i.css("margin-top", "up" == o.direction ? v : "-" + (2 * y - o.gap) + "px") : i.css("margin-left", "left" == o.direction ? a + "px" : "-" + (2 * s - o.gap) + "px"), d = 1) : r ? I() : C();
        var A = function() {
          if (o.duplicated && (1 === d ? (o._originalDuration = o.duration, o.duration = r ? "up" == o.direction ? o.duration + v / (y / o.duration) : 2 * o.duration : "left" == o.direction ? o.duration + a / (s / o.duration) : 2 * o.duration, b && (b = w + " " + o.duration / 1e3 + "s " + o.delayBeforeStart / 1e3 + "s " + o.css3easing), d++) : 2 === d && (o.duration = o._originalDuration, b && (w += "0", q = e.trim(q) + "0 ", b = w + " " + o.duration / 1e3 + "s 0s infinite " + o.css3easing), d++)), r ? o.duplicated ? (d > 2 && i.css("margin-top", "up" == o.direction ? 0 : "-" + y + "px"), n = {
              "margin-top": "up" == o.direction ? "-" + y + "px" : 0
            }) : (I(), n = {
              "margin-top": "up" == o.direction ? "-" + i.height() + "px" : v + "px"
            }) : o.duplicated ? (d > 2 && i.css("margin-left", "left" == o.direction ? 0 : "-" + s + "px"), n = {
              "margin-left": "left" == o.direction ? "-" + s + "px" : 0
            }) : (C(), n = {
              "margin-left": "left" == o.direction ? "-" + s + "px" : a + "px"
            }), u.trigger("beforeStarting"), f) {
            i.css(x, b);
            var t = q + " { 100%  " + c(n) + "}",
              p = e("style");
            0 !== p.length ? p.filter(":last").append(t) : e("head").append("<style>" + t + "</style>"), l(i[0], "AnimationIteration", function() {
              u.trigger("finished")
            }), l(i[0], "AnimationEnd", function() {
              A(), u.trigger("finished")
            })
          } else i.animate(n, o.duration, o.easing, function() {
            u.trigger("finished"), o.pauseOnCycle ? u.timer = setTimeout(A, o.delayBeforeStart) : A()
          });
          u.data("runningStatus", "resumed")
        };
        u.bind("pause", m.pause), u.bind("resume", m.resume), o.pauseOnHover && u.bind("mouseenter mouseleave", m.toggle), f && o.allowCss3Support ? A() : u.timer = setTimeout(A, o.delayBeforeStart)
      }
    })
  }, e.fn.marquee.defaults = {
    allowCss3Support: !0,
    css3easing: "linear",
    easing: "linear",
    delayBeforeStart: 1e3,
    direction: "left",
    duplicated: !1,
    duration: 5e3,
    gap: 20,
    pauseOnCycle: !1,
    pauseOnHover: !1
  }
}(jQuery);
$("#marquee").marquee({
  duration: 1e4,
  gap: 50,
  delayBeforeStart: 0,
  direction: "Right",
  duplicated: !0,
  pauseOnHover: !0
});