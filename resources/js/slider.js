const sliderElement = document.getElementById("slider");
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

if(!!sliderElement) {
    next.addEventListener("click", e => {
        nextSlide();
    });
    
    prev.addEventListener("click", e => {
        prevSlide();
    });
}

// Repoblando las imagenes con sus versiones moviles
$(window).on('DOMContentLoaded', function(){
    // console.log(slides);

    //Trabajando con los media querys
    let window_size = window.matchMedia('(max-width: 1280px)');

    // Detectando la vista movil
    if(window_size.matches){
        // alert('usar imagenes responsive!!!')
        slides.forEach((slide, index) => {
            //Leyendo al ruta de la imagen movil
            let imgM = slides[index].getAttribute('data-img-movil');
            console.log(imgM, index)
            slides[index].setAttribute( 'style', imgM + ' no-repeat center top/cover;');

        })
    }else{
        // alert('No usar imagenes responsive!!!')
        console.log(slides[index].getAttribute('data-img-movil'))
    }

    // En caso de que se Redimensione la pantalla
    $(window).on('resize', function(){
        if(window_size.matches){
            // alert('usar imagenes responsive!!!')
            slides.forEach((slide, index) => {
                //Leyendo al ruta de la imagen movil
                let imgM = slides[index].getAttribute('data-img-movil');
                console.log(imgM, index)
                slides[index].setAttribute( 'style', imgM + ' no-repeat center top/cover;');
    
            })
        }else{
            // alert('No usar imagenes responsive!!!')
            
        console.log(slides[0].getAttribute('data-img-movil'))
        }
    })

})
