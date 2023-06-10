import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

const observer = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
        console.log(entry);
        if(entry.isIntersecting){
            entry.target.classList.add('show');
        } else {
            entry.target.classList.remove('show');
        }
    });
});

const hiddenElements = document.querySelectorAll('.occult');
hiddenElements.forEach((element) => observer.observe(element));

window.addEventListener('scroll', () => {
    if (scrollY > 20) {
        document.querySelector('#topBtn').classList.add('opacity-100');
        document.querySelector('#topBtn').classList.remove('opacity-0');
    } else {
        document.querySelector('#topBtn').classList.remove('opacity-100');
        document.querySelector('#topBtn').classList.add('opacity-0');
    }

    activeMenuAtCurrentSection();
});

const message = document.querySelector('#message');
if(message) {
    const hidden = () => {
        setTimeout(() => {
            message.classList.add('hidden');
        }, 150);
    }

    const opacity = () => {
        message.classList.add('opacity-0');
        message.classList.remove('opacity-100');
    }

    setTimeout(() => {
        opacity();
        hidden();
    }, 5000);

    message.addEventListener('click', () => {
        opacity();
        hidden();
    });
}

const productCards = document.querySelectorAll('.product-card');

for (const productCard of productCards) {
    productCard.addEventListener('click', () => {
        const id = productCard.getAttribute('id');
        window.location = 'http://127.0.0.1:8000/produto/' + id;
    });
}
