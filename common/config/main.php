<?php
return [
    'aliases' => [
        '@apaoww/AdminOci8' => 'path/to/your/extracted',
    ],
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
    ],
];
