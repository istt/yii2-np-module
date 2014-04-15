<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/**
 * @var yii\web\View $this
 * @var istt\np\models\NetworkDestinationCode $model
 */

$this->title = $model->operator_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('np', 'Network Destination Codes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="network-destination-code-view">

    <h1><small><?= \Yii::t('app', 'Network Destination Code'); ?>:</small> <?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('np', 'Update'), ['update', 'operator_id' => $model->operator_id, 'ndc' => $model->ndc], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('np', 'Delete'), ['delete', 'operator_id' => $model->operator_id, 'ndc' => $model->ndc], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('np', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'operator_id',
            'ndc',
        ],
    ]) ?>

</div>
