
document.addEventListener('DOMContentLoaded', (event) => {

    const menuBtn = document.querySelector('.menu-btn');
    const menu = document.querySelector('.menu');
    const header = document.querySelector('header');
    const hamburgerBtn = document.querySelector('.hamburger-menu');
    const aside = document.querySelector('aside');
    const menuCloseBtn = document.querySelector('.sidebar-close-btn');
    const sidebarOverlay = document.querySelector('.sidebar-overlay');

    const sidebarMenu = document.querySelectorAll('.widget-area .menu-item-has-children');

    const sidebarMenuLink = document.querySelectorAll('.widget-area .menu-item-has-children > a');

    let menuBtClass = false;

    sidebarMenuLink.forEach(el => el.addEventListener('click', function(event){
        event.preventDefault();
    }));

    sidebarMenu.forEach(el => el.addEventListener('click', function(event) {
        this.querySelector('.sub-menu').classList.toggle('display-block');
    }));

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
