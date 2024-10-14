/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
/******/ 	var __webpack_modules__ = ({

/***/ "./assets/js/scripts/ajaxSettings.js":
/*!*******************************************!*\
  !*** ./assets/js/scripts/ajaxSettings.js ***!
  \*******************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "ajaxSettings": () => (/* binding */ ajaxSettings)
/* harmony export */ });
/* harmony import */ var _blocks_news_block_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./blocks/news-block.js */ "./assets/js/scripts/blocks/news-block.js");
/* harmony import */ var _blocks_slider_news_block_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./blocks/slider-news-block.js */ "./assets/js/scripts/blocks/slider-news-block.js");



const ajaxSettings = () => {
    const entryContent = document.querySelector('.entry-content');
    const homePageId = parseInt(document.body.getAttribute('data-homepage-id'));
    const siteId = parseInt(document.body.getAttribute('data-site-id'));
    const bskPartners = document.querySelector('.bsk-partners');
    const lang = (siteId === 2) ? '/en' : '';

    function loadPage(pageId, hasNewsSlug, slug, clickInMainMenu) {
        const postType = lang + (hasNewsSlug ? '/wp-json/wp/v2/posts/' : '/wp-json/wp/v2/pages/');

        fetch(postType + pageId)
            .then(response => response.text())
            .then(html => {

                // console.log('pageId::::',pageId);
                const wpAdmin = document.querySelector('#wpadminbar');
                if(wpAdmin) {
                    const wpAdminBarEdit = wpAdmin.querySelector('#wp-admin-bar-edit a');
                    if(wpAdminBarEdit) {
                        const oldUrl = wpAdminBarEdit.getAttribute('href',);
                        const post = oldUrl.match(/post=([^&]+)/)[1];
                        const newUrl = oldUrl.replace("post=" + post, "post=" + pageId);
                        wpAdminBarEdit.setAttribute('href', newUrl);
                        if(hasNewsSlug) {
                            wpAdminBarEdit.innerText = 'Edytuj wpis';
                        } else {
                            wpAdminBarEdit.innerText = 'Edytuj stronę';
                        }
                    }
                }

                const obj = JSON.parse(html);
                // console.log('o:',obj);

                let content = obj.content.rendered;
                const title = obj.title.rendered;

                const pageContent = document.querySelector('.entry-content');

                const plainContent = content.replace(/(<([^>]+)>)/gi, "");
                const shortContent = (obj.excerpt.rendered ? obj.excerpt.rendered : plainContent.substring(0, 80)).trim();
                const shortContentFormat = (shortContent ? shortContent :  'BSK Boxernia Serca Krakowa - treningi bokserkie Kraków').replace(/(<([^>]+)>)/gi, "");
                const shortContentForUrl = encodeURIComponent(shortContentFormat);

                document.querySelector('[property="og:title"]').setAttribute('content',title);
                document.querySelector('[property="og:description"]').setAttribute('content',shortContentFormat);

                if(hasNewsSlug) { // postType post
                    const inputDate = new Date(obj.date);
                    // const daysOfWeek = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
                    // const months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];

                    const daysOfWeek = ['niedziela', 'poniedziałek', 'wtorek', 'środa', 'czwartek', 'piątek', 'sobota'];
                    const months = ['styczeń', 'luty', 'marzec', 'kwiecień', 'maj', 'czerwiec', 'lipiec', 'sierpień', 'wrzesień', 'październik', 'listopad', 'grudzień'];

                    const dayOfWeek = daysOfWeek[inputDate.getDay()];
                    const dayOfMonth = inputDate.getDate();
                    const month = months[inputDate.getMonth()];
                    const year = inputDate.getFullYear();
                    const outputDate = `${dayOfWeek}, ${month} ${dayOfMonth}, ${year}`;
                    const imageId = obj?.featured_media;
                    const themeUrl = document.body.getAttribute("data-theme-url");

                    const titleForUrl = encodeURIComponent(title);
                    const linkForUrl = encodeURIComponent(obj.link);
                    let imageUrlForUrl = encodeURIComponent(themeUrl + '/assets/images/logo6.png');

                    if(bskPartners) {
                        bskPartners.classList?.remove('bg-color-light-sand');
                        bskPartners.classList?.add('bg-color-white');
                    }

                    fetch(imageId ? lang + "/wp-json/wp/v2/media/" + imageId : themeUrl + '/assets/js/scripts/ajaxSettingsFix.json')
                        .then(response => response.json())
                        .then(image => {
                            const imageUrl = image.source_url;
                            if(imageUrl) {
                                document.querySelector('[property="og:image"]').setAttribute('content',imageUrl);
                                imageUrlForUrl = encodeURIComponent(imageUrl);
                            } else {
                                document.querySelector('[property="og:image"]').setAttribute('content',themeUrl + '/assets/images/logo6.png');
                            }

                            content = `
                                <div class="bsk-banner bsk-banner--small py-2">
                                    ${ imageUrl ? `<img src="${imageUrl}" class="bsk-banner__image wp-post-image" alt="" decoding="async">` : ''}
                                    <div class="container container--768 text-center py-2">
                                        <h1 class="bsk-banner__title">
                                           ${title} </h1>
                                        <p><span>${outputDate}</span></p>
                                    </div>
                                </div>
                                <section class="bsk-default-content bg-color-white py-0 py-sm-5">
                                    <div class="container px-0 px-sm-3">
                                        <div class="bsk-default-border px-3 px-lg-0 py-3 py-lg-5 bg-color-light-sand">
                                            <div class="container--768 mx-auto">
                                                <nav class="bsk-default-content__social-sharing">
                                                    <ul>
                                                        <li class="bsk-ico-facebook">
                                                            <a class="bsk-window-share" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=${linkForUrl}&amp;title=${titleForUrl}&amp;description=${shortContentForUrl}&amp;picture=${imageUrlForUrl}" aria-label="Udostępnij post na Facebook" title="Udostępnij post na Facebook"></a>
                                                        </li>
                                                    </ul>
                                                </nav>
                                                ${content}
                                            </div>
                                        </div>
                                    </div>
                                </section>`
                            pageContent.innerHTML = content;
                            document.querySelector('title').innerHTML = obj.title.rendered;
                            const dataSliderForSingleId = document.body.getAttribute('data-slider-for-single-id');
                            fetch(lang + '/wp-json/wp/v2/elements/' + dataSliderForSingleId)
                                .then(response => response.text())
                                .then(html => {
                                    const obj = JSON.parse(html);
                                    const content = obj.content.rendered;
                                    pageContent.innerHTML += content;
                                    (0,_blocks_slider_news_block_js__WEBPACK_IMPORTED_MODULE_1__.sliderNewsBlock)();
                                    document.body.classList.remove('entry-content-loading');
                                });
                        });
                } else {
                    pageContent.innerHTML = content;
                    document.querySelector('title').innerHTML = obj.title.rendered;

                    if(bskPartners) {
                        bskPartners.classList?.remove('bg-color-white');
                        bskPartners.classList?.add('bg-color-light-sand');
                    }

                    (0,_blocks_news_block_js__WEBPACK_IMPORTED_MODULE_0__.blockNewsBlock)();
                    (0,_blocks_slider_news_block_js__WEBPACK_IMPORTED_MODULE_1__.sliderNewsBlock)();
                    document.body.classList.remove('entry-content-loading');
                }

                const wpcf7Forms = entryContent.querySelectorAll('.wpcf7-form');

                wpcf7Forms?.forEach(function(e) {
                    return wpcf7.init(e);
                });

                if(!clickInMainMenu) {
                    const ajaxMmenu =  document.querySelectorAll('.ajax-menu-main a');

                    ajaxMmenu.forEach(link => {
                        if(slug) {
                            if(link.getAttribute('href').includes(slug)) {
                                link.closest('.menu-item')?.classList.add('current-menu-item', 'current_page_item');
                            }
                        } else {
                            ajaxMmenu[0].closest('.menu-item')?.classList.add('current-menu-item', 'current_page_item');
                        }
                    });
                }
            }).catch(error => console.error(error));
    }

    document.addEventListener('click', async e => {
        const {target} = e;
        const tragetHref = target.closest('[href]');
        if ((target.closest('.ajax-menu') || target.closest('.ajax-link')) && tragetHref && tragetHref.getAttribute('href')) {
            const url = tragetHref.getAttribute('href');
            const checkUrl = new URL(url);
            if (checkUrl.hostname === window.location.hostname) {
                e.preventDefault();
                document.body.classList.add('entry-content-loading');
                document.body.click();
                document.querySelector('.bsk-btn-back-to-top--show')?.click();

                const currentMenuItem = document.querySelector(".current-menu-item");
                currentMenuItem?.classList.remove('current-menu-item', 'current_page_item');

                let clickInMainMenu = false;
                if(tragetHref.closest('.ajax-menu-main')) {
                    // console.log("click in main menu");
                    tragetHref.closest('.menu-item').classList.add('current-menu-item', 'current_page_item');
                    clickInMainMenu = true;
                }

                const segments = url.split("/");
                const hasNewsSlug = segments.some((segment) => segment.includes("news"));
                const endPath = segments.slice(3).join('/');

                const pathArray = url.split('/').filter(part => part !== '');
                // console.log("x:",pathArray.length);
                let pageId = homePageId; // homepage
                let slug = false;
                if (pathArray.length > (lang ? 3 : 2)) {
                    slug = pathArray[pathArray.length - 1];
                    // console.log('slug', slug);
                    let page;
                    if(!hasNewsSlug) {
                        page = await fetch(`${lang}/wp-json/wp/v2/pages?slug=${slug}`).then(response => response.json());
                    } else {
                        page = await fetch(`${lang}/wp-json/wp/v2/posts?slug=${slug}`).then(response => response.json());
                        // console.log('page[0].id:', page[0].id);
                    }
                    console.log('page: ',page);
                    pageId = page[0].id;
                    history.pushState(null, null, `/${endPath}`);
                } else {
                    history.pushState(null, null, lang ? lang : '/');
                }

                loadPage(pageId, hasNewsSlug, slug, clickInMainMenu);
            }
        }
    });

    window.addEventListener('popstate', async (e) => {
        const url = document.location.href;
        const segments = url.split("/");
        const hasNewsSlug = segments.some((segment) => segment.includes("news"));

        const pathArray = url.split('/').filter(part => part !== '');
        const currentMenuItem = document.querySelector(".current-menu-item");
        currentMenuItem?.classList.remove('current-menu-item', 'current_page_item');

        let pageId = homePageId; // homepage

        let slug = false;
        if (pathArray.length > (lang ? 3 : 2)) {
            slug = pathArray[pathArray.length - 1];
            // console.log('slug', slug);
            let page;
            if(!hasNewsSlug) {
                page = await fetch(`${lang}/wp-json/wp/v2/pages?slug=${slug}`).then(response => response.json());
            } else {
                page = await fetch(`${lang}/wp-json/wp/v2/posts?slug=${slug}`).then(response => response.json());
                // console.log('page[0].id:', page[0].id);
            }
            pageId = page[0].id;
        }

        e.preventDefault();
        loadPage(pageId, hasNewsSlug, slug);
    });

};

