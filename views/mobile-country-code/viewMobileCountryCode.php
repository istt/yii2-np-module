<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/**
 * @var yii\web\View $this
 * @var istt\np\models\MobileCountryCode $model
 */

$this->title = $model->country_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('np', 'Mobile Country Codes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mobile-country-code-view">

    <h1><small><?= \Yii::t('app', 'Mobile Country Code'); ?>:</small> <?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('np', 'Update'), ['update', 'country_id' => $model->country_id, 'mcc' => $model->mcc], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('np', 'Delete'), ['delete', 'country_id' => $model->country_id, 'mcc' => $model->mcc], [
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
            'country_id',
            'mcc',
        ],
    ]) ?>

</div>
