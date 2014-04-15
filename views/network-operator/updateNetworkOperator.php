<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var istt\np\models\NetworkOperator $model
 */

$this->title = Yii::t('np', 'Update {modelClass}: ', [
  'modelClass' => 'Network Operator',
]) . $model->operator_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('np', 'Network Operators'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->operator_id, 'url' => ['view', 'id' => $model->operator_id]];
$this->params['breadcrumbs'][] = Yii::t('np', 'Update');
?>
<div class="network-operator-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_formNetworkOperator', [
        'model' => $model,
    ]) ?>

</div>
