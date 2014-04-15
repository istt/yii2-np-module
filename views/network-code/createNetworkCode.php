<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var istt\np\models\NetworkCode $model
 */

$this->title = Yii::t('np', 'Create {modelClass}', [
  'modelClass' => 'Network Code',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('np', 'Network Codes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="network-code-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_formNetworkCode', [
        'model' => $model,
    ]) ?>

</div>