/***/ }),

/***/ "./assets/js/scripts/blocks/news-block.js":
/*!************************************************!*\
  !*** ./assets/js/scripts/blocks/news-block.js ***!
  \************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "blockNewsBlock": () => (/* binding */ blockNewsBlock)
/* harmony export */ });
/* News block */
const htmlElements = (post, image, elements) => {
    const postDate = post.date;
    const options = {weekday: 'long', year: 'numeric', month: 'long', day: 'numeric'};
    const dateObj = new Date(postDate);
    const dateStr = dateObj.toLocaleDateString('pl-PL', options);
    return `
                <div class="bsk-tile__image ${elements.filterSepia}">
                  ${image ? '<img src="' + image + '" alt="BSK Boxernia">' : '<img src="' + window.location.origin + '/wp-content/themes/boxernia/assets/images/bsk.webp" alt="BSK Boxernia">'}
                </div>
                <div class="bsk-tile__text p-4">
                  <${elements.newsTagTitleTile} class="bsk-tile__title-slide">${post.title.rendered}</${elements.newsTagTitleTile}>
                  <p class="bsk-tile__date"><span>${dateStr}</span></p>
                  ${post.excerpt ? '<p class="bsk-tile__description">' + post.excerpt.rendered.replace(/<[^>]+>/g, '') + '</p>' : '<p class="bsk-tile__description">' + post.content.rendered.replace(/<[^>]+>/g, '') + '</p>'}
                  <a class="bsk-tile__btn bsk-btn-1 mt-auto mx-auto ajax-link" href="${post.link}">Czytaj więcej</a>
                </div>
            `
};

