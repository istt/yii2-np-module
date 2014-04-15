<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var istt\np\models\MobileCountryCode $model
 */

$this->title = Yii::t('np', 'Update {modelClass}: ', [
  'modelClass' => 'Mobile Country Code',
]) . $model->country_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('np', 'Mobile Country Codes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->country_id, 'url' => ['view', 'country_id' => $model->country_id, 'mcc' => $model->mcc]];
$this->params['breadcrumbs'][] = Yii::t('np', 'Update');
?>
<div class="mobile-country-code-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_formMobileCountryCode', [
        'model' => $model,
    ]) ?>

</div>
