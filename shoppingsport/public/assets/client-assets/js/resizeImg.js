let getOpt = function (e, t, a, i) {
        let n = {};
        switch (i.mode) {
            case 0:
                (n.rate = i.val / e),
                    (n.width = i.val),
                    (n.height = t * n.rate);
                break;
            case 1:
                (n.rate = i.val), (n.width = e * i.val), (n.height = t * i.val);
                break;
            case 2:
                (i.val *= 1024),
                    (n.rate = Math.sqrt(a / i.val)),
                    (n.width = Math.ceil(e / n.rate)),
                    (n.height = Math.ceil(t / n.rate));
        }
        return (i = $.extend(i, n)), n;
    },
    getOrientation = function (e, t) {
        let a = new FileReader();
        (a.onload = function (e) {
            let a = new DataView(e.target.result);
            if (65496 !== a.getUint16(0, !1)) return t(-2);
            let i = a.byteLength,
                n = 2;
            for (; n < i; ) {
                if (a.getUint16(n + 2, !1) <= 8) return t(-1);
                let e = a.getUint16(n, !1);
                if (((n += 2), 65505 === e)) {
                    if (1165519206 !== a.getUint32((n += 2), !1)) return t(-1);
                    let e = 18761 === a.getUint16((n += 6), !1);
                    n += a.getUint32(n + 4, e);
                    let i = a.getUint16(n, e);
                    n += 2;
                    for (let r = 0; r < i; r++)
                        if (274 === a.getUint16(n + 12 * r, e))
                            return t(a.getUint16(n + 12 * r + 8, e));
                } else {
                    if (65280 != (65280 & e)) break;
                    n += a.getUint16(n, !1);
                }
            }
            return t(-1);
        }),
            a.readAsArrayBuffer(e);
    };
resizeImage = function (e, t) {
    let a = {
            mode: 0,
            val: 400,
            type: "image/jpeg",
            quality: 0.8,
            capture: !0,
            before: new Function(),
            callback: new Function(),
        },
        i = $.extend({}, a, t || {});
    "" !== this.value &&
        ($.isFunction(t) && (i = t()),
        getOrientation(e, function (t) {
            let a, n;
            if ("function" == typeof FileReader) a = new FileReader();
            else {
                n = (
                    window.URL ||
                    window.webkitURL ||
                    window.mozURL ||
                    window.msURL
                ).createObjectURL(e);
            }
            $.isFunction(i.before) && i.before(e);
            let r = new Image();
            (r.onload = function () {
                let a = getOpt(this.width, this.height, e.size, i),
                    n = a.width,
                    l = a.height,
                    o = document.createElement("canvas"),
                    c = o.getContext("2d");
                switch (
                    (t < 6
                        ? ((o.width = n), (o.height = l))
                        : ((o.width = l), (o.height = n)),
                    t)
                ) {
                    case 2:
                        c.translate(n, 0), c.scale(-1, 1);
                        break;
                    case 3:
                        c.translate(n, l), c.rotate(Math.PI);
                        break;
                    case 4:
                        c.translate(0, l), c.scale(1, -1);
                        break;
                    case 5:
                        c.rotate(0.5 * Math.PI), c.scale(1, -1);
                        break;
                    case 6:
                        c.rotate(0.5 * Math.PI), c.translate(0, -l);
                        break;
                    case 7:
                        c.rotate(0.5 * Math.PI),
                            c.translate(n, -l),
                            c.scale(-1, 1);
                        break;
                    case 8:
                        c.rotate(-0.5 * Math.PI), c.translate(-n, 0);
                        break;
                    default:
                        console.log(t);
                }
                c.drawImage(this, 0, 0, n, l), (this.onload = null);
                let s = "";
                if (navigator.userAgent.match(/iphone/i)) {
                    new MegaPixImage(r).render(o, {
                        maxWidth: n,
                        maxHeight: l,
                        quality: i.quality || 0.8,
                    }),
                        (s = o.toDataURL(i.type, i.quality));
                } else if (navigator.userAgent.match(/Android/i)) {
                    (i.type = "image/jpeg"),
                        (s = new JPEGEncoder().encode(
                            c.getImageData(0, 0, n, l),
                            100 * i.quality
                        ));
                } else s = o.toDataURL(i.type, i.quality);
                $.isFunction(i.callback) && i.callback(s);
            }),
                a
                    ? (a.addEventListener(
                          "load",
                          function () {
                              r.src = a.result;
                          },
                          !1
                      ),
                      a.readAsDataURL(e))
                    : (r.src = n);
        }));
};