const loadAjax = (type, target, isLoading, page, elements, postsOrder, dataPostsPerPages) => {
    if (!isLoading) {
        isLoading = true;
        target.innerHTML = 'Wczytywanie...';

        if(type === 'load-start-asc') {
            elements.list.innerHTML = '';
        }

        const xhr = new XMLHttpRequest();
        xhr.onreadystatechange = () => {
            if (xhr.readyState === 4 && xhr.status === 200) {
                const data = JSON.parse(xhr.responseText);

                data.forEach(post => {
                    const li = document.createElement('li');
                    li.classList.add('bsk-tile', 'g-col-12', 'g-col-sm-6', 'g-col-md-4');

                    let image = false;
                    const mediaId = post.featured_media;
                    if (mediaId) {
                        const mediaEndpoint = post._links['wp:featuredmedia'][0].href;

                        fetch(mediaEndpoint)
                            .then(response => response.json())
                            .then(data => {
                                const thumbnailUrl = data.source_url;
                                console.log("post", post);
                                image = thumbnailUrl;
                                li.innerHTML = htmlElements(post, image, elements);
                            })
                            .catch(error => console.error(error));
                    } else {
                        li.innerHTML = htmlElements(post, image, elements);
                    }

                    elements.list.appendChild(li);
                });

                isLoading = false;

                if(type === 'load-start-asc') {
                    target.innerHTML = postsOrder === 'asc' ? `Wczytaj posty od najnowszego` : `Wczytaj posty od najstarszego`;
                } else if(type === 'laod-more') {
                    target.innerHTML = `Wczytaj kolejne max ${dataPostsPerPages} postów`;
                }
            }
        };

        const siteId = parseInt(document.body.getAttribute('data-site-id'));
        const lang = (siteId === 2) ? '/en' : '';

        xhr.open('GET', `${window.location.origin}${lang}/wp-json/wp/v2/posts?per_page=${dataPostsPerPages}&order=${postsOrder}&page=${page}`);
        xhr.send();
    }
};

