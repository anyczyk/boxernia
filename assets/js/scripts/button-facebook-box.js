export const buttonFacebookBox = () => {
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