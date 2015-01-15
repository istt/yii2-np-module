<?php
namespace istt\np;

use yii\base\BootstrapInterface;
use yii\web\GroupUrlRule;
use yii\console\Application as ConsoleApplication;
use yii\base\Module;

class Bootstrap implements BootstrapInterface
{
    /** @var array Model's map */
    private $_modelMap = [
    ];

    /** @inheritdoc */
    public function bootstrap($app)
    {
        /** @var $module Module */
        if ($app->hasModule('np') && ($module = $app->getModule('np')) instanceof Module) {
//             $this->_modelMap = array_merge($this->_modelMap, $module->modelMap);
//             foreach ($this->_modelMap as $name => $definition) {
//                 $class = "istt\\np\\models\\" . $name;
//                 \Yii::$container->set($class, $definition);
//                 $modelName = is_array($definition) ? $definition['class'] : $definition;
//                 $module->modelMap[$name] = $modelName;
//                 if (in_array($name, ['np', 'Profile', 'Token', 'Account'])) {
//                     \Yii::$container->set($name . 'Query', function () use ($modelName) {
//                         return $modelName::find();
//                     });
//                 }
//             }
//             \Yii::$container->setSingleton(Finder::className(), [
//                 'userQuery'    => \Yii::$container->get('UserQuery'),
//                 'profileQuery' => \Yii::$container->get('ProfileQuery'),
//                 'tokenQuery'   => \Yii::$container->get('TokenQuery'),
//                 'accountQuery' => \Yii::$container->get('AccountQuery'),
//             ]);
//             \Yii::$container->set('yii\web\User', [
//                 'enableAutoLogin' => true,
//                 'loginUrl'        => ['/user/security/login'],
//                 'identityClass'   => $module->modelMap['np'],
//             ]);

            if ($app instanceof ConsoleApplication) {
                $module->controllerNamespace = 'istt\np\commands';
            } else {
                $configUrlRule = [
                    'prefix' => $module->urlPrefix,
                    'rules'  => $module->urlRules
                ];

                if ($module->urlPrefix != 'np') {
                    $configUrlRule['routePrefix'] = 'np';
                }

                $app->get('urlManager')->rules[] = new GroupUrlRule($configUrlRule);
            }

            $app->get('i18n')->translations['np*'] = [
                'class'    => 'yii\i18n\PhpMessageSource',
                'basePath' => __DIR__ . '/messages',
            ];
        }

    }
}