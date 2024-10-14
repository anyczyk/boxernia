export const windowSharing = () => {
    document.addEventListener("click", e => {
        const {target} = e;
        if(target.classList.contains("bsk-window-share")) {
            e.preventDefault();
            const url = target.getAttribute("href");
            window.open(url,"_blank","menubar=1,resizable=1,width=555,height=555");
        }
    });
};