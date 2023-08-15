<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%resep_menu}}`.
 */
class m230815_031416_create_resep_menu_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%resep_menu}}', [
            'id_resep_menu' => $this->primaryKey(),
            'id_menu' => $this->integer(),
            'id_bahan' => $this->integer(),
            'keterangan' => $this->string(150),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%resep_menu}}');
    }
}
