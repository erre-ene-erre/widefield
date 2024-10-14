let title = document.querySelector('.title');
let container = document.querySelector('.main-container');
let mainMenu = document.querySelector('.main.menu-container');
let mainMenuEl = document.querySelector('.main.menu-container .main-menu');
let subMenu = document.querySelector('.sub.menu-container');
let mobileMenuButton = document.querySelector('.mobile-menu-button');

// footer border
let content = document.querySelector('.content');
let footer = document.querySelector('.footer');
if (content.classList.contains('home')){}else{
    setTimeout(() => {
        console.log(content.offsetHeight, window.innerHeight);
        if (content.offsetHeight >= window.innerHeight) {
            console.log('taller');
        } else {
            footer.style.borderTop = 'solid 2px black'
        }
    }, 500);
}

// Scrolling Menu
let prevScrollpos = window.scrollY;
let smallSize = window.matchMedia("(max-width: 935px)");
// let mediumSize = window.matchMedia("(max-width: 885px)");
let mobileSize = window.matchMedia("(max-width: 805px)");

function debounce(func, wait = 10, immediate = true) {
    var timeout;
    return function () {
        var context = this, args = arguments;
        var later = function () {
            timeout = null;
            if (!immediate) func.apply(context, args);
        };
        var callNow = immediate && !timeout;
        clearTimeout(timeout);
        timeout = setTimeout(later, wait);
        if (callNow) func.apply(context, args);
    };
}

let scrollamount = smallSize.matches ? 95 : 50;
let lastScrollTop = window.scrollY || document.documentElement.scrollTop;

function showMenu() {
    let scrollTop = window.scrollY || document.documentElement.scrollTop;
    if (scrollTop > lastScrollTop && lastScrollTop > 0) {
        if (mobileSize.matches) {
            mobileMenuButton.style.top = '0'
        } else {
            mainMenu.style.top = `-${scrollamount + 35}px`;
            if (subMenu) { subMenu.style.top = `-${scrollamount}px`; }
        }
    } else if (scrollTop < lastScrollTop || lastScrollTop == -1) {
        if (mobileSize.matches) {
            mobileMenuButton.style.top = '50px'
        } else {
            mainMenu.style.top = "0";
            if (subMenu) { subMenu.style.top = `${scrollamount}px`; }
        }
    }
    lastScrollTop = scrollTop;
}

if(mainMenu){
window.addEventListener('scroll', debounce(showMenu));}

//read more
let readMore = document.querySelector('.read-more');
let moreInfo = document.querySelector('.more-info');

if(readMore){
readMore.addEventListener('click', () => {
    moreInfo.classList.toggle('visible');
    readMore.innerText = moreInfo.classList.contains('visible') ? 'Close Text' : '(...) read more';
});
}

// Close NEWS
let newsContainer = document.querySelector('.news-container');
let newsButton = document.querySelector('.news-container .button');

function closeElement(element) { element.classList.remove('shown');}

// GALLERY BUTTONS

let gallery = document.querySelector('.gallery');
let galleryImgs = document.querySelectorAll('.gallery-image');
let thisImg = document.querySelector('.shown');
let nextImg;
let controller = document.querySelector('.gallery-controllers');

if(thisImg){twoImgDisplay();}
if(controller){
    hideController();
    [...controller.children].forEach(button => button.addEventListener('click', imageChange));
}

function twoImgDisplay() {
    if (thisImg.nextElementSibling.dataset.order == 'second') {
        thisImg.nextElementSibling.classList.add('shown');
        thisImg = thisImg.nextElementSibling;
    } //case if this image is second
    if (thisImg.dataset.order == 'second') {
        thisImg.previousElementSibling.classList.add('shown');
    }
}

