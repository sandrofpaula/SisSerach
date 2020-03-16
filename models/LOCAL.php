<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tb_local".
 *
 * @property int $LOCAL_COD_PK
 * @property string $LOCAL_NOME
 * @property string $LOCAL_ENDERECO
 */
class LOCAL extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tb_local';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['LOCAL_NOME', 'LOCAL_ENDERECO'], 'required'],
            [['LOCAL_NOME', 'LOCAL_ENDERECO'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'LOCAL_COD_PK' => 'Cod.',
            'LOCAL_NOME' => 'Nome',
            'LOCAL_ENDERECO' => 'Endereço',
        ];
    }
}
