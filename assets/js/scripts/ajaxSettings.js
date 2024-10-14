import {blockNewsBlock} from './blocks/news-block.js';
import {sliderNewsBlock} from "./blocks/slider-news-block.js";

export const ajaxSettings = () => {
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
                                    sliderNewsBlock();
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

                    blockNewsBlock();
                    sliderNewsBlock();
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