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

