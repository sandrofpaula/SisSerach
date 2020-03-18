<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tb_equipamento".
 *
 * @property int $EQUIPAMENTO_COD_PK
 * @property string $EQUIPAMENTO_NOME
 * @property string $EQUIPAMENTO_NUM_SERIE
 * @property int $LOCAL_COD_FK
 * 
 * @property ENTRADA[] $eNTRADAs
 * @property LOCAL $lOCALCODFK
 */
class EQUIPAMENTO extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tb_equipamento';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['EQUIPAMENTO_NOME', 'EQUIPAMENTO_NUM_SERIE', 'LOCAL_COD_FK'], 'required'],
            [['LOCAL_COD_FK'], 'integer'],
            [['EQUIPAMENTO_NOME', 'EQUIPAMENTO_NUM_SERIE'], 'string', 'max' => 100],
            [['EQUIPAMENTO_HISTORICO_LOCAL'], 'string', 'max' => 4000],
            [['LOCAL_COD_FK'], 'exist', 'skipOnError' => true, 'targetClass' => LOCAL::className(), 'targetAttribute' => ['LOCAL_COD_FK' => 'LOCAL_COD_PK']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'EQUIPAMENTO_COD_PK' => 'Cod.',
            'EQUIPAMENTO_NOME' => 'Nome',
            'EQUIPAMENTO_NUM_SERIE' => 'Num. Série',
            'LOCAL_COD_FK' => 'Local',
            'EQUIPAMENTO_HISTORICO_LOCAL' => 'Histórico de remanejamento',
        ];
    }
    /**
     * Gets query for [[ENTRADAs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getENTRADAs()
    {
        return $this->hasMany(ENTRADA::className(), ['EQUIPAMENTO_COD_FK' => 'EQUIPAMENTO_COD_PK']);
    }

    /**
     * Gets query for [[LOCALCODFK]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLOCALCODFK()
    {
        return $this->hasOne(LOCAL::className(), ['LOCAL_COD_PK' => 'LOCAL_COD_FK']);
    }

}
