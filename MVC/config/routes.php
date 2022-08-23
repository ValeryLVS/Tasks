<?php


return [
    //url-regexp => контроллер/экшен/$1/$2 - параметры
    'admin/login' => 'admin/login',
    'admin/logout' => 'admin/logout',
    'admin' => 'admin/index',


    'category/add' => 'category/add',
    'category/update/([a-zA-Z0-9]+)' => 'category/update/$1',
    'category/store' => 'category/store',
    'category/delete/([a-zA-Z0-9]+)' => 'category/delete/$1',
    'category/deleteConfirmed/([a-zA-Z0-9]+)' => 'category/deleteConfirmed/$1',


    'onecategory/([a-zA-Z0-9]+)' => 'index/oneCategory/$1',

    'services/add' => 'services/add',
    'services/store' => 'services/store',
    'services/delete/([0-9]+)' => 'services/delete/$1',


    'feedback/send' => 'feedback/send',
    'feedback/confirm' => 'feedback/confirm/$1',
    'feedback/bun' => 'feedback/bun',
    'feedback/delete' => 'feedback/delete',


    'gallery/delete' => 'gallery/delete',
    'gallery/add' => 'gallery/add',


    'mail/send' => 'mail/send',


    'index/errors' => 'index/errors',


    'index' => 'index/index',
    '([^a-z\d])' => 'index/index/$1',
    "" => 'index/index',
];