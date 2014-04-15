<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
?>
<div class="country-view">

    <h1><small><?= \Yii::t('app', 'Country'); ?>:</small> <?= Html::encode($this->title) ?></h1>


    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'country_id',
            'country_name',
            'country_name_short',
        ],
    ]) ?>

</div>
