<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var istt\np\models\NetworkCode $model
 */

$this->title = Yii::t('np', 'Update {modelClass}: ', [
  'modelClass' => 'Network Code',
]) . $model->operator_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('np', 'Network Codes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->operator_id, 'url' => ['view', 'operator_id' => $model->operator_id, 'mnc' => $model->mnc]];
$this->params['breadcrumbs'][] = Yii::t('np', 'Update');
?>
<div class="network-code-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_formNetworkCode', [
        'model' => $model,
    ]) ?>

</div>
