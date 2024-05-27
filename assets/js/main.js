let title = document.querySelector('.title');
let container = document.querySelector('.main-container');
let mainMenu = document.querySelector('.main.menu-container');
let subMenu = document.querySelector('.sub.menu-container');
let mobileMenuButton = document.querySelector('.mobile-menu-button');

// Scrolling Menu
let prevScrollpos = window.scrollY;
let smallSize = window.matchMedia("(max-width: 885px)");
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

function showMenu() {
    let scrollamount = smallSize.matches ? 50 * 2 : 50;
    let currentScrollPos = window.scrollY;
    if (prevScrollpos > currentScrollPos) {
        if (mobileSize.matches) { mobileMenuButton.style.top = '50px'
        } else{
        mainMenu.style.top = "0";
        if (subMenu) { subMenu.style.top = `${scrollamount}px`; }}
    } else {
        if (mobileSize.matches) { mobileMenuButton.style.top = '0'
        } else{
        mainMenu.style.top = `-${scrollamount + 35}px`;
        if (subMenu) { subMenu.style.top = `-${scrollamount}px`; }}
    }
    prevScrollpos = currentScrollPos;
    if (window.scrollY > 5) {
        if (mobileSize.matches) {
            mobileMenuButton.classList.add('bordered'); title.classList.add('bordered');
        } else{
        mainMenu.classList.add('bordered');
        if (subMenu) { subMenu.classList.add('bordered'); }}
    } else {
        if (mobileSize.matches) {
            mobileMenuButton.classList.remove('bordered'); title.classList.remove('bordered');
        } else {
        mainMenu.classList.remove('bordered');
        if (subMenu) { subMenu.classList.remove('bordered'); }}
    }
}

window.addEventListener('scroll', debounce(showMenu));

// Close NEWS
let newsContainer = document.querySelector('.news-container');
let newsButton = document.querySelector('.news-container .button');


function closeElement(element) { element.classList.remove('shown'); }

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
if(gallery){
    let galleryImgs = document.querySelectorAll('.gallery-image');
    let closeButtons = document.querySelectorAll('.gallery-image .button');

    function showlightbox() { this.classList.add('lightbox');}
    function hidelightbox() { 
        setTimeout(() => {
            this.parentElement.classList.remove("lightbox");
        }, 50);  
    }


    galleryImgs.forEach(image => image.addEventListener('click', showlightbox));
    closeButtons.forEach(button => button.addEventListener('click', hidelightbox));
}

// MOBILE FUNCTIONS
//---arrange layout
let selection = document.querySelector('.main-menu a.active');

function moveEnd(object, to) { to.append(object); }
function insertAfter(referenceNode, newNode) {
    referenceNode.parentNode.insertBefore(newNode, referenceNode.nextSibling);
}

function changeLayout(size) {
    if (size.matches && subMenu && mainMenu) { 
        insertAfter(selection, subMenu);
    } else {
        // insertAfter(mainMenu, subMenu);
    }
}



// ---show menu
if(mobileSize.matches){
    changeLayout(mobileSize);
    mobileSize.onchange = changeLayout;

    let menuButton = document.querySelector('.mobile-menu-button');
    let menuBtnText = document.querySelector('.mobile-menu-button h2');
    function menuToggle() {
        container.classList.toggle('open');
        container.classList.contains('open') ? menuBtnText.innerHTML = 'CLOSE' : menuBtnText.innerHTML = 'MENU';
    }
    menuButton.addEventListener('click', menuToggle);
}
