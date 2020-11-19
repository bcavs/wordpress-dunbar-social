(function ($) {
  $(window).on("elementor/frontend/init", function () {
    elementorFrontend.hooks.addAction(
      "frontend/element_ready/phone-animation-widget.default",
      function ($scope, $) {}
    );
  });
  $(document).ready(function () {
    console.log("loaded");
    let container = $(".animation-container");
    let i = 0;
    let maxPins = 25;
    var myInterval;

    //Active
    window.addEventListener("focus", loop);

    //Inactive
    window.addEventListener("blur", stopLoop);

    loop();
    function loop() {
      // var rand = anime.random(250, 500);
      // setTimeout(function () {
      //   let pins = $(".pin");
      //   console.log("pins: ", pins.length);
      //   if (pins.length < maxPins) {
      //     if (i < maxPins) {
      //       addPin(container, i);
      //       i++;
      //     } else {
      //       i = 0;
      //     }
      //   }
      //   loop();
      // }, rand);
      myInterval = setInterval(function () {
        let pins = $(".pin");
        if (pins.length < maxPins) {
          if (i < maxPins) {
            addPin(container, i);
            i++;
          } else {
            i = 0;
            stopLoop();
          }
        }
      }, 250);
    }

    function stopLoop() {
      console.log("Stopping...");
      window.clearInterval(myInterval);
    }

    let screenIndex = 0;
    let svgScreen = $("#screen-mask");
    setInterval(function () {
      changeScreen(screenIndex, svgScreen);
      screenIndex < 2 ? screenIndex++ : (screenIndex = 0);
    }, 2000);

    // ================================================ \\
    ////         ----- Helper Functions -----         \\\\
    // ================================================ \\
    function changeScreen(brand, svg) {
      let snapchatScreen = $("#group-snap");
      let facebookScreen = $("#group-facebook");
      let instaScreen = $("#group-insta");

      switch (brand) {
        case 0:
          //snapchat
          clearScreens([snapchatScreen, facebookScreen, instaScreen]);
          snapchatScreen.removeClass("hide");
          break;
        case 1:
          //instagram
          clearScreens([snapchatScreen, facebookScreen, instaScreen]);
          instaScreen.removeClass("hide");
          break;
        case 2:
          //facebook
          clearScreens([snapchatScreen, facebookScreen, instaScreen]);
          facebookScreen.removeClass("hide");
          break;
        default:
          break;
      }
      //refreshes svg
      $(".phone-container").html($(".phone-container").html());
    }

    function clearScreens(screens) {
      screens.map((screen) => screen.addClass("hide"));
    }

    function addPin(container, i) {
      let pinHTML = `
        <div class="pin" id="pin-${i}">
            <svg fill="none" xmlns="http://www.w3.org/2000/svg">
                <rect width="45" height="37" rx="7" fill="#F1AF2F"/>
                <path d="M23.6843 30.1843L30.5 37L24.8109 49.1367C24.0915 50.6716 21.9085 50.6716 21.1891 49.1367L15.5 37L23.6843 30.1843Z" fill="#F1AF2F"/>
                <path d="M23 19C25.2091 19 27 17.2091 27 15C27 12.7909 25.2091 11 23 11C20.7909 11 19 12.7909 19 15C19 17.2091 20.7909 19 23 19Z" fill="white"/>
                <path d="M23 27C23 27 31 27 31 25C31 22.6 27.1 20 23 20C18.9 20 15 22.6 15 25C15 27 23 27 23 27ZM14 17V14H12V17H9V19H12V22H14V19H17V17H14Z" fill="white"/>
            </svg>
        </div>`;
      container.append(pinHTML);
      let newNode = document.getElementById(`pin-${i}`);
      animate(newNode, i);
    }

    function animate(node, i) {
      anime.set(node, {
        scale: 0,
      });

      anime({
        targets: node,
        translateY: [{ value: `-${anime.random(100, 450)}%`, duration: 3500 }],
        scale: 0.8,
        loop: true,
        translateX: `${anime.random(-50, 50)}px`,
        opacity: [{ value: 0, duration: 3500, delay: 500 }],
        complete: function () {
          // node.remove();
        },
      });
    }
  });
})(jQuery);
