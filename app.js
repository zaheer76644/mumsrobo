const humburger = document.querySelector('.header .nav-bar .nav-list .humburger');
const mobile_menu = document.querySelector('.header .nav-bar .nav-list ul');
const header = document.querySelector('.header.container');


humburger.addEventListener('click',() =>{
    humburger.classList.toggle('active');
    mobile_menu.classList.toggle('active');
});




