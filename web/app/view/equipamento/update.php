<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\EQUIPAMENTO */

$this->title = 'Update Equipamento: ' . $model->EQUIPAMENTO_COD_PK;
$this->params['breadcrumbs'][] = ['label' => 'Equipamentos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->EQUIPAMENTO_COD_PK, 'url' => ['view', 'id' => $model->EQUIPAMENTO_COD_PK]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="equipamento-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
