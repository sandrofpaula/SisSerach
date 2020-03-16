<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ENTRADA */

$this->title = 'Update Entrada: ' . $model->ENTRADA_COD_PK;
$this->params['breadcrumbs'][] = ['label' => 'Entradas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ENTRADA_COD_PK, 'url' => ['view', 'id' => $model->ENTRADA_COD_PK]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="entrada-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
