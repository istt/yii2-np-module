<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
?>
<div class="network-destination-code-view">

    <h1><small><?= \Yii::t('app', 'Network Destination Code'); ?>:</small> <?= Html::encode($this->title) ?></h1>


    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'operator_id',
            'ndc',
        ],
    ]) ?>

</div>
