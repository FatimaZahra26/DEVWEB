let navbar = document.querySelector('.header .navbar');
let searchForm = document.querySelector('.header .search-form');
let loginForm = document.querySelector('.header .login-form');
let contactInfo = document.querySelector('.contact-info');

function auth1() {

    window.location.assign("https://www.facebook.com/");

}

function auth2() {
    window.location.assign("https://github.com/");
}

function auth3() {

    window.location.assign("https://business.linkedin.com/");

}

document.querySelector('#menu-btn').onclick = () => {
    navbar.classList.toggle('active');
    searchForm.classList.remove('active');
    loginForm.classList.remove('active');
};



document.querySelector('#login-btn').onclick = () => {
    loginForm.classList.toggle('active');
    navbar.classList.remove('active');
    searchForm.classList.remove('active');
};
document.querySelector('#info-btn').onclick = () => {
    contactInfo.classList.add('active');
}
document.querySelector('#close-contact-info').onclick = () => {
    contactInfo.classList.remove('active');
}
window.onscroll = () => {
    navbar.classList.remove('active');
    searchForm.classList.remove('active');
    loginForm.classList.remove('active');
    contactInfo.classList.remove('active');
}
var swiper = new Swiper(".home-slider", {
    loop: true,
    grabCursor: true,
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
});

var swiper = new Swiper(".reviews-slider", {
    loop: true,
    grabCursor: true,
    spaceBetween: 20,
    breakpoints: {
        640: {
            slidesPerView: 1,
        },
        768: {
            slidesPerView: 2,
        },
        991: {
            slidesPerView: 3,
        },
    },
});

var swiper = new Swiper(".blogs-slider", {
    loop: true,
    grabCursor: true,
    spaceBetween: 20,
    breakpoints: {
        640: {
            slidesPerView: 1,
        },
        768: {
            slidesPerView: 2,
        },
        991: {
            slidesPerView: 3,
        },
    },
});

var swiper = new Swiper(".logo-slider", {
    loop: true,
    grabCursor: true,
    spaceBetween: 20,
    breakpoints: {
        450: {
            slidesPerView: 2,
        },
        640: {
            slidesPerView: 3,
        },
        768: {
            slidesPerView: 4,
        },
        1000: {
            slidesPerView: 5,
        },
    },
});
var number = ['home', 'about', 'blogs', 'cotact'];
var keys = document.getElementById('key');
var but = document.getElementById('sb');

function searchfun() {
    if (number.indexOf(Number(keys.value)) == -1) {
        document.write("<b>NOT FOUND</b>");
    } else {
        document.write("<b>the element is found at:" + number.indexOf(Number(keys.value)) + "position</b>")
    }
}
but.addEventListener('click', searchfun)