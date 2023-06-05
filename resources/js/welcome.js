const sections = document.querySelectorAll('section[id]')
function activeMenuAtCurrentSection() {
    const checkpoint = window.scrollY + (window.innerHeight / 8) * 4

    for( const section of sections) {
        const sectionTop = section.offsetTop
        const sectionHeight = section.offsetHeight
        const sectionId = section.getAttribute('id')

        const checkpointStart = checkpoint >= sectionTop
        const checkpointEnd = checkpoint <= sectionTop + sectionHeight

        if(checkpointStart && checkpointEnd){
            document
                .querySelector('nav div ul li a[href*=' + sectionId + ']')
                .classList.add('active')
        } else{
            document
                .querySelector('nav div ul li a[href*=' + sectionId + ']')
                .classList.remove('active')
        }
    }
}

window.addEventListener('scroll', () => {

    if (scrollY > 200) {
        document.querySelector('nav').classList.add('fixed');
    } else {
        document.querySelector('nav').classList.remove('fixed');
    }

    activeMenuAtCurrentSection();
});

