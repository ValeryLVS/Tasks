<?php
define('DS', DIRECTORY_SEPARATOR);
define('ROOT_DIR', dirname(__DIR__));


//заглушка
define('SITE_KEY', '123');
define('SECRET_KEY', '123');

use app\engine\Db;
use app\model\repositories\CategoryRepository;
use app\model\repositories\ServicesRepository;
use app\model\repositories\FeedbackRepository;
use app\model\repositories\GalleryRepository;
use app\model\repositories\UserRepository;
use app\engine\Request;


return [
    'TEMPLATES_DIR' => dirname(__DIR__) . "/views/",
    'AVA_DIR' => dirname(__DIR__) . "/public_html/images/feedback/",
    'CONTROLLER_NAMESPACE' => 'app\controllers\\',
    'ROOT' => $_SERVER['DOCUMENT_ROOT'],
    'GALLERY_SERVICE_DIR' => dirname(__DIR__) . "/public_html/images/services/",
    'GALLERY_PHOTO_DIR' => dirname(__DIR__) . "/public_html/images/gallery/",
    'GALLERY_LOGOAUTO_DIR' => dirname(__DIR__) . "/public_html/images/elements/logoAuto/",
    'components' => [
        'db' => [
            'class' => Db::class,
            'driver' => 'mysql',
            'host' => 'localhost',
            'login' => 'root',
            'password' => '',
            'database' => 'specautoregion',
            'charset' => 'utf8'
        ],
        'request' => [
            'class' => Request::class
        ],
        'categoryRepository' => [
            'class' => CategoryRepository::class
        ],
        'servicesRepository' => [
            'class' => ServicesRepository::class
        ],
        'galleryRepository' => [
            'class' => GalleryRepository::class
        ],
        'feedbackRepository' => [
            'class' => FeedbackRepository::class
        ],
        'userRepository' => [
            'class' => UserRepository::class
        ]
    ]
];