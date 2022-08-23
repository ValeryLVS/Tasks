<div>
    <a href="/request/index/" type="button" class="btn btn-success">Принять звонок</a>
</div>
<? if ($success == 'ok'): ?>
    <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
        <strong>Отправлено!</strong> Заявка оформлена!
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<? elseif ($success == 'endCall'): ?>
    <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
        <strong>Отправлено!</strong> Заявка отменена!
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<? else: ?>
<? endif ?>
