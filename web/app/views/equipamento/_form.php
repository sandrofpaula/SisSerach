<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\EQUIPAMENTO */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="equipamento-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'EQUIPAMENTO_NOME')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'EQUIPAMENTO_NUM_SERIE')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'LOCAL_COD_FK')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
