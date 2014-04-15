<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/**
 * @var yii\web\View $this
 * @var istt\np\models\CountryCode $model
 */

$this->title = $model->country_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('np', 'Country Codes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="country-code-view">

    <h1><small><?= \Yii::t('app', 'Country Code'); ?>:</small> <?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('np', 'Update'), ['update', 'country_id' => $model->country_id, 'cc' => $model->cc], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('np', 'Delete'), ['delete', 'country_id' => $model->country_id, 'cc' => $model->cc], [
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
            'cc',
        ],
    ]) ?>

</div>
