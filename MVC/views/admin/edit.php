<div class="center">

    <ul class="nav__admin">
        <li class="submit submit__edit">
            <a class="fonts fonts__link" href="/admin">Админка</a>
        </li>
        <li class="submit submit__del">
            <a href="/admin/logout" class="fonts fonts__link">Выйти</a>
        </li>
    </ul>

    <form action="/category/store/" method="post" class="form borderBlock">
        <input hidden type="text" name="id" value="<?= $id ?>">

        <label for="categoryName" class="form fonts fonts__about fonts__about_main">Название категории:
            <input type="text" name="name" required class="form__input fonts fonts__feedback_labelInput" id="categoryName" value="<?= $name ?>" placeholder="<?= $name ?>">
        </label>

        <label for="categoryPrice" class="form fonts fonts__about fonts__about_main">Прайс:
            <input type="text" name="price" required class="form__input fonts fonts__feedback_labelInput" id="categoryPrice" value="<?= $price ?>" placeholder="<?= $price ?>">
        </label>

        <label for="inputCategoryInfo" class="form fonts fonts__about fonts__about_main">Информация:
            <input type="text" name="info" required class="form__input fonts fonts__feedback_labelInput" id="inputCategoryInfo" value="<?= $info ?>" placeholder="<?= $info ?>">
        </label>

        <label for="inputCategoryOther" class="form fonts fonts__about fonts__about_main">Примичание:
            <input type="text" name="other" required class="form__input fonts fonts__feedback_labelInput" id="inputCategoryOther" value="<?= $other ?>" placeholder="<?= $other ?>">
        </label>

        <label for="sendEditCategory" class="form">
            <input id="sendEditCategory" class="submit submit__add submit__add_unique fonts fonts__link" type="submit" value="Изменить категорию">
        </label>
    </form>

    <form action="/category/store/" method="post" enctype="multipart/form-data" class="form borderBlock">
        <input hidden type="text" name="id" value="<?= $id ?>">

        <input hidden type="text" name="imgOld" value="<?= $img ?>">

        <img class="admin__categoryImg" src="/images/services/<?= $img ?>" alt="imgPhoto" />

        <div class="input__wrapper">
            <input name="img" type="file" id="categoryImg" class="input input__file" required>
            <label for="categoryImg" class="input__file-button">
                <span class="input__file-icon-wrapper fonts fonts__link">&#8635;</span>
                <span class="input__file-button-text fonts fonts__link">Выберите файл</span>

            </label>
        </div>

        <label for="sendEditCategoryImg" class="form">
            <input id="sendEditCategoryImg" class="submit submit__add submit__add_unique fonts fonts__link" type="submit" value="Изменить картинку">
        </label>

    </form>

    <h1 class="fonts fonts__about fonts__about_header centerText">Изменить услуги</h1>

    <div>
        <? foreach ($services as $service): ?>
        <form action="/services/store/" method="post" class="form borderBlock">
            <input hidden type="text" name="id" value="<?= $service->id ?>">

            <label for="serviceName" class="form fonts fonts__about fonts__about_main">
                <input id="serviceName" name="name" type="text" class="form__input fonts fonts__feedback_labelInput" placeholder="<?= $service->name ?>" value="<?= $service->name ?>" required>
            </label>

            <label for="servicePrice" class="form fonts fonts__about fonts__about_main">
                <input id="servicePrice" name="price" type="text" class="form__input fonts fonts__feedback_labelInput" placeholder="<?= $service->price ?>" value="<?= $service->price ?>" required>
            </label>

            <div class="admin__links">
                <label for="" class="form">
                    <input class="submit submit__input fonts fonts__link" type="submit" value="Изменить услугу">
                </label>
                <label for="sendService" class="form">
                    <a href="/services/delete/<?= $service->id ?>" class="submit submit__del fonts fonts__link">Удалить</a>
                </label>
            </div>
        </form>
        <?endforeach; ?>
    </div>

    <h1 class="fonts fonts__about fonts__about_header centerText">Добавить новую услугу</h1>

    <form action="/services/add/" method="post" class="form borderBlock">
        <input hidden type="text" name="category" value="<?= $id ?>">

        <label for="serviceNameAdd" class="form fonts fonts__about fonts__about_main">Название услуги:
            <input type="text" name="name" required class="form__input fonts fonts__feedback_labelInput" id="serviceNameAdd" placeholder="Название...">
        </label>

        <label for="servicePriceAdd" class="form fonts fonts__about fonts__about_main">Прайс:
            <input type="text" name="price" required class="form__input fonts fonts__feedback_labelInput" id="servicePriceAdd" placeholder="Цена услуги...">
        </label>

        <label for="" class="form">
            <input class="submit submit__add submit__add fonts fonts__link" type="submit" value="Добавить услугу">
        </label>
    </form>

</div>