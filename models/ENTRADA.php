<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tb_entrada".
 *
 * @property int $ENTRADA_COD_PK
 * @property string $ENTRADA_OCORRENCIA
 * @property int $EQUIPAMENTO_COD_FK
 */
class ENTRADA extends \yii\db\ActiveRecord
{
    public $LOCAL_COD_FK;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tb_entrada';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ENTRADA_OCORRENCIA', 'EQUIPAMENTO_COD_FK'], 'required'],
            [['EQUIPAMENTO_COD_FK'], 'integer'],
            [['ENTRADA_OCORRENCIA'], 'string', 'max' => 100],
            [['EQUIPAMENTO_COD_FK'], 'exist', 'skipOnError' => true, 'targetClass' => EQUIPAMENTO::className(), 'targetAttribute' => ['EQUIPAMENTO_COD_FK' => 'EQUIPAMENTO_COD_PK']],    
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ENTRADA_COD_PK' => 'Cod.',
            'ENTRADA_OCORRENCIA' => 'Ocorrência',
            'EQUIPAMENTO_COD_FK' => 'Equipamento',
            'LOCAL_COD_FK' => 'Local',
        ];
    }
     /**
     * Gets query for [[EQUIPAMENTOCODFK]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEQUIPAMENTOCODFK()
    {
        return $this->hasOne(EQUIPAMENTO::className(), ['EQUIPAMENTO_COD_PK' => 'EQUIPAMENTO_COD_FK']);
    }
}
