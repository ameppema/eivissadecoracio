const hamburguer_btn = document.querySelector('.hamburguer-btn');

hamburguer_btn.addEventListener('click', () => {
    if(hamburguer_btn) {
        // Navigation
        const navigation = document.querySelector('.navigation');
        navigation.classList.toggle('exposed');
        hamburguer_btn.classList.toggle('open');

        // Slider Arrows
        const prev = document.querySelector('.prev');
        const next = document.querySelector('.next');
        prev.classList.toggle('open');
        next.classList.toggle('open');

        // Menu Slide
        const menu = document.querySelector('.menu');
        menu.classList.toggle('open');

        // Block Scroll
        const body = document.querySelector('body');
        body.classList.toggle('block__scroll');
    }
});


// const menuBtn = document.querySelector('.hamburguer-btn');
// let menuOpen = false;
// menuBtn.addEventListener('click', () => {
//     if(!menuOpen) {
//         menuBtn.classList.add('open');
//         menuOpen = true;
//     } else {
//         menuBtn.classList.remove('open');
//         menuOpen = false;
//     }
// });


// Navbar Hide
let lastScroll = 0;

window.onscroll = function() {
    const navbar = document.querySelector('.navbar');
    const navigation = document.querySelector('.navigation');
    let navigationSize = navigation.offsetHeight;
    let scrollPage = window.pageYOffset;
    let currentScroll = window.pageYOffset;

    if(scrollPage >= navigationSize ) {
        navbar.classList.add('navbar__hide');
    } else {
        navbar.classList.remove('navbar__hide');
    }

    if(lastScroll > currentScroll) {
        navbar.classList.remove('navbar__hide');
    }

    lastScroll = currentScroll;
};