const blockNewsBlock = () => {
    const bskNewsAll = document.querySelectorAll('.bsk-news');
    if(bskNewsAll.length) {
        console.log("blockNewsBlock loaded");
        bskNewsAll.forEach(bskNews => {
            let page = 2;
            let isLoading = false;
            let postsOrder = bskNews.getAttribute("data-posts-order").toLowerCase();
            const dataPostsPerPages = bskNews.getAttribute("data-posts-per-pages");
            const dataCountPosts = bskNews.getAttribute("data-count-posts");
            const btnLoadMore = bskNews.querySelector(".bsk-tile__btn-load-more");
            const elements = {
                list: bskNews.querySelector('.bsk-news__list'),
                filterSepia: bskNews.getAttribute("data-filter-sepia") ? 'filter-sepia' : '',
                newsTagTitleTile: bskNews.getAttribute("data-tag-title-tile") ? bskNews.getAttribute("data-tag-title-tile") : 'h3',
            };

            bskNews.addEventListener('click', function (e) {
                const {target} = e;
                if(target.classList.contains("bsk-tile__btn-load-more")) {
                    loadAjax('laod-more', target, isLoading, page, elements, postsOrder, dataPostsPerPages);
                    bskNews.querySelector(".bsk-news__count-posts-show").innerText = page * dataPostsPerPages;
                    page++;
                    if((page*dataPostsPerPages - dataPostsPerPages) >= dataCountPosts) {
                        btnLoadMore.setAttribute("disabled", true);
                        bskNews.querySelector(".bsk-news__count-posts-show").innerText = dataCountPosts;
                        // btnLoadMore.classList.add("d-none");
                    }
                } else if(target.classList.contains("bsk-tile__btn-load-start")) {
                    if(postsOrder === 'asc') {
                        postsOrder = 'desc';
                    } else {
                        postsOrder = 'asc';
                    }
                    loadAjax('load-start-asc', target, isLoading, 1, elements, postsOrder, dataPostsPerPages);
                    bskNews.querySelector(".bsk-news__count-posts-show").innerText = dataPostsPerPages;
                    page=2;
                    if(page*dataPostsPerPages >= dataCountPosts) {
                        // btnLoadMore.classList.add("d-none");
                        btnLoadMore.setAttribute("disabled",true);
                    } else {
                        // btnLoadMore.classList.remove("d-none");
                        btnLoadMore.removeAttribute("disabled");
                    }
                }
            });
        });
    }
}

