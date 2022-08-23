var slideIndex = 1;

showSlidesGallery(slideIndex);

function plusSlide() {
    showSlidesGallery(slideIndex += 1);
}

function minusSlide() {
    showSlidesGallery(slideIndex -= 1);
}

function currentSlide(n) {
    showSlidesGallery(slideIndex = n);
}

function showSlidesGallery(n) {
    var i;
    var slides = document.getElementsByClassName("item");

    if (n > slides.length) {
        slideIndex = 1
    }
    if (n < 1) {
        slideIndex = slides.length
    }
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }
    slides[slideIndex - 1].style.display = "block";
}

const items = document.querySelectorAll(".item");

items.forEach(function (item) {
    item.addEventListener("touchstart", function (e) { TouchStart(e); });
    item.addEventListener("touchend", function (e) { TouchEnd(e); });
    })

var touchStart = null;
var touchPosition = null;

function TouchStart(e)
{
    touchStart = e.touches[0].clientX;
}

function TouchEnd(e)
{
    touchPosition = e.changedTouches[0].clientX;

    if (touchStart - touchPosition <= 0) {
        plusSlide()
    }
    else
        minusSlide()
}