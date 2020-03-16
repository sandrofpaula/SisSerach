<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\equipamentoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="equipamento-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'EQUIPAMENTO_COD_PK') ?>

    <?= $form->field($model, 'EQUIPAMENTO_NOME') ?>

    <?= $form->field($model, 'EQUIPAMENTO_NUM_SERIE') ?>

    <?= $form->field($model, 'LOCAL_COD_FK') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
