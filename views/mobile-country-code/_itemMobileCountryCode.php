<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
?>
<div class="mobile-country-code-view">

    <h1><small><?= \Yii::t('app', 'Mobile Country Code'); ?>:</small> <?= Html::encode($this->title) ?></h1>


    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'country_id',
            'mcc',
        ],
    ]) ?>

</div>
