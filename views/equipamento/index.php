<?php

use yii\helpers\Html;
use yii\grid\GridView;

use yii\helpers\ArrayHelper;
use app\models\LOCAL;

use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $searchModel app\models\equipamentoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Equipamentos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="equipamento-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Equipamento', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'EQUIPAMENTO_COD_PK',
            'EQUIPAMENTO_NOME',
            'EQUIPAMENTO_NUM_SERIE',
            [
                'attribute' => 'LOCAL_COD_FK',
                'value' => 'LOCAL_COD_FK',
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
                    return $data->lOCALCODFK->LOCAL_NOME;
                },
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
