<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var istt\np\models\Country $model
 */

$this->title = Yii::t('np', 'Update {modelClass}: ', [
  'modelClass' => 'Country',
]) . $model->country_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('np', 'Countries'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->country_id, 'url' => ['view', 'id' => $model->country_id]];
$this->params['breadcrumbs'][] = Yii::t('np', 'Update');
?>
<div class="country-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_formCountry', [
        'model' => $model,
    ]) ?>

</div>
