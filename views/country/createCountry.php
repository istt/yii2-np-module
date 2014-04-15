<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var istt\np\models\Country $model
 */

$this->title = Yii::t('np', 'Create {modelClass}', [
  'modelClass' => 'Country',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('np', 'Countries'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="country-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_formCountry', [
        'model' => $model,
    ]) ?>

</div>
