<?php
return [
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => \yii\caching\FileCache::class,
        ],
    ],
    'authManager' => [
        'class' => 'yii\rbac\DbManager',
    ],
    'modules' => [
        'gii' => [
            'class' => 'yii\gii\Module'
        ],
        'admin' => [
            'class' => 'mdm\admin\Module',
        ]
    ],
];
