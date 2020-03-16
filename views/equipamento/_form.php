<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

use yii\helpers\ArrayHelper;
use app\models\LOCAL;

use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model app\models\EQUIPAMENTO */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="equipamento-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'EQUIPAMENTO_NOME')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'EQUIPAMENTO_NUM_SERIE')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'LOCAL_COD_FK')->widget(Select2::classname(), [
            'data' => ArrayHelper::map(LOCAL::find()->asArray()->all(), 'LOCAL_COD_PK', 'LOCAL_NOME'),
            'pluginOptions'=>[
                'placeholder'=>'- Selecione - ',
                'allowClear' => true,
            ]
        ]);
    ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
