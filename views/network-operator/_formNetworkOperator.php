<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use kartik\widgets\Select2;
use yii\helpers\ArrayHelper;
use istt\np\models\Country;

/**
 * @var yii\web\View $this
 * @var istt\np\models\NetworkOperator $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="network-operator-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'country_id')->widget(Select2::className(), [
				    'data' => ['' => '--- Select ---'] + ArrayHelper::map(Country::find()->all(), 'country_id', 'country_name'),
				    'options' => [
				    	'placeholder' => 'Select a country ...',
				    ],
				    'pluginOptions' => [
				        'allowClear' => true
				    ],
				]); ?>

    <?= $form->field($model, 'operator_name')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'operator_name_short')->textInput(['maxlength' => 20]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('np', 'Create') : Yii::t('np', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
