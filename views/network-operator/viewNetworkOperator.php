<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/**
 * @var yii\web\View $this
 * @var istt\np\models\NetworkOperator $model
 */

$this->title = $model->operator_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('np', 'Network Operators'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="network-operator-view">

    <h1><small><?= \Yii::t('app', 'Network Operator'); ?>:</small> <?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('np', 'Update'), ['update', 'id' => $model->operator_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('np', 'Delete'), ['delete', 'id' => $model->operator_id], [
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
            'operator_name',
            'operator_name_short',
            'country_id',
        ],
    ]) ?>

</div>
