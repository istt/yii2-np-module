<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var istt\np\models\NetworkOperator $model
 */

$this->title = Yii::t('np', 'Create {modelClass}', [
  'modelClass' => 'Network Operator',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('np', 'Network Operators'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="network-operator-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_formNetworkOperator', [
        'model' => $model,
    ]) ?>

</div>
