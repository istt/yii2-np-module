<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var istt\np\models\NetworkDestinationCode $model
 */

$this->title = Yii::t('np', 'Update {modelClass}: ', [
  'modelClass' => 'Network Destination Code',
]) . $model->operator_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('np', 'Network Destination Codes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->operator_id, 'url' => ['view', 'operator_id' => $model->operator_id, 'ndc' => $model->ndc]];
$this->params['breadcrumbs'][] = Yii::t('np', 'Update');
?>
<div class="network-destination-code-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_formNetworkDestinationCode', [
        'model' => $model,
    ]) ?>

</div>