function imageChange() {
    if (this.classList.contains('prev')){
        if(thisImg.dataset.order =='second'){
            nextImg = thisImg.previousElementSibling.previousElementSibling;
        } else { nextImg = thisImg.previousElementSibling; }
    } else{ //next
        nextImg = thisImg.nextElementSibling;
    }
    if(!nextImg || nextImg.classList.contains('gallery-controllers')){
        if (this.classList.contains('prev')) {
            nextImg = document.querySelector('.gallery-image:last-of-type');
        }else{ //next
            nextImg = document.querySelector('.gallery-image:first-of-type');
        }
    } 
    galleryImgs.forEach(img => img.classList.remove('shown'));
    thisImg = nextImg;
    thisImg.classList.add('shown');
    twoImgDisplay();
}

function hideController(){
    if(galleryImgs.length < 2){ controller.style.display = 'none';}
    if (galleryImgs.length == 2 && thisImg.dataset.order == 'second') { controller.style.display = 'none'; }
}
// lightbox gallery
if(document.querySelector('.content.media-file')){
    let fig = document.querySelector('figure.lightbox');
    fig.addEventListener('click', () => {
        fig.classList.toggle('zoomed');
    });
}
// gray highlight selection 

if (document.querySelector('.content.project-collection')){
    let flexContainer = document.querySelector('.content.project-collection');
    let projects = document.querySelectorAll('.project-collection .item');
    expandLast(flexContainer);
    window.addEventListener('load', function () {
        if (!mobileSize.matches) {setHeight(projects);}
    });
}

function expandLast(object) {
    let containerWidth = object.offsetWidth
    let lineWidth = 0;
    if (!mobileSize.matches) {
    for (let i = 0; i < object.children.length; i++){
        object.children[i].classList.remove("expand");
        lineWidth = lineWidth + object.children[i].offsetWidth;
        if(lineWidth > containerWidth){
            object.children[i-1].classList.add("expand");
            lineWidth = 0;
        }
    }
    }
}

function setHeight(items){
    let maxHeight = 0;
    items.forEach(item => {
        let itemHeight = item.offsetHeight;
        if (itemHeight > maxHeight) {
            maxHeight = itemHeight;
        }
    });

    // Set all items to the max height
    items.forEach(item => {
        item.style.height = maxHeight + 'px';
    });
}


// MOBILE FUNCTIONS
//---arrange layout
let selection = document.querySelector('.main-menu a.active');
let menuButton = document.querySelector('.mobile-menu-button');
let menuBtnText = document.querySelector('.mobile-menu-button h1');
let inserted = false;

function changeLayout(size) {
    if (size.matches && subMenu && mainMenu) { 
        if(!inserted){
            selection.after(subMenu.querySelector('.sub-menu'));
            inserted = true;
        }
    } else{
        if(inserted){
            subMenu.appendChild(document.querySelector('.sub-menu'));
            inserted = false;
        }
    }
}
menuButton.addEventListener('click', menuToggle);
function menuToggle() {
    container.classList.toggle('open');
    container.classList.contains('open') ? menuBtnText.innerHTML = 'CLOSE' : menuBtnText.innerHTML = 'MENU';
}
changeLayout(mobileSize);
mobileSize.addEventListener('change', changeLayout);

// RESIZE EVENT

window.addEventListener('resize', () => {
    changeLayout(mobileSize);
    scrollamount = smallSize.matches ? 95 : 50;
    if (document.querySelector('.content.project-collection')){
        let flexContainer = document.querySelector('.content.project-collection');
        let projects = document.querySelectorAll('.project-collection .item');
        expandLast(flexContainer);
        if (!mobileSize.matches) { 
            setHeight(projects); 
        }
        // setHeight(projects);
    }
// if (document.querySelector('.content.project-collection')) {
//     let projects = document.querySelectorAll('.project-collection .item');
//     window.addEventListener('load', function () {
//         if (!mobileSize.matches) { setHeight(projects); }
//     });
// }
});

document.addEventListener("DOMContentLoaded", function () {
    if (!sessionStorage.getItem('titleAnimationPlayed') && !mobileSize.matches) {
        title.classList.add('animate-title');
        sessionStorage.setItem('titleAnimationPlayed', 'true');
    }
});