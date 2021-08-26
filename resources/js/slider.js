const sliderContainer = document.getElementById("slider");
const slides = document.querySelectorAll(".slide");
const next = document.querySelector("#next");
const prev = document.querySelector("#prev");

const nextSlide = () => {
    const current = document.querySelector(".current");
    current.classList.remove("current");
    if (current.nextElementSibling) {
        current.nextElementSibling.classList.add("current");
    } else {
        slides[0].classList.add("current");
    }
};

const prevSlide = () => {
    const current = document.querySelector(".current");
    current.classList.remove("current");
    if (current.previousElementSibling) {
        current.previousElementSibling.classList.add("current");
    } else {
        slides[slides.length - 1].classList.add("current");
    }
};

if(!!sliderContainer) {
    next.addEventListener("click", e => {
        nextSlide();
    });
    
    prev.addEventListener("click", e => {
        prevSlide();
    });
}

/* RESPONSIVE IMAGES */

$(window).on('DOMContentLoaded', function(){
    let elementDesktop = document.querySelector('[data-img-movil]');
    let stylesDesktop = [];
    if(slides.length > 1){
        slides.forEach((element, index) =>{
            stylesDesktop.push(slides[index].getAttribute('style'));
        })
    }else{ stylesDesktop =  elementDesktop.getAttribute('style')}
    /* Media Querys Size definition */
    let window_size = window.matchMedia('(min-width: 1280px)');

    /* Detecting Mobile Size*/
    if(window_size.matches){
    /*'keep Desktop images */
    }else{
        /*'Load Slide Mobile Images */
        if(slides.length > 1){
            slides.forEach((slide, index) => {
                let imgM = slides[index].getAttribute('data-img-movil');
                slides[index].setAttribute( 'style', imgM + ' no-repeat center top/cover;');
            })
            console.log('Done Mobile Slide Images');
        }
        else {
            let stylesMovil = document.querySelector('[data-img-movil]').getAttribute('data-img-movil');
            elementDesktop.setAttribute('style', stylesMovil + ' no-repeat center top/cover;');
            console.log('Done Mobile Singular Image');
        }
    }

/* Redimension Window Event */
$(window).on('resize', function(){
    if(window_size.matches){
        if(slides.length > 1){/*Slide Images Desktop */
            slides.forEach((slide, index) => {
                slides[index].setAttribute( 'style', stylesDesktop[index] + ' no-repeat center top/cover;');
            })
        }
        else {
            elementDesktop.setAttribute('style', stylesDesktop);/*Singular Images Desktop */
        }
    }else{
        if(slides.length > 1){
            slides.forEach((slide, index) => {/*Load Slide Mobile Images*/
                let imgM = slides[index].getAttribute('data-img-movil');
                slides[index].setAttribute( 'style', imgM + ' no-repeat center top/cover;');
            })
        }
        else {/*Load Mobile Singular Image*/
            let stylesMovil = document.querySelector('[data-img-movil]').getAttribute('data-img-movil');
            elementDesktop.setAttribute('style', stylesMovil + ' no-repeat center top/cover;');
        }
    }
})
})