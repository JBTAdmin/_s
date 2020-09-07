document.addEventListener("DOMContentLoaded", function(event) {
  const menuBtn = document.querySelector(".menu-btn");
  const menu = document.querySelector(".menu");
  const header = document.querySelector("header");
  const hamburgerBtn = document.querySelector(".sidebar-open");
  const aside = document.querySelector("aside");
  const menuCloseBtn = document.querySelector(".sidebar-close");
  const sidebarOverlay = document.querySelector(".sidebar-overlay");

  const searchField = document.querySelector(".search-field");

  const sidebarMenu = Array.prototype.slice.call(document.querySelectorAll(
      ".widget-area .menu-item-has-children"
  ));

  const sidebarMenuLink = Array.prototype.slice.call(document.querySelectorAll(
      ".widget-area .menu-item-has-children > a"
  ));

  let menuBtClass = false;

  sidebarMenuLink.forEach(function(el) {
    el.addEventListener("click", function(event) {
      event.preventDefault();
    })
  });

  sidebarMenu.forEach(function(el) {
    el.addEventListener("click", function(event) {
      this.querySelector(".sub-menu").classList.toggle("display-block");
      el.classList.toggle("active");
    })
  });

  menuBtn.addEventListener("click", function() {
    menuBtn.classList.toggle("open");
    menu.classList.toggle("open");
    header.classList.toggle("open");
  });

  hamburgerBtn.addEventListener("click", function() {
    searchField.focus();
    aside.classList.toggle("open");
    sidebarOverlay.classList.toggle("open");
  });

  menuCloseBtn.addEventListener("click", function() {
    hamburgerBtn.focus();
    aside.classList.toggle("open");
    sidebarOverlay.classList.toggle("open");
  });

  sidebarOverlay.addEventListener("click", function() {
    aside.classList.toggle("open");
    sidebarOverlay.classList.toggle("open");
  });
});
