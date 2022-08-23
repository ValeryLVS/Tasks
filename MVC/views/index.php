<article class="promo promo__one">
    <div class="promo promo__text center">
        <h2 class="promo__text_up fonts fonts__promo fonts__promo_up">Спец<span class="spanBlue">Авто</span> Регион</h2>
        <h3 class="promo__text_down fonts fonts__promo fonts__promo_down">ремонт легковых автомобилей</h3>
        <h4 class="promo__text_min fonts fonts__promo fonts__promo_min">Автосервис в Пушкинском районе предлагает весь спектр услуг – от тщательной диагностики до ремонта двигателя и слесарных работ любой степени сложности. Вовремя выявим поломку и отремонтируем ваш автомобиль, оказав следующие компетентные услуги.</h4>
        <a href="#contacts" class="link fonts fonts__link">Контакты</a>
    </div>
</article>


<article class="about center" id="about">
    <div class="about__header">
        <div class="about__header_text">
            <h3 class="fonts fonts__about fonts__about_header">Спец<span class="spanBlue">Авто</span>Регион</h3>
            <h4 class="fonts fonts__about fonts__about_main">Компания «СпецАвтоРегион» осуществляет качественный и недорогой ремонт автомобилей в МО. В одном здании с автосервисом работает автомагазин, где можно быстро купить автозапчасти под нужный вид ремонта. Автосервис удачно расположен в Пушкинском районе в поселке Зверосовхоз. Удобная транспортная развязка позволяет быстро прибыть на место ремонта автомобиля в Московской области из близлежащих районов. Наши сильные стороны – грамотный подход опытных механиков, современное техническое оснащение и умеренный ценовой диапазон на все виды услуг. Проведем тщательную диагностику автомобиля и выполним профессиональный ремонт вашего авто в самые сжатые сроки и по разумной цене!</h4>
        </div>
        <div class="about__header_info"></div>
    </div>
    <div class="about__blocks" id="services">
        <? foreach ($categorys as $category): ?>
            <a href="onecategory/<?= $category->slug ?>" class="about__blocks_block">
                <div class="about__service">
                    <div class="about__service_border">
                        <img class="about__service_imgMin" src="/images/services/<?= $category->img ?>" alt="imgPhoto"/>
                    </div>
                </div>
                <h4 class="fonts fonts__about fonts__about_service-head"><?= $category->name ?></h4>
                <h5 class="fonts fonts__about fonts__about_service-info"><?= $category->info ?></h5>
                <h5 class="fonts fonts__about fonts__about_service-info"><span class="spanBlue"><?= $category->price ?></span></h5>
            </a>
        <? endforeach; ?>
    </div>
</article>


<div class="promo promo__log1600-400"></div>


<article class="warranty center">
    <h2 class="fonts fonts__about fonts__about_header centerText">Наш гарантии</h2>
    <h3 class="fonts fonts__about fonts__about_main centerText"><span class="spanBlack">За годы работы в данном сегменте рынка мы вывели оказание услуг на усовершенствованный уровень, а среднерыночные цены становятся решающим фактором обращения именно к нам.</span></h3>
    <div class="warranty__blocks">
        <h4 class="fonts fonts__warranty">Автосервис в Пушкинском районе – быстро, недорого, эффективно</h4>
        <p class="fonts fonts__about fonts__about_main">Если у вас появилась необходимость ремонта авто без ущерба для бюджета или возникли подозрения на поломку, и вы не хотите терять зря время, то мы готовы предложить экспертную помощь в самом выгодном соотношении цены и качества услуг.</p>
        <br>
        <p class="fonts fonts__about fonts__about_main">Почему обратиться к нам – лучшее решение:</p>
        <div class="singleService__info_service">
            <i class="spanBlue check fas fa-check"></i>
            <p class="fonts fonts__about fonts__about_service-single">•	прямой доступ к запчастям в обход посредников и переплат;</p>
        </div>
        <div class="singleService__info_service">
            <i class="spanBlue check fas fa-check"></i>
            <p class="fonts fonts__about fonts__about_service-single">•	весь спектр услуг из первых рук – риск наценок исключен;</p>
        </div>
        <div class="singleService__info_service">
            <i class="spanBlue check fas fa-check"></i>
            <p class="fonts fonts__about fonts__about_service-single">•	прозрачные взаиморасчеты без навязывания лишних услуг;</p>
        </div>
        <div class="singleService__info_service">
            <i class="spanBlue check fas fa-check"></i>
            <p class="fonts fonts__about fonts__about_service-single">•	автомеханики с опытом от 15 лет сделают всё на 5 баллов;</p>
        </div>
        <div class="singleService__info_service">
            <i class="spanBlue check fas fa-check"></i>
            <p class="fonts fonts__about fonts__about_service-single">•	приятные скидки постоянным клиентам;</p>
        </div>
        <div class="singleService__info_service">
            <i class="spanBlue check fas fa-check"></i>
            <p class="fonts fonts__about fonts__about_service-single">•	гарантия на все услуги.</p>
        </div>
    </div>
    <div class="warranty__blocks">
        <h4 class="fonts fonts__warranty">Ищете качественный ремонт легковых автомобилей недорого? </h4>
        <p class="fonts fonts__about fonts__about_main">Получите консультацию по контактному номеру и выберите удобное для вас время визита прямо сейчас: +7 (910)-460-34-72!</p>
        <br>
        <p class="fonts fonts__about fonts__about_service-single">Все цены, указанные на сайте приведены как справочная информация и не являются публичной офертой, определяемой положениями статьи 437 Гражданского кодекса Российской Федерации.</p>
    </div>
