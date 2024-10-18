let header = document.querySelector('header');
let menu = document.querySelector('#menu-icon');

// Agrega una sombra al encabezado al hacer scroll
window.addEventListener('scroll', () => {
    header.classList.toggle('shadow', window.scrollY > 0);
});

// Alterna la clase para mostrar el menú
menu.onclick = () => {
    menu.classList.toggle('bx-x');
};

// Inicializa el swiper para la sección "home"
var swiperHome = new Swiper(".home", {
    spaceBetween: 30,
    centeredSlides: true,
    autoplay: {
        delay: 5000,
        disableOnInteraction: false,
    },
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
    },
});

// Inicializa el swiper para la sección "coming-container"
var swiperComing = new Swiper(".coming-container", {
    spaceBetween: 20,
    loop: true,
    autoplay: {
        delay: 5500,
        disableOnInteraction: false,
    },
    centeredSlides: true,
    breakpoints: {
        0: {
            slidesPerView: 2,
        },
        568: {
            slidesPerView: 3,
        },
        768: {
            slidesPerView: 4,
        },
        968: {
            slidesPerView: 5,
        },
    },
});