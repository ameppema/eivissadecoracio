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

next.addEventListener("click", e => {
    nextSlide();
});

prev.addEventListener("click", e => {
    prevSlide();
});

// Repoblando las imagenes con sus versiones moviles
$(window).on('DOMContentLoaded', function(){
    console.log(slides);
    console.log(slides[0].style);
    
let width = $(window).width();
let heigth = $(window).height();

// console.log(`Ancho de la ventana: ${width} . Alto de la ventana: ${heigth}`) //Debug

    // Peticion Asincrona para editar elementos
    $.ajax({
        url : 'http://eivissadecoracio.test/admin/slide/1/edit',
        data: {},
        type: 'GET',
        success: function(data){
            if(data){
                
                // console.log(data[0].titulo); //Debug

                $('#modal-titulo').val(data[0].titulo);
                $('#modal-desc').val(data[0].descripcion);
            }
        },
        error: function(error){
            console.log({error})
            console.log({'error msg': error.responseJSON.message})
        }
    });


})
