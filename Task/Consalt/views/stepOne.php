<div class="mt-3">
    <form action="/request/stepOne/" method="post">
        <label for="select_town">Выбирите город</label>
        <select id="select_town" class="form-select" name="town" aria-label="Default select example">
            <? foreach ($towns as $town): ?>
                <option value="<?= $town->id ?>"><?= $town->town ?></option>
            <? endforeach; ?>
        </select>

        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Фамилия Имя Отчество</label>
            <input type="text" name="name" class="form-control" id="exampleFormControlInput1" placeholder="Ф.И.О." required>
        </div>

        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Адрес:</label>
            <input type="text" name="address" class="form-control" id="exampleFormControlInput1" placeholder="Адрес" required>
        </div>

        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Контатктный телефон:</label>
            <input type="tel" name="phone" class="form-control" id="exampleFormControlInput1" placeholder="Контатктный телефон" required>
        </div>

        <label for="select_reason">Причина обращения</label>
        <select id="select_reason" class="form-select" name="service" aria-label="Default select example">
                <option value="Нужен Ethernet">Нужен Ethernet</option>
                <option value="Необходим спутниковй интернет">Необходим спутниковй интернет</option>
                <option value="Подключение к интернету по технологии DOCSIS.">Подключение к интернету по технологии DOCSIS.</option>
                <option value="Мобильный доступ в интернет (GPRS, EDGE, 3G)">Мобильный доступ в интернет (GPRS, EDGE, 3G)</option>
                <option value="Подключение к интернету по технологии WiMax">Подключение к интернету по технологии WiMax</option>
        </select>

        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Дополнительный комментарий:</label>
            <textarea name="additionally" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
        </div>

        <input class="btn btn-primary" type="submit" value="Продолжить">
        <a href="/request/endCall" class="btn btn-danger" type="submit">Завершить разговор</a>
    </form>
</div>
