var slideIndex = 1;

showSlidesFeedback(slideIndex);

function plusFeedback() {
    showSlidesFeedback(slideIndex += 1);
}

function minusFeedback() {
    showSlidesFeedback(slideIndex -= 1);
}

function currentSlide(n) {
    showSlidesFeedback(slideIndex = n);
}

function showSlidesFeedback(n) {
    var i;
    var sliderFeedback = document.getElementsByClassName("itemFeedback");
    console.log(sliderFeedback);
    if (n > sliderFeedback.length) {
        slideIndex = 1
    }
    if (n < 1) {
        slideIndex = sliderFeedback.length
    }
    for (i = 0; i < sliderFeedback.length; i++) {
        sliderFeedback[i].style.display = "none";
    }
    sliderFeedback[slideIndex - 1].style.display = "block";
}

const itemsFeed = document.querySelectorAll(".itemFeedback");

itemsFeed.forEach(function (itemFeed) {
    itemFeed.addEventListener("touchstart", function (e) { TouchStartFeed(e); }); //Начало касания
    itemFeed.addEventListener("touchend", function (e) { TouchEndFeed(e); }); //Движение пальцем по экрану
})

function TouchStartFeed(e)
{
    touchStart = e.touches[0].clientX;
}

function TouchEndFeed(e)
{
    touchPosition = e.changedTouches[0].clientX;

    if (touchStart - touchPosition <= 0) {
        plusFeedback()
    }
    else
        minusFeedback()
}