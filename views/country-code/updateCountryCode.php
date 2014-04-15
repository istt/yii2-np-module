<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var istt\np\models\CountryCode $model
 */

$this->title = Yii::t('np', 'Update {modelClass}: ', [
  'modelClass' => 'Country Code',
]) . $model->country_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('np', 'Country Codes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->country_id, 'url' => ['view', 'country_id' => $model->country_id, 'cc' => $model->cc]];
$this->params['breadcrumbs'][] = Yii::t('np', 'Update');
?>
<div class="country-code-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_formCountryCode', [
        'model' => $model,
    ]) ?>

</div>
