Vega is the task tracker
========================
Simple personal task tracker

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist zabachok/yii2-vega "*"
```

or add

```
"zabachok/yii2-vega": "*"
```

to the require section of your `composer.json` file.

Then run module migration:
```
./yii migrate --migrationPath=@vendor/zabachok/yii2-vega/migrations
```

## Activating

Add to you config file:

```php
'modules' => [
    ...
    'vega'     => [
        'class'     => 'zabachok\vega\Module',
    ],
]
```
and to your menu:

```php
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-left'],
        'items' => [
        ...
            [
                'label' => 'Tasks',
                'items' => [
                    ['label' => 'Projects', 'url' => ['/vega/project/index']],
                    ['label' => 'Tasks', 'url' => ['/vega/task/index']],
                ],
            ]
        ],
    ]);
```
