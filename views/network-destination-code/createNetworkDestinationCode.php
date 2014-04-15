<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var istt\np\models\NetworkDestinationCode $model
 */

$this->title = Yii::t('np', 'Create {modelClass}', [
  'modelClass' => 'Network Destination Code',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('np', 'Network Destination Codes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="network-destination-code-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_formNetworkDestinationCode', [
        'model' => $model,
    ]) ?>

</div>
