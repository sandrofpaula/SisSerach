<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

use yii\helpers\ArrayHelper;
use app\models\EQUIPAMENTO;

use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model app\models\ENTRADA */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="entrada-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ENTRADA_OCORRENCIA')->textInput(['maxlength' => true]) ?>
    <?php //$users = Yii::$app->db->createCommand('SELECT CONCAT(EQUIPAMENTO_NOME, " <", EQUIPAMENTO_NUM_SERIE," >") FROM tb_equipamento')->queryAll(); ?>
    <?= $form->field($model, 'EQUIPAMENTO_COD_FK')->widget(Select2::classname(), [
            'data' => ArrayHelper::map(EQUIPAMENTO::find()->asArray()->all(), 'EQUIPAMENTO_COD_PK', 'EQUIPAMENTO_NUM_SERIE'),
            //'data' => ArrayHelper::map($users),
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
