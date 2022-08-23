<div class="promo promo__log1600-400"></div>

<article class="center singleService">

    <div class="singleService__img">
        <img class="singleService__img_imgMax" src="/images/services/<?= $category_img ?>" alt="imgPhoto"/>
    </div>

    <div class="singleService__info">
        <h3 class="fonts fonts__about fonts__about_header"><?= $category_name ?><span class="spanBlue">!!!</span></h3>
        <h4 class="fonts fonts__about fonts__about_main"><?= $category_info ?></h4>
        <?php foreach ($services as $service): ?>
        <div class="singleService__info_service">
            <i class="spanBlue check fas fa-check"></i>
            <p class="fonts fonts__about fonts__about_service-single"><?= $service->name ?> <span class="spanBlue"><?= $service->price ?></span></p>
            <button type="button"
                    class="toBasketBtn"
                    data-id="<?= $service->id ?>"
                    data-price="<?= $result = preg_replace("/[^0-9]/", '', $service->price); ?>"
                    data-name="<?= $service->name ?>"
            >
            </button>
        </div>
        <?php endforeach; ?>
        <h4 class="fonts fonts__about fonts__about_main"><?= $category_other ?><span class="spanBlue">*</span> </h4>
    </div>

    <p class="basket hidden">
        <span class="total fonts fonts__promo fonts__promo_up"></span>
        <span class="fonts fonts__promo fonts__promo_up">руб.</span>
        <button class="closeButtonBasket">X</button>
    </p>

</article>


<div class="contact center" id="contacts">
    <div id="MailDiv" class="contact__block">
        <form id="formMail"
              method="POST"
              class="contact__form">
            <div class="contact__form_blocks-3">
                <input type="hidden" id="g-recaptcha-response" name="g-recaptcha-response" />
                <label for="mail_name">
                    <input id="mail_name"
                           type="text"
                           name="mail_name"
                           class="contact__form_inputUp fonts fonts__about fonts__about_main"
                           placeholder="Напишите Ваше имя"
                           required>
                </label>
                <label for="mail_phone">
                    <input id="mail_phone"
                           type="text"
                           name="mail_phone"
                           class="contact__form_inputUp fonts fonts__about fonts__about_main"
                           placeholder="Ваш телефон"
                           required>
                </label>
                <label for="mail_email">
                    <input id="mail_email"
                           type="email"
                           name="mail_email"
                           class="contact__form_inputUp fonts fonts__about fonts__about_main"
                           placeholder="Ваша почта"
                           required>
                </label>
            </div>
            <textarea id="mail_message"
                      name="mail_message"
                      class="contact__form_block-message fonts fonts__about fonts__about_main"
                      rows="12">
                </textarea>
            <label for="submitMail">
                <input id="submitMail"
                       type="submit"
                       value="Отправить"
                       class="submit submit__input fonts fonts__link">
            </label>
        </form>
    </div>
    <div>
        <p id="MailSend" class="alertText alertText__black fonts__about_header"></p>
    </div>
</div>

<div class="map center">
    <iframe src="https://yandex.ru/map-widget/v1/?um=constructor%3A2007f9e149d6e3c51d1ac306d8782f60bcf1cd1dc124b9990e47444458c16b26&amp;source=constructor" width="100%" height="460" frameborder="0"></iframe>
</div>

<div class="footer__up">
    <div class="footer__up_img center">
        <?php foreach ($imagesLogoAuto as $imageLogoAuto): ?>
            <img src="/images/elements/logoAuto/<?= $imageLogoAuto ?>" class="footer__logoAuto" alt="logo_auto">
        <? endforeach; ?>
    </div>
</div>

<script src="/scripts/basket.js"></script>