</article>


<div class="gallery" id="gallery">
    <div class="center gallery_images">
        <h2 class="fonts fonts__about fonts__about_header"><span class="spanWhite">Галерея</span></h2>
        <h3 class="fonts fonts__about fonts__about_main">Фото наших работ.</h3>
        <div class="slider">
            <?php foreach ($imagesGallery as $imagePhoto): ?>
                <div class="item">
                    <img src="/images/gallery/<?= $imagePhoto ?>" alt="Первый слайд">
                    <!--                    <div class="slideText">Заголовок слайда</div>-->
                </div>
            <? endforeach; ?>
            <a class="prev" onclick="minusSlide()">&#10094;</a>
            <a class="next" onclick="plusSlide()">&#10095;</a>
        </div>
    </div>
</div>


<div class="feedback center">

    <h2 class="fonts fonts__about fonts__about_header">Отзывы</h2>
    <h3 class="fonts fonts__about fonts__about_main"><span class="spanBlack">Ничто так не греет душу и не мотивирует работать как позитивные отклики наших клиентов и их желание вернуться к нам снова!</span></h3>

    <div class="sliderFeedback">
        <a class="prevFeedback" onclick="minusFeedback()">&#10094;</a>
        <? foreach ($feedbacks as $feedback): ?>
            <div class="itemFeedback">
                <h4 class="fonts fonts__about fonts__about_service-head"><?= $feedback->name ?></h4>
                <h4 class="fonts fonts__feedback">"<?= $feedback->feedback ?>"</h4>
            </div>
        <? endforeach; ?>
        <a class="nextFeedback" onclick="plusFeedback()">&#10095;</a>
    </div>

    <div id="feedbackDiv">
        <form id="formFeedback"
              class="form"
              method="POST">
            <input id="feedback_id"
                   type="hidden"
                   name="id">
            <label for="feedback_name" class="form">
                <input id="feedback_name"
                       type="text"
                       name="name"
                       class="form__input fonts fonts__feedback_labelInput"
                       placeholder="Введите Ваше имя"
                       required>
            </label>
            <label for="feedback_text" class="form">
                <input id="feedback_text"
                       type="text"
                       name="text"
                       class="form__input fonts fonts__feedback_labelInput"
                       placeholder="Напишите отзыв..."
                       required>
            </label>
            <label for="sendFeedback" class="form">
                <input id="sendFeedback"
                       type="submit"
                       class="submit submit__input fonts fonts__link"
                       value="Отправить">
            </label>
        </form>
    </div>
    <p id="feedbackModerator" class="alertText alertText__white fonts__about_header"></p>
</div>

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
    <iframe src="https://yandex.ru/map-widget/v1/?um=constructor%3A8ce7ada28a0f4d71cb39137c08269c3077a9d2cc6cd217b06c79f45c5147ac44&amp;source=constructor" style="border: none;width: 100%;height: 460px;"></iframe>
</div>

<div class="footer__up">
    <div class="footer__up_img center">
        <?php foreach ($imagesLogoAuto as $imageLogoAuto): ?>
            <img src="/images/elements/logoAuto/<?= $imageLogoAuto ?>" class="footer__logoAuto" alt="logo_auto">
        <? endforeach; ?>
    </div>
</div>