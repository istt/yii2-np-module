<?php

use yii\helpers\Html;
use yii\grid\GridView;

/**
 * @var yii\web\View $this
 * @var yii\data\ActiveDataProvider $dataProvider
 * @var istt\np\models\MobileCountryCodeSearch $searchModel
 */

$this->title = Yii::t('np', 'Mobile Country Codes');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mobile-country-code-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('np', 'Create {modelClass}', [
  'modelClass' => 'Mobile Country Code',
]), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'mcc',
            'country',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
