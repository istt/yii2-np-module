<?php

use yii\helpers\Html;
use yii\grid\GridView;

/**
 * @var yii\web\View $this
 * @var yii\data\ActiveDataProvider $dataProvider
 * @var istt\np\models\CountryCodeSearch $searchModel
 */

$this->title = Yii::t('np', 'Country Codes');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="country-code-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('np', 'Create {modelClass}', [
  'modelClass' => 'Country Code',
]), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [

            'cc',
            'country',
            'country.mcc',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
