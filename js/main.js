
document.addEventListener('DOMContentLoaded', (event) => {

    const menuBtn = document.querySelector('.menu-btn');
    const menu = document.querySelector('.menu');
    const header = document.querySelector('header');

    let menuBtClass = false;

    menuBtn.addEventListener('click', function(){
        menuBtn.classList.toggle('open');
        menu.classList.toggle('open');
        header.classList.toggle('open');
    });
})
