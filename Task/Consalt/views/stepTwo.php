<div>
    <a href="/request/endCall" class="btn btn-danger" type="submit">Завершить разговор</a>
</div>

<? foreach ($providers as $provider): ?>

    <div class="mt-3">
        <h4><?=  $provider->provider ?></h4>
        <form action="/request/stepTwo/" method="post">
            <input type="text" name="client_id" value="<?=  $client->id ?>" hidden>
            <input type="text" name="provider_id" value="<?=  $provider->id ?>" hidden>

            <div class="input-group mb-3">
                <select class="form-select" name="service_id" aria-label="Default select example">
                    <option selected>Выбирите услугу</option>
                    <? foreach ($provider->other as $services): ?>
                        <option value="<?=  $services->id ?>"><?=  $services->service ?></option>
                    <? endforeach; ?>
                </select>
                <input type="submit" class="btn btn-primary"></input>
            </div>
        </form>
    </div>
<? endforeach; ?>

