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

$(window).on('DOMContentLoaded', function(){
    let elementDesktop = document.querySelector('[data-img-movil]');
    let stylesDesktop = [];
    if(slides.length > 1){
        slides.forEach((element, index) =>{
            stylesDesktop.push(slides[index].getAttribute('style'));
        })
    }else{ stylesDesktop =  elementDesktop.getAttribute('style')}
    /* Trabajando con los media querys */
    let window_size = window.matchMedia('(min-width: 1280px)');

    /* Detectando la vista movil */
    if(window_size.matches){
    /* alert('No Usar imagenes responsive!!!') */
    }else{
        /* alert('Usar imagenes responsive!!!') */
        if(slides.length > 1){
            slides.forEach((slide, index) => {
                let imgM = slides[index].getAttribute('data-img-movil');
                slides[index].setAttribute( 'style', imgM + ' no-repeat center top/cover;');
            })
            console.log('Listo Movil slide');
        }
        else {
            let stylesMovil = document.querySelector('[data-img-movil]').getAttribute('data-img-movil');
            elementDesktop.setAttribute('style', stylesMovil + ' no-repeat center top/cover;');
            console.log('Listo Movil');
        }
    }

/* En caso de que se Redimensione la pantalla */
$(window).on('resize', function(){
    if(window_size.matches){
        /* alert('No Usar imagenes responsive!!!') */
        if(slides.length > 1){
            slides.forEach((slide, index) => {
                slides[index].setAttribute( 'style', stylesDesktop[index] + ' no-repeat center top/cover;');
                console.log(stylesDesktop)
            })
        }
        else {
            elementDesktop.setAttribute('style', stylesDesktop);
            console.log('Listo Movil')
        }
    }else{
        /* alert('Usar imagenes responsive!!!') */
        if(slides.length > 1){
            slides.forEach((slide, index) => {
                let imgM = slides[index].getAttribute('data-img-movil');
                slides[index].setAttribute( 'style', imgM + ' no-repeat center top/cover;');
            })
        }
        else {
            let stylesMovil = document.querySelector('[data-img-movil]').getAttribute('data-img-movil');
            elementDesktop.setAttribute('style', stylesMovil + ' no-repeat center top/cover;');
        }
    }
})
})