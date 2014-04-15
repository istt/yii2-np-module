<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
?>
<div class="country-code-view">

    <h1><small><?= \Yii::t('app', 'Country Code'); ?>:</small> <?= Html::encode($this->title) ?></h1>


    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'country_id',
            'cc',
        ],
    ]) ?>

</div>
