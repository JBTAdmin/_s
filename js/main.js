/**
 * File main.js.
 *
 * Contains events and methods to handle menus and sidebars.
 *
 * @package gautam
 */

document.addEventListener("DOMContentLoaded", function(event) {
  // Different Sections

  //1- Search**************************************************************************************

  const searchButton = document.querySelector(".gautam-search");
  const searchModal = document.querySelector(".popup_search_modal");
  const searchCloseBtn = document.querySelector(".popup_modal_close_button");
  const searchField = document.querySelector(".search-field");

  searchButton && searchButton.addEventListener("click", openSearchModal);
  // searchButton && searchButton.addEventListener("focus", openSearchModal);
  // searchButton &&
  //   searchButton.addEventListener("keypress", function(e) {
  //     if (e.key === "Enter" || e.key === " ") {
  //       openSearchModal();
  //     }
  //   });

  // todo need to be sure if we want to enable this feature. It will close search window on blur of search-field.
  // searchField &&
  // searchField.addEventListener("blur", function(event) {
  //   searchModal.classList.toggle("visible");
  // });

  searchCloseBtn && searchCloseBtn.addEventListener("click", closeSearchModal);

  // searchCloseBtn && searchCloseBtn.addEventListener("keypress", function(event) {
  //   if (e.key === "Enter" || e.key === " ") {
  //     closeSearchModal();
  //   }
  // });

  function closeSearchModal() {
    searchModal.classList.toggle("visible");
    searchButton.focus();
  }

  function openSearchModal() {
    searchModal.classList.toggle("visible");
    searchField.focus();
    trapFocus(".popup_search_modal", 1);
  }

  //2- Share Button**************************************************************************************

  // todo probably rewriting is required removed till not understood properly.
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

  //3- Go To Top Button**************************************************************************************

  const scrollToTopButton = document.getElementById("js-top");
  const fixedHeader = document.querySelector(".header-fixed");
  const fixedHeaderContainer = document.querySelector(".header-fixed header");
  const siteContainer = document.querySelector(".site-container");
  const inHeader = document.querySelector(".single.in-header");

  let classList;
  if (fixedHeader) {
    classList = fixedHeaderContainer.className;
  }

  window.addEventListener("scroll", scrollFunc);

  // When the button is clicked, run our ScrolltoTop function above!
  scrollToTopButton.addEventListener("click", function(e) {
    e.preventDefault();
    scrollToTop();
  });

  // Let's set up a function that shows our scroll-to-top button if we scroll beyond the height of the initial window.
  function scrollFunc() {
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
        fixedHeader.classList.add("fixed-header", "showed");
        if (!inHeader) {
          siteContainer.style.paddingTop = "10vh";
        }
      }
    } else {
      scrollToTopButton.className = "top-link hide";
      if (fixedHeader) {
        fixedHeader.classList.remove("fixed-header", "showed");
        fixedHeaderContainer.className = classList;
        if (!inHeader) {
          siteContainer.style.paddingTop = 0;
        }
      }
    }
  }

  function scrollToTop() {
    // Let's set a variable for the number of pixels we are from the top of the document.
    const c = document.documentElement.scrollTop || document.body.scrollTop;

    // If that number is greater than 0, we'll scroll back to 0, or the top of the document.
    // We'll also animate that scroll with requestAnimationFrame.
    if (c > 0) {
      window.requestAnimationFrame(scrollToTop);
      window.scrollTo(0, c - c / 10);
    }
  }

  //4- Hamburger Menu (Mobile)**************************************************************************************
  const hamburgerBtn = document.querySelector(".hamburger-menu");
  const menuCloseBtn = document.querySelector(".mobile-cls-btn");

  //todo it can be removed. Will be required when menu is part of sidebar Alt
  // const sidebarOverlay = document.querySelector(".sidebar-overlay");

  let headerMenuContainer = document.querySelector(".header-menu-container");
  const primaryMenu = document.getElementById("primary-menu");

  // Holding temp class name when mobile menu is open
  let clsList;

  hamburgerBtn && hamburgerBtn.addEventListener("click", hamburgerMenu);

  // hamburgerBtn && hamburgerBtn.addEventListener("focus", hamburgerMenu);

  menuCloseBtn && menuCloseBtn.addEventListener("click", hamburgerMenu);

  //todo combine below two.!!!!!!!!!!!!!
  hamburgerBtn &&
    hamburgerBtn.addEventListener("keypress", function(e) {
      if (e.key === "Enter" || e.key === " ") {
        hamburgerMenu();
      }
    });

  function hamburgerMenu() {
    document.body.classList.toggle("hide");
    menuCloseBtn.classList.toggle("visible");
    // sidebarOverlay.classList.toggle("open");

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

  function trapFocus(ele, focusEle = 0) {
    const matches = document
      .querySelector(ele)
      .querySelectorAll("a, input, button");

    let firstElement = matches[0];
    let lastElement = matches[matches.length - 1];

    matches[focusEle].focus();

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

  //5- Menu*************************************************
  // todo instead of taking class probably use id and then only section would be needed.
  const subMenu = document.querySelectorAll("#primary-menu .sub-menu");

  // Adding the dropdown button.
  subMenu.forEach(el =>
    el.insertAdjacentHTML(
      "beforebegin",
      '<button class="drawer-dropdown-button toggle" ></button>'
    )
  );

  //todo Need to make it work for both Desktop and Mobile Menu (header-menu, sidebar-menu) for click and focus both.
  const subMenuDropDownBtn = document.querySelectorAll(
    ".drawer-dropdown-button"
  );

  const firstDropDownBtn = subMenuDropDownBtn[0];
  firstDropDownBtn.parentNode
    .querySelectorAll(
      ".sub-menu > li:last-child > a, .sub-menu > li > .drawer-dropdown-button"
    )
    .forEach(function(ele) {
      ele.addEventListener("blur", function(event) {
        if (!firstDropDownBtn.parentNode.contains(event.relatedTarget)) {
          firstDropDownBtn.parentNode
            .querySelectorAll(".sub-menu")
            .forEach(elem1 => elem1.classList.remove("visible"));
          subMenuDropDownBtn.forEach(submenu1 =>
            submenu1.classList.remove("active")
          );
        }
      });
    });

  subMenuDropDownBtn.forEach(function(el) {
    el.addEventListener("click", function(event) {
      this.parentNode.querySelector(".sub-menu").classList.toggle("visible");
      el.classList.toggle("active");
    });
  });

  //What is this******************************????????????????????????????

  // const menu = document.querySelector(".menu");
  // const header = document.querySelector("header");
  // const headerMenu = document.querySelector(".header-menu");
  // const menuBtn = document.querySelector(".menu-btn");
  //
  // menuBtn.addEventListener("click", function() {
  //   menuBtn.classList.toggle("open");
  //   menu.classList.toggle("open");
  //   header.classList.toggle("open");
  // });

  // const altSidebar = document.querySelector(".sidebar-alt");
  // sidebarOverlay &&
  //   sidebarOverlay.addEventListener("click", function() {
  //     altSidebar.classList.toggle("open");
  //     sidebarOverlay.classList.toggle("open");
  //   });
});
