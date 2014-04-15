<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var istt\np\models\CountryCode $model
 */

$this->title = Yii::t('np', 'Create {modelClass}', [
  'modelClass' => 'Country Code',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('np', 'Country Codes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="country-code-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_formCountryCode', [
        'model' => $model,
    ]) ?>

</div>