/***/ }),

/***/ "./assets/js/scripts/blocks/slider-news-block.js":
/*!*******************************************************!*\
  !*** ./assets/js/scripts/blocks/slider-news-block.js ***!
  \*******************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "sliderNewsBlock": () => (/* binding */ sliderNewsBlock)
/* harmony export */ });
// import Swiper from 'swiper';

const sliderNewsBlock = () => {
    const bskSlider = document.querySelectorAll(".bsk-slider");
    if(bskSlider.length) {
        console.log("sliderNewsBlock loaded");
        const swiper = new Swiper(".bsk-slider__swiper", {
            slidesPerView: 1,
            spaceBetween: 32,
            loop: false,
            centeredSlides: false,
            slideVisibleClass: true,
            preloadImages: true,
            navigation: {
                prevEl: '.bsk-slider__swiper-prev',
                nextEl: '.bsk-slider__swiper-next',
            },
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            breakpoints: {
                576: {
                    slidesPerView: 2,
                },
                992: {
                    slidesPerView: 3,
                },
            }
        })
    }
};

/***/ }),

/***/ "./assets/js/scripts/btnBackToTop.js":
/*!*******************************************!*\
  !*** ./assets/js/scripts/btnBackToTop.js ***!
  \*******************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "backToTop": () => (/* binding */ backToTop)
/* harmony export */ });
const backToTop = () => {

};

/***/ }),

/***/ "./assets/js/scripts/button-facebook-box.js":
/*!**************************************************!*\
  !*** ./assets/js/scripts/button-facebook-box.js ***!
  \**************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "buttonFacebookBox": () => (/* binding */ buttonFacebookBox)
/* harmony export */ });
const buttonFacebookBox = () => {
    document.addEventListener("click", e => {
        const {target} = e;
        if(target.closest(".bsk-facebook-box__button")) {
            target.closest(".bsk-facebook-box").classList.toggle("bsk-facebook-box--active");
        }
        const bskFacebookBoxActive = document.querySelector(".bsk-facebook-box--active");
        if(bskFacebookBoxActive && !target.matches(".bsk-facebook-box *")) {
            bskFacebookBoxActive.classList.remove("bsk-facebook-box--active");
        }
    });

    /* Facebook box */
    (function(d, s, id) {
        let js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/pl_PL/sdk.js#xfbml=1&appId=150620281795445&version=v2.0";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
};

/***/ }),

/***/ "./assets/js/scripts/cookies-info-box.js":
/*!***********************************************!*\
  !*** ./assets/js/scripts/cookies-info-box.js ***!
  \***********************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "cookiesInfoBox": () => (/* binding */ cookiesInfoBox)
/* harmony export */ });
/* harmony import */ var _utils_functions_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../utils/functions.js */ "./assets/js/utils/functions.js");

