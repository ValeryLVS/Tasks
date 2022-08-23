<?php

use app\engine\Autoload;
use app\model\{Article, Users};

include "../config/config.php";
include "../engine/Autoload.php";

spl_autoload_register([new Autoload(), 'loadClass']);

/**
 *
 * Возможность для пользователя создать новую статью
 *
 * @param int $id
 * @param string $title
 * @param string $info
 * @return object
 */
$article = new Article(1, 'NewArticle', 'Lorem');
$article->insert();

/**
 *
 * Возможность получить все статьи конкретного пользователя;
 *
 * @param int $user_id
 * @param int $id
 * @return object
 */
$article = Article::getAllWhere('user_id', 1);


/**
 * Возможность сменить автора статьи;
 * Возможность получить автора статьи;
 *
 * @param int $user_id
 * @param int $id
 * @return object
 */
$article = Article::getOneWhere('id', 3);
//получаем автора статьи.
$user = Users::getOneWhere('id', $article->user_id);
$article->user_id = 2;
$article->update();