<?php


return [
    'request/index' => 'request/index',
    'request/stepOne' => 'request/stepOne',
    'request/stepTwo' => 'request/stepTwo',
    'request/stepTree' => 'request/stepTree',

    'request/endCall' => 'request/endCall',
    'request/ConfirmEndCall' => 'request/ConfirmEndCall',

    'index/errors' => 'index/errors',

    'index' => 'index/index',
    '([^a-z\d])' => 'index/index/$1',
    "" => 'index/index',
];