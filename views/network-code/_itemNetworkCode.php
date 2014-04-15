<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
?>
<div class="network-code-view">

    <h1><small><?= \Yii::t('app', 'Network Code'); ?>:</small> <?= Html::encode($this->title) ?></h1>


    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'operator_id',
            'mnc',
        ],
    ]) ?>

</div>
