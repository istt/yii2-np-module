<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var istt\np\models\NetworkCode $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="network-code-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'operator_id')->widget(Select2::className(), [
				    'data' => ['' => '--- Select ---'],
				    'options' => [
				    	'placeholder' => 'Select a state ...',
				    	'multiple' => TRUE,
				    ],
				    'pluginOptions' => [
				        'allowClear' => true
				    ],
				]); ?>

    <?= $form->field($model, 'mnc')->textInput(['maxlength' => 20]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('np', 'Create') : Yii::t('np', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
