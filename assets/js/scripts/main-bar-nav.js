export const mainBarNav = () => {
    const bskMainBar = document.querySelector(".bsk-main-bar");
    const hamburger = document.querySelector(".bsk-main-bar__hamburger");
    const btnBackToTop = document.querySelector('.bsk-btn-back-to-top');
    const hideMenu = () => {
        hamburger.classList.remove("bsk-main-bar__hamburger--active");
    };

    if(bskMainBar) {
        const bskMinBarScroll = () => {
            const scrollTop = (document.documentElement && document.documentElement.scrollTop) || document.body.scrollTop;

            if(scrollTop > 92) {
                bskMainBar.classList.add("bsk-main-bar--scroll");
                btnBackToTop.classList.add("bsk-btn-back-to-top--show");
            } else {
                bskMainBar.classList.remove("bsk-main-bar--scroll");
                btnBackToTop.classList.remove("bsk-btn-back-to-top--show");
            }
        }
        bskMinBarScroll();
        window.addEventListener("scroll", bskMinBarScroll);

        hamburger?.addEventListener("click", (e) => {
            e.target.classList.toggle("bsk-main-bar__hamburger--active");
        });

        document.addEventListener("click", (e) => {
            const eTarget = e.target;
            if(!eTarget.matches(".bsk-main-bar *") && hamburger.classList.contains("bsk-main-bar__hamburger--active")) {
                hideMenu();
            }
        });
    }

    /* Hide mobile menu by touch and mouse */
    const bskMainBarMenu = document.querySelector('.bsk-main-bar__menu');
    let isDragging = false;
    let startX = 0;

    bskMainBarMenu.addEventListener('mousedown', ({ button, clientX }) => {
        if (button === 0) {
            isDragging = true;
            startX = clientX;
        }
    });

    bskMainBarMenu.addEventListener('touchstart', ({ touches }) => {
        if (touches.length === 1) {
            isDragging = true;
            startX = touches[0].clientX;
        }
    });

    bskMainBarMenu.addEventListener('mousemove', ({ buttons, clientX }) => {
        if (isDragging && buttons === 1) {
            const distance = clientX - startX;
            if (distance >= 100) {
                hideMenu();
                isDragging = false;
            }
        }
    });

    bskMainBarMenu.addEventListener('touchmove', ({ touches }) => {
        if (isDragging && touches.length === 1) {
            const distance = touches[0].clientX - startX;
            if (distance >= 100) {
                hideMenu();
                isDragging = false;
            }
        }
    });

    ['mouseup', 'touchend'].forEach((event) => {
        bskMainBarMenu.addEventListener(event, () => isDragging = false);
    });


    btnBackToTop.addEventListener('click', () => {
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    });
};