<nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
    <ol class="breadcrumb">
    <? if ($_SERVER['REQUEST_URI'] == '/request/index/'): ?>
        <li class="breadcrumb-item"><a href="/">Главная</a></li>
        <li class="breadcrumb-item active" aria-current="page">Шаг - 1</li>
    <? elseif ($_SERVER['REQUEST_URI'] == '/request/stepOne/'): ?>
        <li class="breadcrumb-item"><a href="/">Главная</a></li>
        <li class="breadcrumb-item active" aria-current="page">Шаг 1</li>
        <li class="breadcrumb-item active" aria-current="page">Шаг - 2</li>
    <? elseif ($_SERVER['REQUEST_URI'] == '/request/stepTwo/'): ?>
        <li class="breadcrumb-item"><a href="/">Главная</a></li>
        <li class="breadcrumb-item active" aria-current="page">Шаг 1</li>
        <li class="breadcrumb-item active" aria-current="page">Шаг 2</li>
        <li class="breadcrumb-item active" aria-current="page">Шаг - 3</li>
    <? elseif ($_SERVER['REQUEST_URI'] == '/request/endCall'): ?>
        <li class="breadcrumb-item"><a href="/">Главная</a></li>
        <li class="breadcrumb-item" aria-current="page">Завершение заявки</li>
    <? else: ?>
        <li class="breadcrumb-item active" aria-current="page">Главная</li>
    <? endif ?>
    </ol>
</nav>