'use strict';
// Blocks:
import {blockNewsBlock} from './scripts/blocks/news-block.js';
import {sliderNewsBlock} from "./scripts/blocks/slider-news-block.js";

// Generally scripts:
import {cookiesInfoBox} from "./scripts/cookies-info-box.js";
import {buttonFacebookBox} from "./scripts/button-facebook-box.js";
import {mainBarNav} from './scripts/main-bar-nav.js';
import {windowSharing} from './scripts/window-sharing.js';
import {galleryModal} from './scripts/gallery-modal.js';
import {backToTop} from './scripts/btnBackToTop.js'
import {ajaxSettings} from "./scripts/ajaxSettings.js";

mainBarNav();
galleryModal();
cookiesInfoBox();
sliderNewsBlock();
blockNewsBlock();
buttonFacebookBox();
windowSharing();
backToTop();
ajaxSettings();


/* AOS */
// AOS.init({
//     easing: 'ease-out-back',
//     duration: 1000
// });




