<?php

namespace istt\np;

class NumberingPlansModule extends \yii\base\Module
{
    public $controllerNamespace = 'istt\np\controllers';

    public function init()
    {
        parent::init();

        \Yii::$app->getI18n()->translations['*'] = [
            'class' => 'yii\i18n\PhpMessageSource',
            'basePath' => __DIR__ . '/messages',
        ];
    }
}
