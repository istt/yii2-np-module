<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var istt\np\models\NetworkOperatorSearch $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="network-operator-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'operator_id') ?>

    <?= $form->field($model, 'operator_name') ?>

    <?= $form->field($model, 'operator_name_short') ?>

    <?= $form->field($model, 'country_id') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('np', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('np', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
