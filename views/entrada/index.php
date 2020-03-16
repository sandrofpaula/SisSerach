<?php

use yii\helpers\Html;
use yii\grid\GridView;

use yii\helpers\ArrayHelper;
use app\models\EQUIPAMENTO;
use app\models\LOCAL;

/* @var $this yii\web\View */
/* @var $searchModel app\models\entradaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Entradas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="entrada-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Entrada', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'attribute' => 'ENTRADA_COD_PK',
                'value' => 'ENTRADA_COD_PK',
                'contentOptions'=>['style'=>'text-align: ; width:50px'],
            ],
            'ENTRADA_OCORRENCIA',
            [
                'attribute' => 'EQUIPAMENTO_COD_FK',
                'value' => 'EQUIPAMENTO_COD_FK',
                'format' => 'html',
                'headerOptions'=>['style'=>'text-align: center;'],
                'contentOptions'=>['style'=>'text-align: ; width:300px'],
                'filter' => \kartik\select2\Select2::widget([
                    'model'=>$searchModel,
                    'data' => ArrayHelper::map(EQUIPAMENTO::find()->asArray()->all(), 'EQUIPAMENTO_COD_PK', 'EQUIPAMENTO_NUM_SERIE'),
                    'attribute'=>'EQUIPAMENTO_COD_FK',
                    'pluginOptions'=>[
                        'placeholder'=>'- Selecione - ',
                        'allowClear' => true,
                    ]
                ]),
                'value'=>function($data){
                    return $data->eQUIPAMENTOCODFK->EQUIPAMENTO_NOME.' < '.$data->eQUIPAMENTOCODFK->EQUIPAMENTO_NUM_SERIE.'  >';
                },
            ],
            [
                'attribute' => 'LOCAL_COD_FK',
                'value' => 'LOCAL_COD_FK',
                'format' => 'html',
                'headerOptions'=>['style'=>'text-align: center;'],
                'contentOptions'=>['style'=>'text-align: ; width:500px'],
                'filter' => \kartik\select2\Select2::widget([
                    'model'=>$searchModel,
                    'data' => ArrayHelper::map(LOCAL::find()->asArray()->all(), 'LOCAL_COD_PK', 'LOCAL_NOME'),
                    'attribute'=>'LOCAL_COD_FK',
                    'pluginOptions'=>[
                        'placeholder'=>'- Selecione - ',
                        'allowClear' => true,
                    ]
                ]),
                'value'=>function($data){
                    return $data->eQUIPAMENTOCODFK->lOCALCODFK->LOCAL_NOME;
                },
            ],

            [
                'class' => 'yii\grid\ActionColumn',
                'contentOptions'=>['style'=>'text-align: ; width:70px'],
            ],
        ],
    ]); ?>


</div>
