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

export const blockNewsBlock = () => {
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