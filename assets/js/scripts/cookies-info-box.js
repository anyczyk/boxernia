import {setCookie, getCookie} from '../utils/functions.js';
export const cookiesInfoBox = () => {
    /* Cookies bar */
    const body = document.body;
    const bskCookiesBanner = document.querySelector('.bsk-cookies-banner');
    if (!getCookie("cookiesAccepted")) {
        bskCookiesBanner.classList.add("d-flex");
    } else {
        body.classList.add("bsk-cookies-accept");
    }

    document.addEventListener("click", e => {
        const { target } = e;
        /* Cookies info box */
        if(target.classList.contains("bsk-cookies-banner__accept-cookies-btn")) {
            setCookie("cookiesAccepted", true, 365);
            bskCookiesBanner.classList.add("d-none");
            body.classList.add("bsk-cookies-accept");
        } else if(target.classList.contains("bsk-cookies-banner__reject-cookies-btn")) {
            bskCookiesBanner.classList.add("d-none");
            body.classList.add("bsk-cookies-reject");
        }
    });

};