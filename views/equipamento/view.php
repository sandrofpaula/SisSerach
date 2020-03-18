<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

use app\models\EQUIPAMENTO;
use app\models\LOCAL;

/* @var $this yii\web\View */
/* @var $model app\models\EQUIPAMENTO */

$this->title = $model->EQUIPAMENTO_COD_PK;
$this->params['breadcrumbs'][] = ['label' => 'Equipamentos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="equipamento-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->EQUIPAMENTO_COD_PK], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->EQUIPAMENTO_COD_PK], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'EQUIPAMENTO_COD_PK',
            'EQUIPAMENTO_NOME',
            'EQUIPAMENTO_NUM_SERIE',
            [
                'attribute' => 'LOCAL_COD_FK',
                'value' => $model->lOCALCODFK->LOCAL_NOME,
            ]
        ],
    ]) ?>
    <?php  
        if(!empty($model->EQUIPAMENTO_HISTORICO_LOCAL)){
            $equipamentohistoricolocal = explode(";", $model->EQUIPAMENTO_HISTORICO_LOCAL);
            foreach ($equipamentohistoricolocal as $key => $value) {
                
                if($key % 2 == 0) //verificar se a variavel Key é par ou impar
                {//impar
                    $i=$i+1;
                    $localnome = LOCAL::findOne($value);
                    if(!empty($localnome->LOCAL_NOME)){
                        $text .='<tr><td id="td01">'.$i.'</td><td>'.$localnome->LOCAL_NOME.'</td>';
                    }                    
                }
                else
                {//par
                    if(!empty($value)){
                        $text .='<td id="td01">'.$value.'</td></tr>';
                    }
                }   
            }
            echo "
                <style>
                    table {
                        width:100%;
                    }
                    table, th, td {
                        border: 1px solid black;
                        border-collapse: collapse;
                    }
                    th{
                        padding: 5px;
                        text-align: center;
                    }
                    td {
                        padding: 5px;
                        text-align: left;
                    }
                    td#td01 {
                        padding: 5px;
                        text-align: center;
                    }
                    table#t01 tr:nth-child(even) {
                        background-color: #d9d9d9;
                    }
                    table#t01 tr:nth-child(odd) {
                    background-color: #fff;
                    }
                    table#t01 th {
                        background-color: #666699;
                        color: white;
                    }
                </style>
                <table id='t01'>
                    <tr>
                        <th colspan=3>".$model->getAttributeLabel('EQUIPAMENTO_HISTORICO_LOCAL')."</th>
                    </tr>
                    <tr>
                        <th>#</th>
                        <th>Local anterior</th>
                        <th>Data</th>
                    </tr>
                $text
            ";
        } 
    ?>

</div>
