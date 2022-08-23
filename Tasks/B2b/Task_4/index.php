<?php
include "config.php";
include "connect.php";

/**
 * @param string $user_ids
 * @return array
 */
function convertString($user_ids)
{
    return $user_ids = explode(',', $user_ids);
}

/**
 * @param PDO $connection
 * @param array $user_ids
 * @return array
 */
function load_users_data($user_ids, $connection)
{
    $data = [];

    foreach ($user_ids as $user_id) {
        $sql = "SELECT * FROM users WHERE id = :id";
        $query = $connection->prepare($sql);
        $query->execute(['id' => $user_id]);
        while ($obj = $query->fetch(PDO::FETCH_OBJ)) {
            $data[$user_id] = $obj->name;
        }
    }
    return $data;
}

/**
 * @param array $data
 */
function render($data)
{
    foreach ($data as $user_id => $name) {
        echo "<a href=\"/show_user.php?id=$user_id\">$name</a></br>";
    }
}

$_GET['user_ids'] = '1,2,3,4';

$connection = connection();
$users = convertString($_GET['user_ids']);
$data = load_users_data($users, $connection);
render($data);

/**
 * 1. Констатны вынес в отдельный файл.
 * 2. Подключение к DB тоже вынес с исходного кода в отдельный файл.
 * 3. Для подклчюения к DB использовал PDO.
 * 4. Вывод результата сделал через функцию.
 *
 * В исходном коде, при передачи строки в не правльном формате, код не работал,
 * также была нарушена безопасноть, не стоит передавать напрямую GET.
 */