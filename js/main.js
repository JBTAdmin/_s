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
  const fixedHeader = document.querySelector(".header-fixed");
  const siteContainer = document.querySelector(".site-container");
  const inHeader = document.querySelector(".single.in-header");
  let classList;
  if (fixedHeader) {
    classList = fixedHeaderContainer.className;
  }

  // Let's set up a function that shows our scroll-to-top button if we scroll beyond the height of the initial window.
  const scrollFunc = () => {
    // Get the current scroll value.
    let y = window.scrollY;

    // If the scroll value is greater than the window height, let's add a class to the scroll-to-top button to show it!
    if (y > 0) {
      scrollToTopButton.className = "top-link show";

      if (fixedHeader) {
        fixedHeaderContainer.classList.remove(
          "flex-dir-column",
          "flex-dir-column-reverse"
        );
        fixedHeader.classList.add("fixed-header");
        fixedHeader.classList.add("showed");
        if (!inHeader) {
          siteContainer.style.paddingTop = "10vh";
        }
      }
    } else {
      scrollToTopButton.className = "top-link hide";
      if (fixedHeader) {
        fixedHeader.classList.remove("fixed-header");
        fixedHeader.classList.remove("showed");
        fixedHeaderContainer.className = classList;
        if (!inHeader) {
          siteContainer.style.paddingTop = 0;
        }
      }
    }
  };

  window.addEventListener("scroll", scrollFunc);

  const scrollToTop = () => {
    // Let's set a variable for the number of pixels we are from the top of the document.
    const c = document.documentElement.scrollTop || document.body.scrollTop;

    // If that number is greater than 0, we'll scroll back to 0, or the top of the document.
    // We'll also animate that scroll with requestAnimationFrame.
    if (c > 0) {
      window.requestAnimationFrame(scrollToTop);
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
  const popupModalCloseBtn = document.querySelector(
    ".popup_modal_close_button"
  );

  // Facebook share function.
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

  // const menuBtn = document.querySelector(".menu-btn");
  // todo what is the use of below??????
  const menu = document.querySelector(".menu");

  const headerMenu = document.querySelector(".header-menu");
  const header = document.querySelector("header");

  // combine these two
  const hamburgerBtn1 = document.querySelector(".hamburger-menu");
  const hamburgerBtn = document.querySelector(".sidebar-open");

  const altSidebar = document.querySelector(".sidebar-alt");
  const menuCloseBtn = document.querySelector(".mobile-cls-btn");
  const sidebarOverlay = document.querySelector(".sidebar-overlay");

  const searchField = document.querySelector(".search-field");

  const subMenu = document.querySelectorAll(".sidebar-menu  .sub-menu");
  const headerSubMenu = document.querySelectorAll(".header-menu  .sub-menu");

  // Holding temp class name when mobile menu is open
  let clsList;

  headerSubMenu.forEach(el =>
    el.insertAdjacentHTML(
      "beforebegin",
      '<span class="drawer-dropdown-button" ></span>'
    )
  );

  subMenu.forEach(el =>
    el.insertAdjacentHTML(
      "beforebegin",
      '<span class="drawer-dropdown-button" ></span>'
    )
  );

  const sidebarMenu = Array.prototype.slice.call(
    document.querySelectorAll(".drawer-dropdown-button")
  );

  sidebarMenu.forEach(function(el) {
    el.addEventListener("click", function(event) {
      this.parentNode
        .querySelector(".sub-menu")
        .classList.toggle("display-block");
      el.classList.toggle("active");
    });
  });

  // menuBtn.addEventListener("click", function() {
  //   menuBtn.classList.toggle("open");
  //   menu.classList.toggle("open");
  //   header.classList.toggle("open");
  // });

  hamburgerBtn && hamburgerBtn.addEventListener("click", hamburgerMenu);

  // hamburgerBtn &&
  // hamburgerBtn.addEventListener("focus", hamburgerMenu);

  //todo combine below two.!!!!!!!!!!!!!
  hamburgerBtn &&
    hamburgerBtn.addEventListener("keypress", function(e) {
      if (e.key === "Enter" || e.key === " ") {
        hamburgerMenu();
      }
    });

  hamburgerBtn1 &&
    hamburgerBtn1.addEventListener("keypress", function(e) {
      if (e.key === "Enter" || e.key === " ") {
        hamburgerMenu();
      }
    });

  function hamburgerMenu() {
    //todo move to top
    let headerMenuContainer = document.querySelector(".header-menu-container");
    const primaryMenu = document.getElementById("primary-menu");

    menuCloseBtn.classList.toggle("visible");
    sidebarOverlay.classList.toggle("open");
    document.body.classList.toggle("hide");
    hamburgerBtn1.classList.toggle("hide");

    if (primaryMenu.className == "header-menu") {
      primaryMenu.className = "sidebar-menu";
      clsList = headerMenuContainer.className;
      headerMenuContainer.className = "header-menu-container";
      trapFocus(".mobile-menu-container");
    } else {
      primaryMenu.className = "header-menu";
      headerMenuContainer.className = clsList;
      clsList = "";
      hamburgerBtn.focus();
    }
  }

  menuCloseBtn && menuCloseBtn.addEventListener("click", hamburgerMenu);

  // sidebarOverlay &&
  //   sidebarOverlay.addEventListener("click", function() {
  //     altSidebar.classList.toggle("open");
  //     sidebarOverlay.classList.toggle("open");
  //   });

  searchButton && searchButton.addEventListener("click", openSearchModal);
  // searchButton && searchButton.addEventListener("focus", openSearchModal);
  searchButton &&
    searchButton.addEventListener("keypress", function(e) {
      // alert('inside key');
      if (e.key === "Enter" || e.key === " ") {
        // alert('inside if  ');
        openSearchModal();
      }
    });

  function trapFocus(ele) {
    const matches = document
      .querySelector(ele)
      .querySelectorAll("a, input, button");

    let firstElement = matches[0];
    let lastElement = matches[matches.length - 1];

    firstElement.focus();

    lastElement.addEventListener("keydown", function(e) {
      if (e.key == "Tab" && !e.shiftKey) {
        e.preventDefault();
        firstElement.focus();
      }
    });

    firstElement.addEventListener("keydown", function(e) {
      if (e.key == "Tab" && e.shiftKey) {
        e.preventDefault();
        lastElement.focus();
      }
    });
  }

  function openSearchModal() {
    popupSearchModal.classList.toggle("visible");
    searchField.focus();
  }

  searchField &&
    searchField.addEventListener("blur", function(event) {
      popupSearchModal.classList.toggle("visible");
    });

  popupModalCloseBtn.addEventListener("click", function(event) {
    popupSearchModal.classList.toggle("visible");
  });
});
