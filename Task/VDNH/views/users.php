<? foreach ($users as $user): ?>
<div>
    <h4><?= $user->name ?></h4>
    <h4><?= $user->patronymic ?></h4>
    <h4><?= $user->surname ?></h4>
    <h4><?= $user->date_of_birth ?></h4>
</div>
    <hr>

<? endforeach; ?>
