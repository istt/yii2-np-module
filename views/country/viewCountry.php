<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/**
 * @var yii\web\View $this
 * @var istt\np\models\Country $model
 */

$this->title = $model->country_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('np', 'Countries'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="country-view">

    <h1><small><?= \Yii::t('app', 'Country'); ?>:</small> <?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('np', 'Update'), ['update', 'id' => $model->country_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('np', 'Delete'), ['delete', 'id' => $model->country_id], [
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
            'country_name',
            'country_name_short',
            'cc',
            'mcc',
            'operators',
        ],
    ]) ?>

</div>
