<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var istt\np\models\MobileCountryCode $model
 */

$this->title = Yii::t('np', 'Create {modelClass}', [
  'modelClass' => 'Mobile Country Code',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('np', 'Mobile Country Codes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mobile-country-code-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_formMobileCountryCode', [
        'model' => $model,
    ]) ?>

</div>