const cookiesInfoBox = () => {
    /* Cookies bar */
    const body = document.body;
    const bskCookiesBanner = document.querySelector('.bsk-cookies-banner');
    if (!(0,_utils_functions_js__WEBPACK_IMPORTED_MODULE_0__.getCookie)("cookiesAccepted")) {
        bskCookiesBanner.classList.add("d-flex");
    } else {
        body.classList.add("bsk-cookies-accept");
    }

    document.addEventListener("click", e => {
        const { target } = e;
        /* Cookies info box */
        if(target.classList.contains("bsk-cookies-banner__accept-cookies-btn")) {
            (0,_utils_functions_js__WEBPACK_IMPORTED_MODULE_0__.setCookie)("cookiesAccepted", true, 365);
            bskCookiesBanner.classList.add("d-none");
            body.classList.add("bsk-cookies-accept");
        } else if(target.classList.contains("bsk-cookies-banner__reject-cookies-btn")) {
            bskCookiesBanner.classList.add("d-none");
            body.classList.add("bsk-cookies-reject");
        }
    });

};

/***/ }),

/***/ "./assets/js/scripts/gallery-modal.js":
/*!********************************************!*\
  !*** ./assets/js/scripts/gallery-modal.js ***!
  \********************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "galleryModal": () => (/* binding */ galleryModal)
/* harmony export */ });
// import Swiper from 'swiper';

const galleryModal = () => {
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

/***/ }),

/***/ "./assets/js/scripts/main-bar-nav.js":
/*!*******************************************!*\
  !*** ./assets/js/scripts/main-bar-nav.js ***!
  \*******************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "mainBarNav": () => (/* binding */ mainBarNav)
/* harmony export */ });
const mainBarNav = () => {
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

/***/ }),

/***/ "./assets/js/scripts/window-sharing.js":
/*!*********************************************!*\
  !*** ./assets/js/scripts/window-sharing.js ***!
  \*********************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "windowSharing": () => (/* binding */ windowSharing)
/* harmony export */ });
const windowSharing = () => {
    document.addEventListener("click", e => {
        const {target} = e;
        if(target.classList.contains("bsk-window-share")) {
            e.preventDefault();
            const url = target.getAttribute("href");
            window.open(url,"_blank","menubar=1,resizable=1,width=555,height=555");
        }
    });
};

/***/ }),

/***/ "./assets/js/utils/functions.js":
/*!**************************************!*\
  !*** ./assets/js/utils/functions.js ***!
  \**************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "debounce": () => (/* binding */ debounce),
/* harmony export */   "getCookie": () => (/* binding */ getCookie),
/* harmony export */   "setCookie": () => (/* binding */ setCookie)
/* harmony export */ });
/* Global functions */

const debounce = (func, wait, immediate) => {
    let timeout;
    return function () {
        const context = this,
            args = arguments
        const later = function () {
            timeout = null
            if (!immediate) func.apply(context, args)
        }
        const callNow = immediate && !timeout
        clearTimeout(timeout)
        timeout = setTimeout(later, wait)
        if (callNow) func.apply(context, args)
    }
}


const setCookie = (name, value, days) => {
    let expires = "";
    if (days) {
        let date = new Date();
        date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
        expires = `; expires=${date.toUTCString()}`;
    }
    document.cookie = `${name}=${value || ""}${expires}; path=/`;
}

