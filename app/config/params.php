<?php

return [
    'adminEmail' => 'diegoschefer@gmail.com',
    'bootstrap' => ['gii'],
    'modules' => [
        'gii' => [
            'class' => 'yii\gii\Module',
            'allowedIPs' => ['54.175.34.160', '10.0.211.223', '127.0.0.1']
        ],
    ],
];
