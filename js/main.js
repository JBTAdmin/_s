
document.addEventListener('DOMContentLoaded', (event) => {

    const menuBtn = document.querySelector('.menu-btn');
    const menu = document.querySelector('.menu');
    const header = document.querySelector('header');
    const hamburgerBtn = document.querySelector('.hamburger-menu');
    const aside = document.querySelector('aside');
    const menuCloseBtn = document.querySelector('.sidebar-close-btn');
    const sidebarOverlay = document.querySelector('.sidebar-overlay');

    let menuBtClass = false;

    menuBtn.addEventListener('click', function(){
        menuBtn.classList.toggle('open');
        menu.classList.toggle('open');
        header.classList.toggle('open');
    });

    hamburgerBtn.addEventListener('click', function(){
        aside.classList.toggle('open');
        sidebarOverlay.classList.toggle('open');
    });

    menuCloseBtn.addEventListener('click', function(){
        aside.classList.toggle('open');
        sidebarOverlay.classList.toggle('open');
    });

    sidebarOverlay.addEventListener('click', function(){
        aside.classList.toggle('open');
        sidebarOverlay.classList.toggle('open');
    });

})
