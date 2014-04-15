<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
?>
<div class="network-operator-view">

    <h1><small><?= \Yii::t('app', 'Network Operator'); ?>:</small> <?= Html::encode($this->title) ?></h1>


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
