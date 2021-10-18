<?php
return [
    'bundlesBasePath' => __DIR__ . '/../app/Bundles/',
    'connections' => [
        'default' => [
            'type' => 'swoft-mysql',
            'host' => 'database',
            'database' => 'db',
            'encoding' => 'utf8',
            'user' => 'root',
            'password' => "dev",
            'tryCreateDatabase' => false,
        ],
    ],
    'bundles' => [
        'TestModel' => [
            'connections' => [
                'default' => [
                    'dao_namespace' => 'App\Bundles\TestModel\Dao',
                    'model_namespace' => 'App\Bundles\TestModel\Model',
                    'validator_namespace' => 'App\Bundles\TestModel\Validator',
                ],
            ],
        ],
    ],
];
