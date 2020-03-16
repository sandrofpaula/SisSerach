<?php

use yii\db\Migration;

/**
 * Class m200316_023723_insert_tabela_entrada
 */
class m200316_023723_insert_tabela_entrada extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->batchInsert('{{%ENTRADA}}', [
            'ENTRADA_OCORRENCIA','EQUIPAMENTO_COD_FK' 
        ],[
            [
                'NÃO LIGA', 
                '1',
            ],
            [
                'NÃO LIGA', 
                '2',
            ],
            [
                'NOVO', 
                '7',
            ],
            [
                'No break', 
                'DGTI-96321472',
            ],
            [
                'QUEIMADO', 
                '5',
            ],
            [
                'SEM CARGA', 
                '4',
            ],
            [
                'NÃO LIGA', 
                '3',
            ],
            [
                'LAMPADA QUEBRADA', 
                '6',
            ],
        ]);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        /*
        echo "m200316_023723_insert_tabela_entrada cannot be reverted.\n";

        return false;
        */
        $this->truncateTable('{{%ENTRADA}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200316_023723_insert_tabela_entrada cannot be reverted.\n";

        return false;
    }
    */
}
