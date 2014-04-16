<?php

use yii\helpers\Html;
use yii\grid\GridView;

/**
 * @var yii\web\View $this
 * @var yii\data\ActiveDataProvider $dataProvider
 * @var istt\np\models\NetworkOperatorSearch $searchModel
 */

$this->title = Yii::t('np', 'Network Operators');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="network-operator-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('np', 'Create {modelClass}', [
  'modelClass' => 'Network Operator',
]), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
			['label' => 'IMSI', 'value' => function($data){ return $data['mcc'] . $data['mnc']; }],

			'mcc.mcc',
            'mnc.mnc',

            'operator_name',
            'operator_name_short',
			// Related Attributes
			'country.country_name',
			'country.country_name_short',

			'ndc.ndc',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
