<p>
    Проверьте правильность заполнения заявки.
</p>

<form action="/request/stepTree/" method="post">

    <ul class="list-group">
        <li class="list-group-item">
            <label for="">Имя: <?=  $client->name ?></label>
            <input type="text" name="client_id" value="<?=  $client->id ?>" hidden>
        </li>
        <li class="list-group-item">
            <label for="">Адрес: <?=  $client->address ?></label>
        </li>
        <li class="list-group-item">
            <label for="">Провайдер: <?=  $provider->provider ?></label>
            <input type="text" name="provider_id" value="<?=  $provider->id ?>" hidden>
        </li>
        <li class="list-group-item">
            <label for="">Услуга: <?=  $service->service ?></label>
            <input type="text" name="service_id" value="<?=  $service->id ?>" hidden>
        </li>
    </ul>

    <input class="btn btn-primary mt-2" type="submit" value="Отправить заявку">

    <a href="/request/endCall" class="btn btn-danger mt-2" type="submit">Завершить разговор</a>
</form>