function slideInterval() {

    const slide = document.querySelector('#carousel');
    const carousel = new bootstrap.Carousel(slide);

    let interval = setInterval(() => {
        carousel.next();
    }, 3000);

    slide.addEventListener("mouseenter", function () {
        clearInterval(interval);
    });
    slide.addEventListener("mouseleave", function () {
        interval = setInterval(() => {
            carousel.next();
        }, 3000);
    });
}

function burger() {
    const openList = document.querySelector('#open');

    const burger = document.querySelector('#burger');
    burger.addEventListener('click', function (e) {
        e.stopPropagation();
        openList.style.display = 'block';
    });

    const closeBtn = document.querySelector('#close');
    closeBtn.addEventListener('click', function (e) {
        e.stopPropagation();
        openList.style.display = 'none';
    });

    document.addEventListener('click', function (e) {
        const isClickInside = openList.contains(e.target) || burger.contains(e.target);
        if (!isClickInside) {
            openList.style.display = 'none';
        }
    });


}

burger();
slideInterval();