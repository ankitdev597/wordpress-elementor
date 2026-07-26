(function () {
  "use strict";

  var menuBtn = document.getElementById("menu-toggle");
  var drawer = document.getElementById("mobile-nav");
  var chrome = document.getElementById("site-chrome");

  function setDrawer(open) {
    if (!drawer || !menuBtn) return;
    drawer.hidden = !open;
    drawer.setAttribute("data-open", open ? "true" : "false");
    menuBtn.setAttribute("aria-expanded", open ? "true" : "false");
  }

  if (menuBtn) {
    menuBtn.addEventListener("click", function () {
      setDrawer(drawer.hidden);
    });
  }

  if (drawer) {
    drawer.querySelectorAll("a").forEach(function (link) {
      link.addEventListener("click", function () {
        setDrawer(false);
      });
    });
  }

  document.addEventListener("keydown", function (e) {
    if (e.key === "Escape") setDrawer(false);
  });

  /* Header: show on scroll up, hide on scroll down */
  if (chrome) {
    var lastY = window.scrollY || 0;
    var ticking = false;

    function onScroll() {
      var y = window.scrollY || 0;
      var delta = y - lastY;

      if (y < 24) {
        chrome.classList.remove("is-hidden");
      } else if (delta > 8) {
        chrome.classList.add("is-hidden");
        setDrawer(false);
      } else if (delta < -8) {
        chrome.classList.remove("is-hidden");
      }

      lastY = y;
      ticking = false;
    }

    window.addEventListener(
      "scroll",
      function () {
        if (!ticking) {
          window.requestAnimationFrame(onScroll);
          ticking = true;
        }
      },
      { passive: true }
    );
  }

  /* Peek carousel — center active slide, sides partially visible */
  var stage = document.querySelector("[data-carousel]");
  if (stage) {
    var track = stage.querySelector(".feature-track");
    var slides = Array.prototype.slice.call(stage.querySelectorAll(".feature-slide"));
    var dots = Array.prototype.slice.call(stage.querySelectorAll(".feature-dots button"));
    var prev = stage.querySelector(".feature-nav--prev");
    var next = stage.querySelector(".feature-nav--next");
    var index = 0;
    var timer;

    function offsetFor(i) {
      if (!track || !slides.length) return 0;
      var viewport = stage.querySelector(".feature-viewport") || stage;
      var slide = slides[i];
      var gap = parseFloat(window.getComputedStyle(track).gap) || 12;
      var slideW = slide.getBoundingClientRect().width;
      var viewW = viewport.getBoundingClientRect().width;
      var left = i * (slideW + gap);
      return Math.round(viewW / 2 - slideW / 2 - left);
    }

    function goTo(i) {
      index = (i + slides.length) % slides.length;
      track.style.transform = "translateX(" + offsetFor(index) + "px)";
      slides.forEach(function (slide, n) {
        slide.classList.toggle("is-active", n === index);
      });
      dots.forEach(function (dot, n) {
        dot.classList.toggle("is-active", n === index);
      });
    }

    function start() {
      stop();
      timer = window.setInterval(function () {
        goTo(index + 1);
      }, 5500);
    }

    function stop() {
      if (timer) window.clearInterval(timer);
    }

    dots.forEach(function (dot, n) {
      dot.addEventListener("click", function () {
        goTo(n);
        start();
      });
    });

    if (prev) {
      prev.addEventListener("click", function () {
        goTo(index - 1);
        start();
      });
    }
    if (next) {
      next.addEventListener("click", function () {
        goTo(index + 1);
        start();
      });
    }

    stage.addEventListener("mouseenter", stop);
    stage.addEventListener("mouseleave", start);
    window.addEventListener("resize", function () {
      goTo(index);
    });

    goTo(0);
    start();
  }

  document.querySelectorAll("[data-chips] .chip").forEach(function (chip) {
    chip.addEventListener("click", function () {
      document.querySelectorAll("[data-chips] .chip").forEach(function (c) {
        c.classList.remove("is-active");
      });
      chip.classList.add("is-active");
    });
  });

  var form = document.getElementById("newsletter-form");
  if (form) {
    form.addEventListener("submit", function (e) {
      e.preventDefault();
      form.reset();
      var note = document.querySelector("[data-success]");
      if (note) {
        note.hidden = false;
        window.setTimeout(function () {
          note.hidden = true;
        }, 3000);
      }
    });
  }

  var search = document.querySelector(".hero-search");
  if (search) {
    search.addEventListener("submit", function (e) {
      e.preventDefault();
    });
  }
})();
