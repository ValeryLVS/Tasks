<header>
    <div class="headerUp center">
        <a href="/" class="headerUp headerUp__headerLeft">
            <img class="headerUp__headerLeft_logo" src="/images/logo.png" alt="logo">
            <div class="headerUp__headerLeft_block">
                <h3 class="fonts fonts__headerLogo"><span class="spanWhite">SPEC</span>AUTO<span class="spanWhite">REGION</span></h3>
                <h5 class="fonts fonts__fontsMin">Ремонт любых автомобилей</h5>
            </div>
        </a>
        <details class="menuLinkIcon">
            <summary id="summary-menu">
            </summary>
            <ul class="menu__drop">
                <? if (trim($_SERVER['REQUEST_URI'], '/') == 'index' || trim($_SERVER['REQUEST_URI'], '/') == ''): ?>
                <li class="menu__drop_list"><a href="/" class=" nav__left nav__left_link fonts fonts__headerUp fonts__headerUp_nav">Главная</a></li>
                <li class="menu__drop_list"><a href="#about" class="nav nav__left nav__left_link fonts fonts__headerUp fonts__headerUp_nav">О нас</a></li>
                <li class="menu__drop_list"><a href="#services" class=" nav__left nav__left_link fonts fonts__headerUp fonts__headerUp_nav">Наши услуги</a></li>
                <li class="menu__drop_list"><a href="#gallery" class=" nav__left nav__left_link fonts fonts__headerUp fonts__headerUp_nav">Галлерия наших работ</a></li>
                <li class="menu__drop_list"><a href="#contacts" class=" nav__left nav__left_link fonts fonts__headerUp fonts__headerUp_nav">Контакты</a></li>
                <li class="menu__drop_list"><a href="#footer" class=" nav__left nav__left_link fonts fonts__headerUp fonts__headerUp_nav">Время работы</a></li>
                <? else: ?>
                <li class="menu__drop_list"><a href="/" class=" nav__left nav__left_link fonts fonts__headerUp fonts__headerUp_nav">Главная</a></li>
                <li class="menu__drop_list"><a href="#contacts" class=" nav__left nav__left_link fonts fonts__headerUp fonts__headerUp_nav">Контакты</a></li>
                <li class="menu__drop_list"><a href="#footer" class=" nav__left nav__left_link fonts fonts__headerUp fonts__headerUp_nav">Время работы</a></li>
                <? endif ?>
            </ul>
        </details>
        <div class="headerUp headerUp__headerRight">
            <a href="mailto:Alexei.Polfinov@yandex.ru">
                <h4 class="fonts fonts__headerUp">EMAIL</h4>
                <h5 class="fonts fonts__fontsMin">Alexei.Polfinov@yandex.ru</h5>
            </a>
            <div>
                <h4 class="fonts fonts__headerUp">Время работы:</h4>
                <h5 class="fonts fonts__fontsMin">Пн - Пт: 9.00 - 20.00</h5>
                <h5 class="fonts fonts__fontsMin">Сб: 9.00 - 17.00</h5>
                <h5 class="fonts fonts__fontsMin">Вс: выходной</h5>
            </div>
            <div>
                <a href="tel:+79104603472" class="headerUp headerUp__headerRight_phone">
                    <img src="/images/icons/othere/phone.png" alt="phone">
                    <div class="headerUp__headerLeft_block">
                        <h4 class="fonts fonts__fontsMin">Позвони сейчас</h4>
                        <h3 class="fonts fonts__fontsMin fonts__fontsMin_phone">+7 (910)-460-34-72</h3>
                    </div>
                </a>
            </div>
            <div class="headerUp headerUp__linksBlock">
                <a href="https://wa.me/+79104603472" target="_blank" class="headerUp headerUp__links"><i class="fab fa-whatsapp"></i></a>
                <a href="https://instagram.com/special.region.auto?igshid=12a1dw49c2dmk" target="_blank" class="headerUp headerUp__links"><i class="fab fa-instagram"></i></a>
            </div>
        </div>
    </div>

    <nav class="center">
        <div class="nav">
            <ul class="nav nav__left">
                <? if (trim($_SERVER['REQUEST_URI'], '/') == 'index' || trim($_SERVER['REQUEST_URI'], '/') == ''): ?>
                <li><a href="/" class="nav nav__left nav__left_link fonts fonts__headerUp fonts__headerUp_nav">Главная</a></li>
                <li><a href="#about" class="nav nav__left nav__left_link fonts fonts__headerUp fonts__headerUp_nav">О нас</a></li>
                <li><a href="#services" class="nav nav__left nav__left_link fonts fonts__headerUp fonts__headerUp_nav">Наши услуги</a></li>
                <li><a href="#gallery" class="nav nav__left nav__left_link fonts fonts__headerUp fonts__headerUp_nav">Галерея наших работ</a></li>
                <li><a href="#contacts" class="nav nav__left nav__left_link fonts fonts__headerUp fonts__headerUp_nav">Контакты</a></li>
                <? else: ?>
                <li><a href="/" class="nav nav__left nav__left_link fonts fonts__headerUp fonts__headerUp_nav">Главная</a></li>
                <li><a href="#contacts" class="nav nav__left nav__left_link fonts fonts__headerUp fonts__headerUp_nav">Контакты</a></li>
                <? endif ?>
            </ul>
            <a href="#contacts" class="nav nav__right">
                <i class="nav__right nav__right_link fab fa-telegram-plane"></i>
                <p class="fonts fonts__headerUp fonts__headerUp_nav">Получить консультацию</p>
            </a>
        </div>
    </nav>
</header>