// import Swiper from 'swiper';

export const galleryModal = () => {
    // it needs fix
    const tabInModal = (e) => {
        console.log("x:", e.target);
        if(e.key === "Tab" && e.target.classList.contains("bsk-modal-gallery__swiper-next")) {
            console.log("x");
            e.target.closest(".bsk-modal-gallery").querySelector(".bsk-modal-gallery__tab").focus();
        }
    };

    document.addEventListener("click", e => {
        const { target } = e;
        const blockImage = target.closest(".wp-block-image a");

        /* modal */
        if(blockImage && target.closest(".wp-block-gallery")) {
            e.preventDefault();
            const modalBg = document.createElement("div");
            const modal = document.createElement("div");
            modal.classList.add("bsk-modal-gallery", "modal", "fade");
            const images = target.closest(".wp-block-gallery");

            const imageItem = e.target.closest(".wp-block-image");
            const imageWrap = imageItem.parentNode;
            const indexThisImage = Array.from(imageWrap.children).indexOf(imageItem);
            console.log(indexThisImage);

            const htmlSlider = document.createElement("div");
            const imageLinks = images.querySelectorAll("a");
            images.querySelectorAll("a").forEach((linkImg, index) => {
                const caption = linkImg.parentNode.querySelector(".wp-element-caption")?.innerText;
                console.log("caption:", caption);

                const url = linkImg.getAttribute("href");
                const alt = linkImg.querySelector("img")?.getAttribute("alt");
                htmlSlider.innerHTML += `<div class="swiper-slide"><img class="bsk-modal-gallery__image" src="${url}" alt="${alt}" />
                <figcaption class="bsk-modal-gallery__caption">${index+1} / ${imageLinks.length} ${caption ? ' - ' + caption : ''}</figcaption>
            </div>`;
            });

            modal.innerHTML = `
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
              <button class="bsk-modal-gallery__tab"></button>
              <button class="bsk-modal-gallery__close btn btn-secondary" aria-label="Close modal"></button>
              <div class="modal-body">
                  <div class="swiper bsk-modal-gallery-swiper-gallery">
                    <div class="swiper-wrapper">
                        ${htmlSlider.innerHTML}
                    </div>
                    <button class="bsk-modal-gallery__swiper-prev" aria-label="Prev"></button>
                    <button class="bsk-modal-gallery__swiper-next" aria-label="Next"></button>
                  </div>
              </div>
            </div>
          </div>`;
            modalBg.classList.add("bsk-modal-gallery-bg", "modal-backdrop", "fade");
            document.body.appendChild(modalBg);
            document.body.appendChild(modal);
            document.body.classList.add("overflow-hidden","modal-open");
            setTimeout(() => {
                modalBg.classList.add("show");
                modal.classList.add("show","d-block");

                const swiperGallery = new Swiper(".bsk-modal-gallery-swiper-gallery", {
                    initialSlide: indexThisImage,
                    autoHeight: true,
                    preloadImages: true,
                    navigation: {
                        nextEl: ".bsk-modal-gallery__swiper-next",
                        prevEl: ".bsk-modal-gallery__swiper-prev",
                    },
                });

                modal.querySelector(".bsk-modal-gallery__tab").focus();

                document.addEventListener('keydown', tabInModal);
            });



        }
        else if(target.classList.contains("bsk-modal-gallery-bg")) { // only background modal
            target.classList.remove("show");
            document.body.classList.remove("overflow-hidden","modal-open");
            setTimeout(() => {
                target.remove();
            },300);
        } else if(target.closest(".bsk-modal-gallery") && (!target.matches(".modal-dialog *") || target.classList.contains("bsk-modal-gallery__close"))) { // background modal and modal
            document.body.classList.remove("overflow-hidden","modal-open");
            const bskModalBg = document.querySelector(".bsk-modal-gallery-bg");
            const bskModal = target.closest(".bsk-modal-gallery");
            bskModalBg.classList.remove("show");
            bskModal.classList.remove("show");
            setTimeout(() => {
                const swiperGalleryNode = document.querySelector(".bsk-modal-gallery-swiper-gallery");
                swiperGalleryNode.swiper.destroy();
                bskModalBg.remove();
                bskModal.remove();

                document.removeEventListener('keydown', tabInModal);
            },300);
        }
    });
};