const getCookie = (name) => {
    const nameEQ = `${name}=`;
    const ca = document.cookie.split(';');
    for (let i = 0; i < ca.length; i++) {
        let c = ca[i];
        while (c.charAt(0) === ' ') {
            c = c.substring(1, c.length);
        }
        if (c.indexOf(nameEQ) === 0) {
            return c.substring(nameEQ.length, c.length);
        }
    }
    return null;
}

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	// The module cache
/******/ 	var __webpack_module_cache__ = {};
/******/ 	
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/ 		// Check if module is in cache
/******/ 		var cachedModule = __webpack_module_cache__[moduleId];
/******/ 		if (cachedModule !== undefined) {
/******/ 			return cachedModule.exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = __webpack_module_cache__[moduleId] = {
/******/ 			// no module.id needed
/******/ 			// no module.loaded needed
/******/ 			exports: {}
/******/ 		};
/******/ 	
/******/ 		// Execute the module function
/******/ 		__webpack_modules__[moduleId](module, module.exports, __webpack_require__);
/******/ 	
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/ 	
/************************************************************************/
/******/ 	/* webpack/runtime/define property getters */
/******/ 	(() => {
/******/ 		// define getter functions for harmony exports
/******/ 		__webpack_require__.d = (exports, definition) => {
/******/ 			for(var key in definition) {
/******/ 				if(__webpack_require__.o(definition, key) && !__webpack_require__.o(exports, key)) {
/******/ 					Object.defineProperty(exports, key, { enumerable: true, get: definition[key] });
/******/ 				}
/******/ 			}
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/hasOwnProperty shorthand */
/******/ 	(() => {
/******/ 		__webpack_require__.o = (obj, prop) => (Object.prototype.hasOwnProperty.call(obj, prop))
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/make namespace object */
/******/ 	(() => {
/******/ 		// define __esModule on exports
/******/ 		__webpack_require__.r = (exports) => {
/******/ 			if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 				Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 			}
/******/ 			Object.defineProperty(exports, '__esModule', { value: true });
/******/ 		};
/******/ 	})();
/******/ 	
/************************************************************************/
var __webpack_exports__ = {};
// This entry need to be wrapped in an IIFE because it need to be isolated against other modules in the chunk.
(() => {
/*!******************************!*\
  !*** ./assets/js/scripts.js ***!
  \******************************/
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _scripts_blocks_news_block_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./scripts/blocks/news-block.js */ "./assets/js/scripts/blocks/news-block.js");
/* harmony import */ var _scripts_blocks_slider_news_block_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./scripts/blocks/slider-news-block.js */ "./assets/js/scripts/blocks/slider-news-block.js");
/* harmony import */ var _scripts_cookies_info_box_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./scripts/cookies-info-box.js */ "./assets/js/scripts/cookies-info-box.js");
/* harmony import */ var _scripts_button_facebook_box_js__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./scripts/button-facebook-box.js */ "./assets/js/scripts/button-facebook-box.js");
/* harmony import */ var _scripts_main_bar_nav_js__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ./scripts/main-bar-nav.js */ "./assets/js/scripts/main-bar-nav.js");
/* harmony import */ var _scripts_window_sharing_js__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! ./scripts/window-sharing.js */ "./assets/js/scripts/window-sharing.js");
/* harmony import */ var _scripts_gallery_modal_js__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! ./scripts/gallery-modal.js */ "./assets/js/scripts/gallery-modal.js");
/* harmony import */ var _scripts_btnBackToTop_js__WEBPACK_IMPORTED_MODULE_7__ = __webpack_require__(/*! ./scripts/btnBackToTop.js */ "./assets/js/scripts/btnBackToTop.js");
/* harmony import */ var _scripts_ajaxSettings_js__WEBPACK_IMPORTED_MODULE_8__ = __webpack_require__(/*! ./scripts/ajaxSettings.js */ "./assets/js/scripts/ajaxSettings.js");

// Blocks:



// Generally scripts:








(0,_scripts_main_bar_nav_js__WEBPACK_IMPORTED_MODULE_4__.mainBarNav)();
(0,_scripts_gallery_modal_js__WEBPACK_IMPORTED_MODULE_6__.galleryModal)();
(0,_scripts_cookies_info_box_js__WEBPACK_IMPORTED_MODULE_2__.cookiesInfoBox)();
(0,_scripts_blocks_slider_news_block_js__WEBPACK_IMPORTED_MODULE_1__.sliderNewsBlock)();
(0,_scripts_blocks_news_block_js__WEBPACK_IMPORTED_MODULE_0__.blockNewsBlock)();
(0,_scripts_button_facebook_box_js__WEBPACK_IMPORTED_MODULE_3__.buttonFacebookBox)();
(0,_scripts_window_sharing_js__WEBPACK_IMPORTED_MODULE_5__.windowSharing)();
(0,_scripts_btnBackToTop_js__WEBPACK_IMPORTED_MODULE_7__.backToTop)();
(0,_scripts_ajaxSettings_js__WEBPACK_IMPORTED_MODULE_8__.ajaxSettings)();


/* AOS */
// AOS.init({
//     easing: 'ease-out-back',
//     duration: 1000
// });





})();

/******/ })()
;
//# sourceMappingURL=scripts.js.map