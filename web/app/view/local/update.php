<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\LOCAL */

$this->title = 'Update Local: ' . $model->LOCAL_COD_PK;
$this->params['breadcrumbs'][] = ['label' => 'Locals', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->LOCAL_COD_PK, 'url' => ['view', 'id' => $model->LOCAL_COD_PK]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="local-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
