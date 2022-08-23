<?php use app\engine\Auth; ?>

<div class="center">
    <?php if (!Auth::isAdmin()): ?>

    <div>

        <form action="/admin/login" method="post" class="form">

                <label for="login" class="form fonts fonts__feedback_labelInput">Логин:
                    <input type='text' id="login" name='login' class="form__input fonts fonts__feedback_labelInput" placeholder="Login..." required>
                </label>

                <label for="pass" class="form fonts fonts__feedback_labelInput">Пароль:
                    <input type='password' id="pass" name='pass' class="form__input fonts fonts__feedback_labelInput" placeholder="Password..." required>
                </label>

            <label for="adminLogin" class="form__submit">
                <input id="adminLogin" type="submit" class="submit submit__add submit__add_unique fonts fonts__link" value="Войти">
            </label>

        </form>

        <div class="admin__contact">
            <h5 class="fonts fonts__fontsMin"> <span class="spanBlue">*</span> Если забыли пароль или логин обратитесь к администратору сайта:</h5>
            <h5 class="fonts fonts__fontsMin"> <span class="spanBlue">Mr.Valery.LV@yandex.ru</span> </h5>
            <h5 class="fonts fonts__fontsMin">или</h5>
            <a target="_blank" href="https://telegram.im/@WebLVS"><img class="headerUp headerUp__links headerUp__links_tm" src="/images/icons/othere/tm.png" alt="tm"></a>
        </div>

    </div>

    <?else: ?>
    <div class="admin">
        <h1 class="centerText fonts fonts__about fonts__about_header">Вы вошли как администратор</h1>

        <ul class="nav__admin">

            <li class="submit submit__add">
                <a target="_blank" href="https://mail.yandex.ru/?uid=1358787037#inbox" class="fonts fonts__link">Я.Почта</a>
            </li>
            <li class="submit submit__img">
                <a target="_blank" href="https://yandex.ru/sprav/17984190/edit/main/" class="fonts fonts__link">Я.Справочник</a>
            </li>
            <li class="submit submit__edit">
                <a target="_blank" href="https://connect.yandex.ru/portal/services/webmaster/resources/sautoregion.ru" class="fonts fonts__link">Я.Коннект</a>
            </li>
            <li class="submit submit__input">
                <a target="_blank" href="https://metrika.yandex.ru/list?" class="fonts fonts__link">Я.Метрика</a>
            </li>
            <li class="submit submit__del">
                <a target="_blank" href="/admin/logout" class="fonts fonts__link">Выйти</a>
            </li>
        </ul>

        <div class="admin__contact">
            <h5 class="fonts fonts__fontsMin"> <span class="spanBlue">*</span> Если забыли пароль или логин обратитесь к администратору сайта:</h5>
            <h5 class="fonts fonts__fontsMin"> <span class="spanBlue">Mr.Valery.LV@yandex.ru</span> </h5>
            <h5 class="fonts fonts__fontsMin">или</h5>
            <a target="_blank" href="https://telegram.im/@WebLVS"><img class="headerUp headerUp__links headerUp__links_tm" src="/images/icons/othere/tm.png" alt="tm"></a>
        </div>

        <h1 class="centerText fonts fonts__about fonts__about_header">Добавить категорию</h1>

        <div class="borderBlock">

            <form action="/category/add/" method="post" enctype="multipart/form-data" class="form">

                <label for="categoryName" class="form fonts fonts__about fonts__about_main">Название категории:
                    <input type="text" name="name" required class="form__input fonts fonts__feedback_labelInput" id="categoryName" placeholder="Название категории">
                </label>

                <label for="categoryPrice" class="form fonts fonts__about fonts__about_main">Цена в категории:
                    <input type="text" name="price" required class="form__input fonts fonts__feedback_labelInput" id="categoryPrice" placeholder="Цена услуги в категории от ...">
                </label>

                <label for="categoryInfo" class="form fonts fonts__about fonts__about_main">Краткая информация категории:
                    <input type="text" name="info" required class="form__input fonts fonts__feedback_labelInput" id="categoryInfo" placeholder="Напишите коротко о категории">
                </label>

                <label for="categoryOther" class="form fonts fonts__about fonts__about_main">Полная информация в примичание:
                    <input type="text" name="other" required class="form__input fonts fonts__feedback_labelInput" id="categoryOther" placeholder="Напишите подробнее">
                </label>

                <input name="img" type="file" id="categoryImg" required class="input input__file">

                <label for="categoryImg" class="input__file-button">
                    <span class="input__file-icon-wrapper fonts fonts__link">&#8635;</span>
                    <span class="input__file-button-text fonts fonts__link">Выберите файл</span>
                </label>

                <label for="sendCategory" class="form">
                    <input id="sendCategory" class="submit submit__add submit__add_unique fonts fonts__link" type="submit" value="Добавить категорию">
                </label>

            </form>

        </div>


        <div>
            <? foreach ($categorys as $category): ?>
                <div class="admin__category borderBlock">
                    <h4 class="fonts fonts__about fonts__about_main"><?= $category->name ?></h4>
                    <div class="admin__links">
                        <a href="/category/update/<?= $category->slug ?>" class="submit submit__edit fonts fonts__link">Редактировать</a>
                        <a href="/category/delete/<?= $category->slug ?>" class="submit submit__del fonts fonts__link">Удалить</a>
                    </div>
                </div>
            <? endforeach; ?>
        </div>


        <div>
            <h1 class="centerText fonts fonts__about fonts__about_header">Модерация отзывов</h1>

            <? foreach ($feedback as $value):?>
                <div class="<? if($value->is_true == 0) echo 'alert alert__danger'; else echo 'alert alert__success' ?> admin__feedbacks borderBlock"  id="<?= $value->id ?>">
                    <div class="admin__blockTextFeedback">
                        <p class="fonts fonts__about fonts__about_service-head"><b>Имя:</b> <?= $value->name ?></p>
                        <p class="fonts fonts__feedback"><b>Отзыв:</b> <br> <?= $value->feedback ?></p>
                    </div>
                    <div class="admin__links">
                        <button type="button"
                                class="formConfirmFeedBack submit submit__add fonts fonts__link fonts fonts__link"
                                data-name="<?= $value->name ?>"
                                data-id="<?= $value->id ?>">Разрешить
                        </button>
                        <button type="button"
                                class="formBunFeedBack submit submit__edit fonts fonts__link fonts fonts__link"
                                data-name="<?= $value->name ?>"
                                data-id="<?= $value->id ?>">Запретить
                        </button>
                        <button type="button"
                                class="formDelFeedBack submit submit__del fonts fonts__link fonts fonts__link"
                                data-name="<?= $value->name ?>"
                                data-id="<?= $value->id ?>">Удалить
                        </button>
                    </div>
                </div>
            <? endforeach; ?>

        </div>

        <div>
            <h1 class="centerText fonts fonts__about fonts__about_header">Редактирование Галлерии</h1>

            <p id="deleteImage" class="centerText fonts fonts__about fonts__about_header"></p>

            <div class="borderBlock">
                <div class="admin__gallery ">
                    <?php foreach ($imagesGalleryPhotos as $key=>$imagesGalleryPhoto): ?>
                        <div class="admin__gallery_OneDiv" id="<?= $key ?>">
                            <img src="/images/gallery/<?= $imagesGalleryPhoto ?>" class="admin__gallery_photo" alt="logo_auto">
                            <button type="button"
                                    class="formDelPhoto submit submit__del fonts fonts__link fonts fonts__link"
                                    data-name="<?= $imagesGalleryPhoto ?>"
                                    data-id="<?= $key ?>">Удалить
                            </button>
                        </div>
                    <? endforeach; ?>
                </div>
                <form action="/gallery/add/" method="post" enctype="multipart/form-data" class="form">
                    <input name="img" type="file" id="galleryImg" required class="input input__file">

                    <label for="galleryImg" class="input__file-button">
                        <span class="input__file-icon-wrapper fonts fonts__link">&#8635;</span>
                        <span class="input__file-button-text fonts fonts__link">Выберите файл</span>

                    </label>

                    <label for="addImageGallery" class="form">
                        <input id="addImageGallery" class="submit submit__add submit__add_unique fonts fonts__link" type="submit" value="Добавить изображение">
                    </label>
                </form>
            </div>

        </div>


        <!-- Yandex.Metrika informer -->
        <a href="https://metrika.yandex.ru/stat/?id=76255402&amp;from=informer"
           target="_blank" rel="nofollow"><img src="https://informer.yandex.ru/informer/76255402/3_1_FFFFFFFF_FFFFFFFF_0_visits"
                                               style="width:88px; height:31px; border:0;" alt="Яндекс.Метрика" title="Яндекс.Метрика: данные за сегодня (просмотры, визиты и уникальные посетители)" class="ym-advanced-informer" data-cid="76255402" data-lang="ru" /></a>
        <!-- /Yandex.Metrika informer -->

    </div>

        <?endif;?>

    </div>

<script src="/scripts/admin.js"></script>