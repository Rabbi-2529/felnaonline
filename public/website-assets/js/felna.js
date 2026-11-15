/* Felna Online — website interactions (no jQuery needed) */
(function () {
    "use strict";

    var reduceMotion = window.matchMedia && window.matchMedia("(prefers-reduced-motion: reduce)").matches;

    // Navbar shadow + back-to-top visibility
    var nav = document.querySelector(".fo-nav");
    var toTop = document.querySelector(".fo-to-top");
    function onScroll() {
        var y = window.scrollY || window.pageYOffset;
        if (nav) nav.classList.toggle("is-scrolled", y > 10);
        if (toTop) toTop.classList.toggle("is-visible", y > 500);
    }
    window.addEventListener("scroll", onScroll, { passive: true });
    onScroll();

    if (toTop) {
        toTop.addEventListener("click", function (e) {
            e.preventDefault();
            window.scrollTo({ top: 0, behavior: reduceMotion ? "auto" : "smooth" });
        });
    }

    var hasIO = "IntersectionObserver" in window;

    // Count-up numbers
    var counters = document.querySelectorAll("[data-count]");
    function runCounter(el) {
        var target = parseInt(el.getAttribute("data-count"), 10) || 0;
        if (reduceMotion) { el.textContent = target; return; }
        var start = null;
        var duration = 1400;
        function step(ts) {
            if (!start) start = ts;
            var p = Math.min((ts - start) / duration, 1);
            el.textContent = Math.round(target * (1 - Math.pow(1 - p, 3)));
            if (p < 1) window.requestAnimationFrame(step);
        }
        window.requestAnimationFrame(step);
    }
    if (hasIO) {
        var countObserver = new IntersectionObserver(function (entries) {
            entries.forEach(function (entry) {
                if (entry.isIntersecting) {
                    runCounter(entry.target);
                    countObserver.unobserve(entry.target);
                }
            });
        }, { threshold: 0.4 });
        counters.forEach(function (el) { countObserver.observe(el); });
    }

    // Horizontal product track arrows
    document.querySelectorAll("[data-track-prev], [data-track-next]").forEach(function (btn) {
        btn.addEventListener("click", function () {
            var sel = btn.getAttribute("data-track-prev") || btn.getAttribute("data-track-next");
            var track = document.querySelector(sel);
            if (!track) return;
            var card = track.firstElementChild;
            var amount = card ? card.getBoundingClientRect().width + 24 : track.clientWidth * 0.8;
            var dir = btn.hasAttribute("data-track-prev") ? -1 : 1;
            var atEnd = track.scrollLeft + track.clientWidth >= track.scrollWidth - 4;
            var atStart = track.scrollLeft <= 4;
            if (dir === 1 && atEnd) {
                track.scrollTo({ left: 0, behavior: "smooth" });
            } else if (dir === -1 && atStart) {
                track.scrollTo({ left: track.scrollWidth, behavior: "smooth" });
            } else {
                track.scrollBy({ left: dir * amount, behavior: "smooth" });
            }
        });
    });
})();
