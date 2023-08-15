<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%kategori}}`.
 */
class m230815_031107_create_kategori_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%kategori}}', [
            'id_kategori' => $this->primaryKey(),
            'nama_kategori' => $this->string(50),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%kategori}}');
    }
}
