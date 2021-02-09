/**
 * File main.js.
 *
 * Contains events and methods to handle menus and sidebars.
 *
 * @package aaurora
 */

document.addEventListener("DOMContentLoaded", function(event) {
  // Set a variable for our button element.
  const scrollToTopButton = document.getElementById("js-top");
  const fixedHeaderContainer = document.querySelector(".header-fixed header");
  const fixedHeader = document.querySelector(".header-fixed .header-menu-bar");
  let classList = fixedHeaderContainer.className;
  // Let's set up a function that shows our scroll-to-top button if we scroll beyond the height of the initial window.
  const scrollFunc = () => {
    // Get the current scroll value
    let y = window.scrollY;

    // alert(classList);

    // If the scroll value is greater than the window height, let's add a class to the scroll-to-top button to show it!
    if (y > 0) {
      scrollToTopButton.className = "top-link show";
      fixedHeaderContainer.classList.remove(
        // "flex-dir-row-reverse",
        "flex-dir-column",
        "flex-dir-column-reverse"
      );
      fixedHeader.classList.add("fixed-header");
      fixedHeader.classList.add("showed");
    } else {
      scrollToTopButton.className = "top-link hide";
      fixedHeader.classList.remove("fixed-header");
      fixedHeader.classList.remove("showed");
      fixedHeaderContainer.className = classList;
    }
  };

  window.addEventListener("scroll", scrollFunc);

  const scrollToTop = () => {
    // Let's set a variable for the number of pixels we are from the top of the document.
    const c = document.documentElement.scrollTop || document.body.scrollTop;

    // If that number is greater than 0, we'll scroll back to 0, or the top of the document.
    // We'll also animate that scroll with requestAnimationFrame:
    // https://developer.mozilla.org/en-US/docs/Web/API/window/requestAnimationFrame
    if (c > 0) {
      window.requestAnimationFrame(scrollToTop);
      // ScrollTo takes an x and a y coordinate.
      // Increase the '10' value to get a smoother/slower scroll!
      window.scrollTo(0, c - c / 10);
    }
  };

  // When the button is clicked, run our ScrolltoTop function above!
  scrollToTopButton.onclick = function(e) {
    e.preventDefault();
    scrollToTop();
  };

  const popupSearchModal = document.querySelector(".popup_search_modal");
  const searchButton = document.querySelector(".aaurora-search");
  const headerSearchButton = document.querySelector(".aaurora-header-search");
  const popupModalCloseBtn = document.querySelector(
    ".popup_modal_close_button"
  );

  // const shareBtn = document.querySelector(".aaurora-share");
  // const shareInnerBtn = document.querySelector(".social-share-inner");

  // Facebook share function
  function fbs_click() {
    u = location.href;
    t = document.title;
    window.open(
      "http://www.facebook.com/sharer.php?u=" +
        encodeURIComponent(u) +
        "&t=" +
        encodeURIComponent(t),
      "sharer",
      "toolbar=0,status=0,width=626,height=436"
    );
    return false;
  }

  const menuBtn = document.querySelector(".menu-btn");
  const menu = document.querySelector(".menu");
  const header = document.querySelector("header");
  const hamburgerBtn = document.querySelector(".sidebar-open");
  const altSidebar = document.querySelector(".sidebar-alt");
  const menuCloseBtn = document.querySelector(".sidebar-close");
  const sidebarOverlay = document.querySelector(".sidebar-overlay");

  const searchField = document.querySelector(".search-field");

  const subMenu = document.querySelectorAll(".sidebar-menu  .sub-menu");

  subMenu.forEach(el =>
    el.insertAdjacentHTML(
      "beforebegin",
      '<span class="drawer-dropdown-button" ></span>'
      // '<div class="ins-drawer-button-area"><span class="drawer-dropdown-button" ></span></div>'
      // '<span class="sub-menu-btn-icon">&gt;</span>'
    )
  );

  const sidebarMenu = Array.prototype.slice.call(
    document.querySelectorAll(".widget-area .drawer-dropdown-button")
  );

  sidebarMenu.forEach(function(el) {
    el.addEventListener("click", function(event) {
      this.parentNode
        .querySelector(".sub-menu")
        .classList.toggle("display-block");
      el.classList.toggle("active");
    });
  });

  menuBtn.addEventListener("click", function() {
    menuBtn.classList.toggle("open");
    menu.classList.toggle("open");
    header.classList.toggle("open");
  });

  hamburgerBtn &&
    hamburgerBtn.addEventListener("click", function() {
      // searchField.focus();
      altSidebar.classList.toggle("open");
      sidebarOverlay.classList.toggle("open");
      document.body.classList.toggle("hide");
    });

  menuCloseBtn &&
    menuCloseBtn.addEventListener("click", function() {
      hamburgerBtn.focus();
      altSidebar.classList.toggle("open");
      sidebarOverlay.classList.toggle("open");
    });

  sidebarOverlay &&
    sidebarOverlay.addEventListener("click", function() {
      altSidebar.classList.toggle("open");
      sidebarOverlay.classList.toggle("open");
    });

  searchButton &&
    searchButton.addEventListener("click", function() {
      popupSearchModal.classList.toggle("visible");
    });

  headerSearchButton &&
    headerSearchButton.addEventListener("click", function() {
      popupSearchModal.classList.toggle("visible");
    });

  popupModalCloseBtn.addEventListener("click", function() {
    popupSearchModal.classList.toggle("visible");
  });

  // popupSearchModal &&
  // popupSearchModal.addEventListener(
  // "click",
  // function() {
  // popupSearchModal.classList.toggle( "visible" );
  // }
  // );
});
