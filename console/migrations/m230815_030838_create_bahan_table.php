<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%bahan}}`.
 */
class m230815_030838_create_bahan_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%bahan}}', [
            'id_bahan' => $this->primaryKey(),
            'nama_bahan' => $this->string(50),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%bahan}}');
    }
}
